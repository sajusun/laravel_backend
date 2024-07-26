<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/css/bootstrap.css">

      <link rel="stylesheet" href="/vendors/linericon/style.css">
      <link rel="stylesheet" href="/css/font-awesome.min.css">
      <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">
      <link rel="stylesheet" href="/css/magnific-popup.css">
      <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="/js/jquery-3.2.1.min.js"></script>
      <script src="/js/popper.js"></script>
      <script src="/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container-lg">
      <button id="inAdd" >add</button>
      <button id="viewList" >view list</button>
  </div>
  <div class="container-lg">
      <section id="loadContent"></section>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
<script>

    $(document).ready(function(){
            $.get('http://localhost:8000/api/expenses_app/isValid/?api_token='+sessionStorage.getItem('token'),function(data, status){
                if (status && data['isValid']!==true){
                    window.location.href='http://localhost:8000/expenses-app/user';
                }
            });
            $("#inAdd").click(function () {
                console.log('add')
                window.location.href='http://localhost:8000/expenses-app/in/add';
            })
        $("#viewList").click(function () {
            console.log('list')
            window.location.href='http://localhost:8000/expenses-app/in/list';

        })

    });
</script>
