<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="main"
      style="background: linear-gradient(rgba(0, 0, 0, 0.50),
              rgba(0, 0, 0, 0.80)) no-repeat fixed center center; background-size: cover;">

<div class="container">
    <hr style="border-top: 3px double darkgrey">
    <h2 style="color: white">Morsum Coding Challenge</h2>
</div>

<div class="container">
    <hr style="border-top: 3px double darkgrey">
    @include('nav')
    <div class="jumbotron" style="background-color: rgba(0,0,0, 0.3);color: white;">
        @yield('content')
        <hr style="border-top: 3px double darkgrey">
        @yield('lists')
    </div>

    <hr style="border-top: 3px double darkgrey">
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

@yield('scripts')

</body>

</html>
