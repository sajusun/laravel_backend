<!doctype html>
<html lang="en">

<head>
    <title>Expenses Add</title>
    @include('expensesApp.layout.header_files')
    <!-- choose one -->
</head>

<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar')
<!-- Navbar -->
<div class="container">
    <h2>Add Expenses</h2>
    <form>

        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="details">Details:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="details" placeholder="Enter Details" name="details">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="amount">Amount:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="remarks">Remark:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="remarks" placeholder="Remark Here" name="remarks">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@include('expensesApp.layout.footer');

</body>
@include('expensesApp.layout.bottom_script_files');
<script>

    $(document).ready(function () {

        $("#submitBtn").click( function () {
            const ex = new Expenses();
             ex.add();

            // let date = $("#date").val();
            // let details = $("#details").val();
            // let amount = $("#amount").val();
            // let remarks = $("#remarks").val();
            // const url = "http://localhost:8000/api/expenses_app/out/add/";
            // sendData();
            //
            // function sendData() {
            //     const formData = new FormData();
            //     formData.append("date", date);
            //     formData.append("details", details);
            //     formData.append("amount", amount);
            //     formData.append("remarks", remarks);
            //     const http = new XMLHttpRequest();
            //     http.open("POST", url, true);
            //     http.setRequestHeader('Accept', 'Application/json');
            //     http.setRequestHeader('contentType', 'json');
            //     http.setRequestHeader('Authorization', 'Bearer ' +getToken());
            //     http.onload = () => {
            //         console.log(http.responseText)
            //     };
            //     http.send(formData);
            // }

        });
    });
</script>
</html>


