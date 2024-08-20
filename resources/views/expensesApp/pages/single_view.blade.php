<!doctype html>
<html lang="en">

<head>
    <title>Full View</title>
    @include('expensesApp.layout.header_files')
    <!-- choose one -->
</head>

<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar');
<!-- Navbar -->
<div class="container container-fluid">
    <div id="top"></div>
    <div id="middle">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Key Name</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <th>date</th>
                <th>Value</th>
            </tr>
            <tr>
                <th scope="row">2</th>
                <th>details</th>
                <th>Value</th>
            </tr>
            <tr>
                <th scope="row">3</th>
                <th>Amount</th>
                <th>Value</th>
            </tr>
            <tr>
                <th scope="row">4</th>
                <th>remarks</th>
                <th>Value</th>
            </tr>
            <tr>
                <th scope="row">5</th>
                <th>create at</th>
                <th>Value</th>
            </tr>
            <tr>
                <th scope="row">6</th>
                <th>last update</th>
                <th>Value</th>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="bottom"></div>
</div>
{{--Footer Area--}}
@include('expensesApp.layout.footer')
</body>
@include('expensesApp.layout.bottom_script_files');
</html>
