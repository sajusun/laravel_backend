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
                <div class="row">
                    <div class="col-2">
                        <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-10" id="response">

                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@include('expensesApp.layout.footer');

</body>
@include('expensesApp.layout.bottom_script_files');
<script>

    $(document).ready(function () {
        let btn = new Button_effect('submitBtn','submitting');
        let responseMgs= new AlertMessages('response');
        const server = new serverRequest();

        $("#submitBtn").click(function () {
            let date = $("#date").val();
            let details = $("#details").val();
            let amount = $("#amount").val();
            let remarks = $("#remarks").val();
            let data = {
                date: date,
                details: details,
                amount: amount,
                remarks: remarks,
            };
            server.url = apiLink.out_add;
            server.data = data;
            btn.starProcessing();
            server.xPost().then(function (result) {
                console.log(result)
                if(!result['success']) {
                    responseMgs.danger(result['message']);
                }else{
                    responseMgs.success(result['message']);
                }
                btn.default();
            });


            // function sendData() {
            //     const formData = new FormData();
            //     formData.append("date", date);
            //     formData.append("details", details);
            //     formData.append("amount", amount);
            //     formData.append("remarks", remarks);
            //     const http = new XMLHttpRequest();
            //     http.open("POST", apiLink.out_add, true);
            //     http.setRequestHeader('Accept', 'Application/json');
            //     http.setRequestHeader('contentType', 'json');
            //     http.setRequestHeader('Authorization', 'Bearer ' +getToken());
            //     http.onload = () => {
            //         console.log(http.responseText)
            //     };
            //     http.send(formData);
            // }

        });

        // function ser() {
        //     server2.url = apiLink.expensesList_url;
        //     let list = server2.xFetch();
        //     list.then(function (list) {
        //         console.log(list)
        //     })
        // }
        //
        // ser();
    });
</script>
</html>
{{--01717056504--}}

