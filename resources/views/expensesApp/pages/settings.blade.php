<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    @include('expensesApp.layout.header_files')
    <script>
        const user= new User();
        user.userGuard();
    </script>

</head>
<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar')
<!-- Navbar -->
<h1>Hello, Settings!</h1>
{{--footer--}}
@include('expensesApp.layout.footer')

</body>
@include('expensesApp.layout.bottom_script_files')

</html>
