<!doctype html>
<html lang="en">

<head>
    <title>Contact Page</title>
    @include('expensesApp.layout.header_files');
</head>


<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar');
<!-- Navbar -->
<div class="container">
    <h2>Horizontal form</h2>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="login_btn" type="button" class="btn btn-default">Submit</button>
        </div>
    </div>
    <form method="get" enctype="text/plain" class="form-horizontal" action="#">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link" placeholder="Enter link" name="link">
            </div>
        </div>
        <p id="output"></p>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="btn" type="submit" class="btn btn-default">check</button>
            </div>
        </div>
    </form>

</div>
@include('expensesApp.layout.footer');
</body>
@include('expensesApp.layout.bottom_script_files');
</html>
<script>

    $(document).ready(function () {
        $("#login_btn").click(function () {
            loadDoc();
        });

        function loadDoc() {
            let http = new XMLHttpRequest();
            http.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(this.responseText);
                }
            };
            http.open("GET", "http://localhost:8000/api/ui?", false);
            http.setRequestHeader('Authorization', token.get());
            http.setRequestHeader('Accept', 'Application/json');
            http.setRequestHeader('contentType', 'json');
            http.send();
        }
    });
</script>
