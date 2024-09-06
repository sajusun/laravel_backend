<html lang="en">
<head>
    <!-- Required meta tags -->
    <title>Income List</title>
    @include('expensesApp.layout.header_files')
</head>

<body>
{{--navbar--}}
@include('expensesApp.layout.navBar')
{{--navbar--}}
<div class="container main-section">
    <div class="row" style="padding-top: 15px">
        <div class="col" style="max-width: 180px">
            <!-- Small button groups (default and split) -->
            <div class="btn-group">
                <button id="filterBtn" class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter By Months
                </button>
                <div class="dropdown-menu" id="monthsName">
                </div>
                <!-- END ORDER RESULT -->
            </div>
        </div>
        <div class="col">
            <section id="data_table">
                <table class="table table-bordered">
                    <thead>
                    <tr class="data-table">
                        <th>Index</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="t_body"></tbody>
                </table>
            </section>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <i id="refreshIcon" type="button" class="material-icons text-primary"
                       style="display: none">refresh</i>
                    <i id="loadingIcon" class="material-icons text-danger">autorenew</i>
                </div>
            </div>
        </div>
    </div>

</div>
{{--modals area--}}
@include('expensesApp.layout.modals')
{{--Footer Area--}}
@include('expensesApp.layout.footer')

</body>
@include('expensesApp.layout.bottom_script_files')
<script>
    $(function () {
        const date = new Date();
        let month = date.getMonth();

        let monthNameDiv = $('#monthsName');
        let filterBtn = $('#filterBtn');
        let elements = "";
        for (let i = 0; i < monthsInArray.length; i++) {
            elements += `<a class="dropdown-item" href="#" id="${i}">${monthsInArray[i]}</a>`
        }
        monthNameDiv.html(elements);
        filterBtn.text(monthsInArray[month])

        monthNameDiv.click(function (event) {
            filterBtn.text(event.target.text)
        });

        // fetch data from server
        let income = new Income();
        income.viewData();
    });
</script>
</html>
