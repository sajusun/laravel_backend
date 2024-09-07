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
            <h2 class="grid-title"><i class="fa fa-filter"></i> Filters</h2>
            <hr>
            <div class="filter-section">
                <span>Filter By Month:</span>
                {{--          Small button groups (default and split) --}}
                <div class="btn-group" style="display: grid">
                    <button id="filterBtn" class="btn btn-info btn-sm dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By Months
                    </button>
                    <div class="dropdown-menu" id="monthsName"></div>
                    {{--                END filter by month --}}
                </div>
            </div>
            <hr>
            <div class="filter-section">
                <span>Order By:</span>
                <div style="display: grid">
                    <div style="font-size: small">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="opt_radio" value="ASC" checked>Ascending
                            <label class="form-check-label" for="radio1"></label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="opt_radio" value="DESC">Descending
                            <label class="form-check-label" for="radio2"></label>
                        </div>
                    </div>

                    <button id="orderBtn" class="btn btn-info btn-sm dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Order By
                    </button>
                    <div class="dropdown-menu" id="ordersName">
                        <a class="dropdown-item" href="#" id="date">Date</a>
                        <a class="dropdown-item" href="#" id="details">Description</a>
                        <a class="dropdown-item" href="#" id="amount">Amount</a>
                        <a class="dropdown-item" href="#" id="remarks">Remarks</a>
                    </div>
                    {{--                END filter by month --}}
                </div>
            </div>
            <hr>
            <div class="filter-section">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </div>

        <div class="col">
            <!-- BEGIN SEARCH INPUT -->
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search By Text | Date | Year like 2000">
                <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <!-- END SEARCH INPUT -->
            <hr>

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
    const income = new Income();

    class makeLinks {
        orderName;
        orderType=null;
        monthBY = null;
        searchBY = null;

        getLink() {
            income.listLink = `${apiLink.incomeList_url}?orderBy=${this.orderName}&orderType=${this.orderType}&monthBy=${this.monthBY}&searchBy=${this.searchBY}`;
        }
    }

    $(function () {
        // fetch data from server
        const makeLink = new makeLinks();
        const date = new Date();
        let month = date.getMonth();

        function detectMonth(x) {
            if (month === parseInt(x)) {
                return "This Month";
            } else {
                return monthsInArray[parseInt(x)];
            }
        }

        let displayBy;

        let monthNameDiv = $('#monthsName');
        let filterBtn = $('#filterBtn');

        let orderNameDiv = $('#ordersName');
        let orderBtn = $('#orderBtn');

        let orderRadioBtn= $('[name=opt_radio]');

        let elements = "";
        for (let i = 0; i < monthsInArray.length; i++) {
            elements += `<a class="dropdown-item" href="#" name="${detectMonth(i)}" id="${i}">${detectMonth(i)}</a>`
        }
        //
        monthNameDiv.html(elements);
        filterBtn.text(detectMonth(month));

        monthNameDiv.click(function (event) {
            filterBtn.text(event.target.text);
            makeLink.monthBY = event.target.id;
            makeLink.getLink();
            income.viewData();
            console.log(income.listLink)
        });

        orderNameDiv.click(function (event) {
            orderBtn.text(event.target.text);
            makeLink.orderName = event.target.id;
            makeLink.getLink();
            console.log(income.listLink)
            income.viewData();

        });
        orderRadioBtn.change(function(){
            ascOrDesc();
        });
        function ascOrDesc() {
            displayBy = orderRadioBtn.filter(":checked").val();
            makeLink.orderType = displayBy;
            makeLink.orderName='date';
            orderBtn.text("Date");
            makeLink.getLink();
            income.viewData();
            console.log(displayBy);
        }

        ascOrDesc();
        makeLink.monthBY = month;
        makeLink.getLink();
        console.log(income.listLink);

        income.viewData();
        console.log(income.listLink);
    });
</script>
</html>
