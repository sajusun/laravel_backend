<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    @include('expensesApp.layout.header_files');
    <!------ Include the above in your HEAD tag ---------->

</head>
<body>
<section class="vh-100">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-7 col-lg-6 d-flex justify-content-center text-black">

                <div class="h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <!-- Icon -->
                    <div class="d-flex justify-content-center">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_nFqg830P_VriGxOXvv4QbA13rkzVC8YwRA&s"
                            id="icon" alt="User Icon"/>
                    </div>
                    <br>
                    <form style="width: 23rem;">
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="text" id="name" class="form-control form-control-lg"/>
                            <label class="form-label" for="name">Full Name</label>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="email" id="email" class="form-control form-control-lg"/>
                            <label class="form-label" for="email">Email address</label>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="password" id="password" class="form-control form-control-lg"/>
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-2">
                            <input type="password" id="c_password" class="form-control form-control-lg"/>
                            <label class="form-label" for="c_password">Confirm Password</label>
                        </div>
                        <div class="pt-0.5 mb-4">
                            <span id="responseMgs"
                                  style="text-align: center;"></span>
                            <button data-mdb-button-init data-mdb-ripple-init id="login_btn"
                                    class="btn btn-info btn-lg btn-block" type="button" onclick="new User().signup();">Register
                            </button>
                        </div>
                        <p>Already have an account? <a href='#' class="link-info" onclick="redirect(login_Page)">Login here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('expensesApp.layout.bottom_script_files');
</body>
</html>



