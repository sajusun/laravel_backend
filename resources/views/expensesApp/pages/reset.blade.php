
<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
    @include('expensesApp.layout.header_files')
<style>
    body{
        margin-top:20px;
        background-color: #f2f3f8;
    }
    .card {
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
    }
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #e5e9f2;
        border-radius: .2rem;
    }
</style>
</head>
<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar')
<!-- Navbar -->

<div class="container">

    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Reset password</h1>
                        <p class="lead">
                            Enter your email to reset your password.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email">
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="#" class="btn btn-lg btn-primary">Reset password</a>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Reset password</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{--footer--}}
@include('expensesApp.layout.footer')

</body>
@include('expensesApp.layout.bottom_script_files')

</html>

