@extends('welcome')

@section('content')
    <h3>Add a New Book to the Shelve </h3>
    <p class="lead">Add to your Books list below.</p>
    <input type="hidden" value="{{$urlparam}}" name="url" id="url">
    <hr>
    <form id="add-new-book">
        <div class="form-group">
            <label for="titleInput">Title:</label>
            <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="authorInput">Author:</label>
            <input type="text" class="form-control" id="authorInput" name="authorInput" placeholder="Enter Author">
        </div>
        <div class="form-group">
            <label for="inputShelve">Choose Shelve:</label>
            <select id="inputShelve" name="inputShelve" class="form-control">
            </select>
        </div>
        <button class="btn btn-primary" id="addBook">Create new book</button>
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
        {{-- AJAX call to load the books --}}
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
                                $("#lists").append(`<div class="card"  style="color:white; background-color: rgba(0,0,0, 0.3);">
                                    <div class="card-header"><h4>${item.title}</h4></div>
                                    <div class="card-body">
                                        <p class="card-text"><b>Author:</b>${item.authors}</p>
                                    <a href="/index.php?url=/books" id = "${item.id}" class="btn btn-danger delete">Delete Book</a>
                                    </div>
                                    </div><br>`);
                            }
                        );
                    } else {
                        $("#lists").append(`<div class="card"  style="color:white; background-color: rgba(0,0,0, 0.3);">
                                <div class="card-header"><h4>${data.title}</h4></div>
                                <div class="card-body">
                                    <p class="card-text"><b>Author:</b> ${data.authors}</p>
                                    <a href="/index.php?url=/books" id = "${data.id}" class="btn btn-danger delete">Delete Book</a>
                                </div>
                                </div><br>`);
                    }
                },
                error: function () {
                    $('#resultsCount').html("<h4>404 Book Not Found.</h4>");
                }
            });

            // AJAX call to populate select box
            $("#inputShelve").append(function () {
                $.ajax({
                    url: '/api/shelves',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        for (var i = 0; i < response.data.length; i++) {
                            $("#inputShelve").append("<option value='" + response.data[i]['id'] + "'>" + response.data[i]['type'] + "</option>");
                        }
                    }
                });
            });
        });

        $(function () {
            // AJAX call to delete book
            $('#lists').on('click', '.delete', function () {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'DELETE',
                    url: 'api/books/' + id,
                    success: function () {
                        alert('Book deleted');
                    },
                    error: function () {
                        alert('Cannot delete book');
                    }
                })
            });

            // AJAX call to add new book
            $("#add-new-book").submit(function (event) {
                event.preventDefault();
                var form = $(this).serializeArray();

                if (form[0].value.length === 0 || form[1].value.length === 0) {
                    alert('Please fill all details.');
                    return;
                }
                var formData = {};
                formData['title'] = form[0].value;
                formData['authors'] = form[1].value;
                formData['shelves_id'] = form[2].value;

                $.ajax({
                    type: 'POST',
                    url: 'api/books',
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