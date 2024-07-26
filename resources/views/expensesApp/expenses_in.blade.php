
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
  <h2>List</h2>
    <br>
<section id="data_table">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Details</th>
            <th>Amount</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody id="t_body">

        </tbody>
    </table>
</section>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button id="refresh" type="submit" class="btn btn-default">refresh</button>
        </div>
    </div>
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
<script>
    $(document).ready(function(){
        let tbody=$('#t_body');
        function getlist() {
         var element=""
            $.get('http://localhost:8000/api/expenses_app/in/list/?api_token='+sessionStorage.getItem('token')
                ,function(data, status){
                let list=data['data'];
                console.log(list.length);
                console.log(status);
                for (let i=0;i<list.length;i++){
            element+="<td>"+list[i].id+"</td> <td>"+list[i].date +"</td><td>"+list[i].details+"</td><td>"+list[i].amount+"</td></td>"
                    +"<td><button>edit</button>|<button>delete</button></td></tr>"

                    console.log(list[i]);
                }
                tbody.empty();
                tbody.append(element);
            });
        }
        getlist();
        $("#refresh").click(function(){
          getlist();
        });
    });
</script>
</html>
