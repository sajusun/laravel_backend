<html lang="en">

<head>
    <title>Income Add</title>
    @include('expensesApp.layout.header_files')
    <!-- choose one -->
</head>

<body>
<!-- Navbar -->
@include('expensesApp.layout.navBar')
<!-- Navbar -->
<div class="container-fluid">
    <br>
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
            <h2>Income</h2>
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
    </div>
</div>
@include('expensesApp.layout.footer');

</body>
@include('expensesApp.layout.bottom_script_files');
<script>

    $(document).ready(function () {
        let btn = new Button_effect('submitBtn', 'Submitting');
        let responseMgs = new AlertMessages('response');
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
            server.url = apiLink.in_add;
            server.data = data;
            btn.starProcessing();
            server.xPost().then(function (result) {
                if (!result['success']) {
                    responseMgs.danger(result['message']);
                } else {
                    responseMgs.success(result['message']);
                    data.clear();
                }
                btn.default();
            });

        });
    });
</script>
</html>

