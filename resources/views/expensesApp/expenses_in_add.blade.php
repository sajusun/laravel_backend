
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
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
</head>

<body>
<div class="container">
    <h2>Add Income</h2>
    <form class="form-horizontal" action="/api/expenses_app/in/add">
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
                <input type="text" class="form-control" id="remark" placeholder="Remark Here" name="remark">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/stellar.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="/vendors/isotope/isotope-min.js"></script>
<script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/js/jquery.ajaxchimp.min.js"></script>
<script src="/js/mail-script.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="/js/gmaps.min.js"></script>
<script src="/js/theme.js"></script>
</html>