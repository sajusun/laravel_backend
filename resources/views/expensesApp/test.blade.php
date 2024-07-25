<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Authorization" content="hellosir">
    @csrf
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
    <h2>Horizontal form</h2>
{{--    <form class="form-horizontal" action="">--}}
{{--        <div class="form-group">--}}
{{--            <label class="control-label col-sm-2" for="email">Email:</label>--}}
{{--            <div class="col-sm-10">--}}
{{--                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label class="control-label col-sm-2" for="password">Password:</label>--}}
{{--            <div class="col-sm-10">--}}
{{--                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <div class="col-sm-offset-2 col-sm-10">--}}
{{--                <div class="checkbox">--}}
{{--                    <label><input type="checkbox" name="remember"> Remember me</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--       --}}
{{--    </form>--}}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="login_btn" type="button" class="btn btn-default">Submit</button>
        </div>
    </div>
        <form method="get" enctype="application/json" class="form-horizontal"
              action="http://localhost:8000/api/ui?api_token=2|b2U7Up4ON4hhmMprFjxRLamjINygHKrdnJZj0TNlaf52fb3c">
            @csrf
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
<script>

    $(document).ready(function(){
        $("#login_btn").click(function(){
loadDoc();
        });
        function get() {
            $.get('http://localhost:8000/api/ui?api_token=2|b2U7Up4ON4hhmMprFjxRLamjINygHKrdnJZj0TNlaf52fb3c',
                {headers:{'Authorization':'5|p0HKvj8vehbjroz5HlYVhSv7dY5BnFwyhhISzw0A0524b45a'}}
                ,function(data, status,){
                    console.log(data);
                    console.log(status);
                    //alert(data + status);
                },'json');
        }

        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xhttp.open("GET", "http://localhost:8000/api/ui?api_token=2|b2U7Up4ON4hhmMprFjxRLamjINygHKrdnJZj0TNlaf52fb3c", false);

            xhttp.setRequestHeader('Authorization', '2|b2U7Up4ON4hhmMprFjxRLamjINygHKrdnJZj0TNlaf52fb3c');
            xhttp.setRequestHeader('Accept','Application/json');
            xhttp.setRequestHeader('contentType','json');
            xhttp.send();
        }
    });
</script>
