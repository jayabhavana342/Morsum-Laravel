@extends('welcome')

@section('content')
    <h1>Add a New Album to the Shelve </h1>
    <p class="lead">Add to your Albums list below.</p>
    <input type="hidden" value="{{$urlparam}}" name="url" id="url">
    <hr>
    <form id="add-new-album">
        <div class="form-group">
            <label for="titleInput">Title:</label>
            <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="singerInput">Singer:</label>
            <input type="text" class="form-control" id="singerInput" name="singerInput" placeholder="Enter Singer">
        </div>
        <div class="form-group">
            <label for="inputShelve">Choose Shelve:</label>
            <select id="inputShelve" name="inputShelve" class="form-control">
            </select>
        </div>
        <button class="btn btn-primary" id="addAlbum">Create new album</button>
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
        {{-- AJAX call to load the albums --}}
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
                                    <div class="card-header"><h4>${item.title}</h4></div>
                                    <div class="card-body">
                                        <p class="card-text"><b>Singer:</b>${item.singer}</p>
                                    <a href="/index.php?url=/albums" id = "${item.id}" class="btn btn-danger delete">Delete Album</a>
                                    </div>
                                    </div><br>`);
                            }
                        );
                    } else {
                        $("#lists").append(`<div class="card"  style="color:white;background-color: rgba(0,0,0, 0.3);">
                                <div class="card-header"><h4>${data.title}</h4></div>
                                <div class="card-body">
                                <p class="card-text"><b>Singer:</b> ${data.singer}</p>
                                <a href="/index.php?url=/albums" id = "${data.id}" class="btn btn-danger delete">Delete Album</a>
                                </div>
                                </div><br>`);
                    }
                },
                error: function () {
                    $('#resultsCount').html("<h4>404 Album Not Found.</h4>");
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
            // AJAX call to delete album
            $('#lists').on('click', '.delete', function () {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'DELETE',
                    url: 'api/albums/' + id,
                    success: function () {
                        alert('Album deleted');
                    },
                    error: function () {
                        alert('Cannot delete album');
                    }
                })
            });

            // AJAX call to add new album
            $("#add-new-album").submit(function (event) {
                event.preventDefault();
                var form = $(this).serializeArray();

                if (form[0].value.length === 0 || form[1].value.length === 0) {
                    alert('Please fill all details.');
                    return;
                }
                var formData = {};
                formData['title'] = form[0].value;
                formData['singer'] = form[1].value;
                formData['shelves_id'] = form[2].value;

                $.ajax({
                    type: 'POST',
                    url: 'api/albums',
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