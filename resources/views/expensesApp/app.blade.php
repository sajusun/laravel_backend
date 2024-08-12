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
    <div class="row justify-content-center">
        <div id="buttonSet" class="col-sm-10 col-md-8 col-lg-6 " style="display: inline-grid">
            <button id="inAdd" class=" btn btn-outline-primary" >income add</button>
            <button id="inList" class=" btn btn-outline-primary">income list</button>
            <button id="outAdd" class=" btn btn-outline-primary">expenses add</button>
            <button id="outList" class=" btn btn-outline-primary">expenses list</button>
        </div>
    </div>

</div>
<div class="container-lg">
    <section id="loadContent"></section>
</div>
@include('expensesApp.layout.footer')
</body>
@include('expensesApp.layout.bottom_script_files')
</html>


