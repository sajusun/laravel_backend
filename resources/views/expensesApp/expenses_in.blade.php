<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Income List</title>
    @include('expensesApp.layout.header_files');

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
            <button id="refresh" type="submit" class="btn btn-outline-primary" >Refresh</button>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
         let url = "http://localhost:8000/api/expenses_app/in/list/";
        let tbody = $('#t_body');

        // function getList() {
        //     var element = "";
        //     $.get('http://localhost:8000/api/expenses_app/in/list/?api_token=' + sessionStorage.getItem('token')
        //         , function (data, status) {
        //             let list = data['data'];
        //             if (status && data['success']) {
        //                 for (let i = 0; i < list.length; i++) {
        //                     element += "<tr><td>" + `${i + 1}` + "</td> <td>" + list[i].date + "</td><td>" + list[i].details + "</td><td>" + list[i].amount + "</td></td>" + "<td><button>edit</button> <button>delete</button></td></tr>";
        //
        //                     //console.log(list[i].id);
        //                 }
        //                 tbody.empty();
        //                 tbody.append(element);
        //             }
        //
        //         });
        // }

        function fetchData() {
            let element = "";
            const xHttp = new XMLHttpRequest();
            xHttp.open("GET", url, true);
            xHttp.setRequestHeader('Accept', 'Application/json');
            xHttp.setRequestHeader('contentType', 'json');
            xHttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token'));

            xHttp.onload = () => {
                let toJson=JSON.parse(xHttp.responseText);
                let list = toJson['data'];
                if (toJson['success']) {
                    for (let i = 0; i < list.length; i++) {
                        element += "<tr><td>" + `${i + 1}` + "</td> <td>" + list[i].date + "</td><td>" + list[i].details + "</td><td>" + list[i].amount + "</td></td>" + "<td><button>edit</button> <button>delete</button></td></tr>";

                    }
                    tbody.empty();
                    tbody.append(element);
                    $("#refresh").prop(
                        "disabled",
                        false
                    );
                }
            };
            xHttp.send(null);
        }

        //getList();
        fetchData();
        $("#refresh").click(function (event) {
            fetchData();
            $("#refresh").prop(
                "disabled",
                true
            );
        });
    });
</script>
</html>
