<!doctype html>
<html lang="en">
<head>
    <title>Home</title>
    @include('expensesApp.layout.header_files')

</head>
<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar')
<!-- Navbar -->
<br>
<div class="container-lg" id="mainContainer">
    <button id="inAdd" class=" btn btn-outline-primary">add</button>
    <button id="viewList" class=" btn btn-outline-primary">view list</button>
</div>
<div class="container-lg">
    <section id="loadContent"></section>
</div>

</body>
@include('expensesApp.layout.bottom_script_files')
</html>

