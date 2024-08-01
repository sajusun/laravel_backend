<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    //<link rel="icon" href="img/favicon.png" type="image/png">
    <title>dev Portfolio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <link rel="stylesheet" href="/vendors/linericon/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">
    <!-- main css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href={{asset('css/style.css')}}>
</head>

<body>
<div class="container">
    <h2>Add Income</h2>
    <form>
        @csrf
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
            <label class="control-label col-sm-2" for="details">Amount:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="remark">Remark:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="remarks" placeholder="Remark Here" name="remarks">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="submitBtn" type="button" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


<script>

    $(document).ready(function () {

        $("#submitBtn").click(function () {

            let date = $("#date").val();
            let details = $("#details").val();
            let amount = $("#amount").val();
            let remarks = $("#remarks").val();
            const url = "http://localhost:8000/api/expenses_app/in/add/";
            let dataobj  = {
                date: date,
                details : details,
                amount : amount,
                remarks : remarks
            }

            customAjax();
            function customAjax() {

                // $.ajax({
                //     type: 'POST',
                //     url: url,
                //     contentType:'text/xml; charset=utf-8',
                //     accept:'Application/json',
                //     data: {'email':'email',
                //             'details':"details",
                //             'amount':"amount",
                //             'remarks':"remarks"
                //         },
                //     processData:false,
                //     // headers: {
                //     //     "Authorization":"Bearer "+sessionStorage.getItem('token'),
                //     // }
                //     //OR
                //     beforeSend: function(xhr) {
                //      xhr.setRequestHeader("Authorization","Bearer "+sessionStorage.getItem('token'));
                //     //  xhr.setRequestHeader("My-Second-Header", "second value");
                //     }
                // }).done(function (data) {
                //     console.log(data)
                // });

                    console.log(dataobj)
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
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                })
                //  .done(function (data){
                //   console.log(data)
                //  });
            }

            function post() {
                $.post('http://localhost:8000/api/expenses_app/in/add/?api_token=' + sessionStorage.getItem('token')
                    , {
                        'email': email,
                        'details': details,
                        'amount': amount,
                        'remarks': remarks
                    }, function (data, status) {
                        console.log(status);
                        console.log(data);
                    }, "json",);
            }

        });
    });
</script>
</html>


