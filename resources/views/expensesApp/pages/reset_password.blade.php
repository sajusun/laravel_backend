<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    @include('expensesApp.layout.header_files');

</head>
<body>
<section class="vh-100">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6 d-flex justify-content-center text-black">

                <div class="h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <!-- Icon -->
                    <div class="d-flex justify-content-center" style="height: 220px;">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_nFqg830P_VriGxOXvv4QbA13rkzVC8YwRA&s"
                            id="icon" alt="User Icon"/>
                    </div>
                    <br>
                    <form style="width: 23rem;">
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="password" id="password" class="form-control form-control-lg"/>
                            <label class="form-label" for="password">New Password</label>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="password" id="confirmed_password" class="form-control form-control-lg"/>
                            <label class="form-label" for="password">Confirm Password</label>
                        </div>
                        <div class="pt-0.5 mb-4">
                            <span id="loginMgs"
                                  style="text-align: center;"></span>
                            <button data-mdb-button-init data-mdb-ripple-init id="login_btn"
                                    class="btn btn-info btn-lg btn-block" type="button">Reset
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('expensesApp.layout.bottom_script_files');
</body>
</html>



