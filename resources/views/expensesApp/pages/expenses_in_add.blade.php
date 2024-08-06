<!doctype html>
<html lang="en">

<head>
    <title>Add</title>
    @include('expensesApp.layout.header_files')
    <!-- choose one -->
    </head>

<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar')
<!-- Navbar -->
<div class="container">
    <h2>Add Income</h2>
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
</body>
@include('expensesApp.layout.bottom_script_files');

<script>

    $(document).ready(function () {

        $("#submitBtn").click(function () {

            let date = $("#date").val();
            let details = $("#details").val();
            let amount = $("#amount").val();
            let remarks = $("#remarks").val();
            const url = "http://localhost:8000/api/expenses_app/in/add/";


            //customAjax();
            sendData();
            function customAjax() {

                $.ajax({
                    type: 'POST',
                    url: url,
                    contentType:'text/xml; charset=utf-8',
                    accept:'Application/json',
                    data: JSON.stringify({
                    date: date,
                    details: details,
                    amount: amount,
                    remarks: remarks
                }),
                    processData:true,
                    // headers: {
                    //     "Authorization":"Bearer "+sessionStorage.getItem('token'),
                    // }
                    //OR
                    beforeSend: function(xhr) {
                     xhr.setRequestHeader("Authorization","Bearer "+sessionStorage.getItem('token'));
                    },
                    success: function(data) {
                        console.log(data.responseJSON)
                        //console.log(response)
                    },
                    errors:function (data) {
                        console.log(data.responseJSON)
                    },
                    complete:function (xhr,status) {
                        console.log(status)
                        console.log(xhr.responseText)
                    }
                });


                $.ajax({
                    url: url,
                    headers: {
                        'Authorization':'Bearer '+sessionStorage.getItem('token'),
                        //'X-CSRF-TOKEN':'xxxxxxxxxxxxxxxxxxxx',
                        'Content-Type':'application/json'
                    },
                    method: 'POST',
                    data: JSON.stringify({
                        date: date,
                        details: details,
                        amount: amount,
                        remarks: remarks
                    }),
                    processData:true,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        //console.log(JSON.stringify(data))
                    },
                    error: function(data) {
                        let errors = data.responseJSON;
                        console.log(errors);
                    }
                })
                 //    .done(function (data){
                 //  console.log(data.responseText)
                 //  console.log("resp"+ data)
                 // });
            }

            function sendData() {
                const formData = new FormData();
                formData.append("date", date);
                formData.append("details", details);
                formData.append("amount", amount);
                formData.append("remarks", remarks);

                const xhttp = new XMLHttpRequest();

                xhttp.open("POST", url,true);
                xhttp.setRequestHeader('Accept','Application/json');
                xhttp.setRequestHeader('contentType','json');
                xhttp.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token'));

                xhttp.onload = () => {
                    // Request finished. Do processing here.
                    console.log(xhttp.responseText)
                };
                xhttp.send(formData);
            }

        });
    });
</script>
</html>


