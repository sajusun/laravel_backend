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

                {{--          Small button groups (default and split) --}}
                <div class="btn-group" style="display: grid">
                    <span>Filter By Year:</span>

                    <div class="filter-section">
                        <input type="text" class="form-control" name="year" id="yearInput" value=""
                               placeholder="Find By Year">
                    </div>
                    {{--                    year--}}
                    <span>Filter By Month:</span>
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
                            <input type="radio" class="form-check-input" id="radio1" name="opt_radio" value="ASC"
                                   checked>Ascending
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
{{--            <div class="filter-section">--}}
{{--                <input type="text" class="form-control" placeholder="Search">--}}
{{--            </div>--}}

            {{--        end filter section--}}
        </div>


        <div class="col">
            <!-- BEGIN SEARCH INPUT -->
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput"
                       placeholder="Search By Text | Date | Year like 2000">
                <span class="input-group-btn">

                    <i id="refreshIcon" type="button" class="search-loading-icon material-icons text-primary"
                       style="display: none">refresh</i>
                    <i id="loadingIcon" class=" search-loading-icon material-icons text-danger">autorenew</i>

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




    $(function () {
        class makeLinks {
            orderName = 'date';
            orderType = null;
            monthBY = null;
            searchBY = false;
            yearBy = null;

            isSearch() {
                income.listLink = `${apiLink.incomeList_url}?orderBy=${this.orderName}&orderType=${this.orderType}&monthBy=${Math.floor(parseInt(this.monthBY) + 1)}&yearBy=${this.yearBy}&searchBy=${this.searchBY}`;
                income.viewData();
            }

            // yearFilter() {
            //     income.listLink = `${apiLink.incomeList_url}?orderBy=${this.orderName}&orderType=${this.orderType}&monthBy=${Math.floor(parseInt(this.monthBY) + 1)}&yearBy=${this.yearBy}&searchBy=${this.searchBY}`;
            //     income.viewData();
            // }

            generateLink() {
                income.listLink = `${apiLink.incomeList_url}?orderBy=${this.orderName}&orderType=${this.orderType}&monthBy=${Math.floor(parseInt(this.monthBY) + 1)}&yearBy=${this.yearBy}`;
                income.viewData();
            }
        }

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
        let yearInput = $('#yearInput');
        let searchInput = $('#searchInput');
        let orderRadioBtn = $('[name=opt_radio]');

        let elements = "";

        for (let i = 0; i < monthsInArray.length; i++) {
            elements += `<a class="dropdown-item" href="#"  id="${i}">${detectMonth(i)}</a>`
        }
        //
        monthNameDiv.html(elements);
        filterBtn.text(detectMonth(month));

        monthNameDiv.click(function (event) {
            filterBtn.text(event.target.text);
            makeLink.monthBY = event.target.id;
            fetchData();
        });

        orderNameDiv.click(function (event) {
            orderBtn.text(event.target.text);
            makeLink.orderName = event.target.id;
            fetchData();

        });
        orderRadioBtn.change(function () {
            makeLink.orderType=$(this).val();
            fetchData();
        });
        yearInput.change(function () {
            yearFunc($(this).val());
        });
        searchInput.change(function () {
            searchFunc($(this).val())
        });
        // searchInput.keyup(function (event) {
        //     searchFunc($(this).val())
        // })
        function searchFunc(data) {
            console.log(data)
            if (!data.empty) {
                makeLink.searchBY = data;
                makeLink.isSearch();
            } else {
                makeLink.generateLink();
            }
        }

        function yearFunc(data) {
            if (data !== "") {
                makeLink.yearBy = parseInt(data);
                fetchData();
            } else {
                defaultValueSet();
            }
        }

        function defaultValueSet() {
            displayBy = orderRadioBtn.filter(":checked").val();
            makeLink.orderType = displayBy;
            makeLink.monthBY = month;
            makeLink.yearBy = getCurrentYear();
            yearInput.val(getCurrentYear());
            fetchData();
        }

        function fetchData() {
            if (searchInput.val()!==""){
                searchFunc(searchInput.val())
            }else {
                makeLink.generateLink();
            }
            console.log(income.listLink)
        }

        defaultValueSet();

    });
</script>
</html>
