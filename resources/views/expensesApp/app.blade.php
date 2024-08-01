<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

   @include('expensesApp.layout.header_files');

    <!-- Bootstrap CSS -->
    {{--      <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">--}}
    {{--      <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">--}}
    {{--      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}
    {{--      <!-- Optional JavaScript -->--}}
    {{--      <!-- jQuery first, then Popper.js, then Bootstrap JS -->--}}
    {{--      <script src="{{asset('/js/jquery-3.2.1.min.js')}}"></script>--}}
    {{--      <script src="{{asset('/js/popper.js')}}"></script>--}}
    {{--      <script src="{{asset('/js/bootstrap.min.js')}}"></script>--}}
    {{--      <script src="{{asset('/js/custom-javascript.js')}}"></script>--}}

</head>
<body>
<div class="container-lg" id="mainContainer">
    <button id="inAdd">add</button>
    <button id="viewList">view list</button>
</div>
<div class="container-lg">
    <section id="loadContent"></section>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</html>

