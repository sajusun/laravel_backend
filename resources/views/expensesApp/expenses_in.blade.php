
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>dev Portfolio</title>
    @include('expensesApp.layout.header_files');
{{--    <!-- Bootstrap CSS -->--}}
{{--    <link rel="stylesheet" href="/css/bootstrap.css">--}}

{{--    <link rel="stylesheet" href="/vendors/linericon/style.css">--}}
{{--    <link rel="stylesheet" href="/css/font-awesome.min.css">--}}
{{--    <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">--}}
{{--    <link rel="stylesheet" href="/css/magnific-popup.css">--}}
{{--    <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">--}}
{{--    <!-- main css -->--}}
{{--    <link rel="stylesheet" href="/css/style.css">--}}
{{--    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}
{{--    --}}
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
        function getList() {
         var element="";
            $.get('http://localhost:8000/api/expenses_app/in/list/?api_token='+sessionStorage.getItem('token')
                ,function(data, status){
                let list=data['data'];
               if (status && data['success']){
                   for (let i=0;i<list.length;i++){
                       element+="<tr><td>"+`${i+1}`+"</td> <td>"+list[i].date +"</td><td>"+list[i].details+"</td><td>"+list[i].amount+"</td></td>"+"<td><button>edit</button> <button>delete</button></td></tr>";

                       //console.log(list[i].id);
                   }
                   tbody.empty();
                   tbody.append(element);
               }

            });
        }
        getList();
        $("#refresh").click(function(){
          getList();
        });
    });
</script>
</html>
