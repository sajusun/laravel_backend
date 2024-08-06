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
    <br>
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
            <tbody id="t_body">

            </tbody>
        </table>
    </section>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <i id="refreshIcon" type="button" class="material-icons text-primary" style="display: none">refresh</i>
            <i id="loadingIcon" class="material-icons text-danger">autorenew</i>
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
    $(function() {
        list();
    });
</script>
</html>
