<!doctype html>
<html lang="en">
<head>
    <title>Home</title>
    @include('expensesApp.layout.header_files');

</head>
<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar');
<!-- Navbar -->
<div class="container-lg" id="mainContainer">
    <button id="inAdd" class=" btn btn-outline-primary">add</button>
    <button id="viewList" class=" btn btn-outline-primary">view list</button>
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

