@extends('welcome')

@section('content')
    <h1>Add a New Shelve </h1>
    <p class="lead">Add to your Shelves list below.</p>
    <input type="hidden" value="{{$urlparam}}" name="url" id="url">
    <hr>
    <form id="add-new-shelve">
        <div class="form-group">
            <label for="typeInput">Type:</label>
            <input type="text" class="form-control" id="typeInput" name="typeInput" placeholder="Enter Shelve Type">
        </div>
        <button class="btn btn-primary" id="addshelve">Create new shelve</button>
    </form>
@endsection

@section('lists')
    <div id="resultsCount">

    </div>
    <div id="lists">

    </div>
@endsection

@section('scripts')
    <script type="application/javascript">
        {{-- AJAX call to load the shelves --}}
        $(document).ready(function () {
            var requestedURL = $('#url').val();
            $.ajax({
                url: 'api' + requestedURL,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.data) {
                        $('#resultsCount').html("<h4>" + data.data.length + " Results Found.</h4>");
                        $.each(data.data, function (idx, item) {
                                $("#lists").append(`<div class="card"  style="color:white;background-color: rgba(0,0,0, 0.3);">
                                    <div class="card-header"><h4>${item.type}</h4></div>
                                    <div class="card-body">
                                <a href="/index.php?url=/shelves" id = "${item.id}" class="btn btn-danger delete">Delete Shelve</a>
                                    </div>
                                    </div><br>`);
                            }
                        );
                    } else {
                        $("#lists").append(`<div class="card"  style="color:white;background-color: rgba(0,0,0, 0.3);">
                                <div class="card-header"><h4>${data.type}</h4></div>
                                <div class="card-body">
                                <a href="/index.php?url=/shelves" id = "${data.id}" class="btn btn-danger delete">Delete Shelve</a>
                                </div>
                                </div><br>`);
                    }
                },
                error: function () {
                    $('#resultsCount').html("<h4>404 Shelve Not Found.</h4>");
                }
            });
        });

        $(function () {
            // AJAX call to delete shelve
            $('#lists').on('click', '.delete', function () {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'DELETE',
                    url: 'api/shelves/' + id,
                    success: function () {
                        alert('shelve deleted');
                    },
                    error: function () {
                        alert('Cannot delete shelve. Delete Related Books and Albums.');
                    }
                })
            });

            // AJAX call to add new shelve
            $("#add-new-shelve").submit(function (event) {
                event.preventDefault();
                var form = $(this).serializeArray();

                if (form[0].value.length === 0) {
                    alert('Please fill all details.');
                    return;
                }
                var formData = {};
                formData['type'] = form[0].value;

                $.ajax({
                    type: 'POST',
                    url: 'api/shelves',
                    data: formData,
                    dataType: 'json',
                    success: function () {
                        window.location.reload();
                    },
                    error: function (xhr, resp, text) {
                        console.log(xhr, resp, text);
                        alert('Error');
                    }
                });
            });
        });
    </script>

@endsection