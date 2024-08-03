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
            {{--            <button id="refresh" type="submit" class="btn btn-outline-primary" >Refresh</button>--}}
            <i id="refreshIcon" type="button" class="material-icons text-primary" style="display: none">refresh</i>
            <i id="loadingIcon" class="material-icons text-danger">autorenew</i>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fadeIn" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteModalLabel"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteMgs" class="text-info">Delete Success</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button id="c_delete" type="button" class="btn btn-outline-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    let div = ''

    $(document).ready(function () {

        // modal item var
        const delete_modal = new bootstrap.Modal('#deleteModal');
        const deleteModalID = $('#deleteModal');
        const modalTitle = $('#deleteModalLabel');
        const mgsArea = $('#deleteMgs');
        const c_delete = $('#c_delete');

        //
        let url = "http://localhost:8000/api/expenses_app/in/list/";
       let id='';
        let tbody = $('#t_body');
        let refresh = $('#refreshIcon');
        let loading = $('#loadingIcon');
        var elem = '';

        // fetch data from server
        function fetchData() {
            // refresh.prop('hidden', true);
            refresh.css('display','none');

            loading.prop('hidden', false);
            let element = "";
            const xHttp = new XMLHttpRequest();
            xHttp.open("GET", url, true);
            xHttp.setRequestHeader('Accept', 'Application/json');
            xHttp.setRequestHeader('contentType', 'json');
            xHttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token'));

            xHttp.onload = () => {
                let toJson = JSON.parse(xHttp.responseText);
                let list = toJson['data'];
                if (toJson['success']) {
                    for (let i = 0; i < list.length; i++) {
                        element += `<tr id='${list[i].id}'>
<td> ${i + 1} </td>
<td> ${list[i].date} </td>
<td> ${list[i].details}</td>
 <td>${list[i].amount}</td>
<td>
<i type='button' class='material-icons text-secondary'>edit_square</i>
<i type='button' class='material-icons text-danger delete'>delete</i>
</td>
</tr>`;
                    }
                    tbody.empty();
                    tbody.append(element);
                }
                loading.prop("hidden", true);
                refresh.css('display','block');
            };
            xHttp.send();
        } // end fetch data function




        // request remove data to server
        function remove_() {
            const deleteLink = `${url + id}/delete`;
            //console.log(deleteLink);
            const xHttp = new XMLHttpRequest();
            xHttp.open("GET", deleteLink, true);
            xHttp.setRequestHeader('Accept', 'Application/json');
            xHttp.setRequestHeader('contentType', 'json');
            xHttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token'));
            xHttp.onload = () => {
                let toJson = JSON.parse(xHttp.responseText);
                let mgs = toJson['message'];
                let status = toJson['success'];
                console.log(`${status} : ${mgs}`);
                mgsArea.text(mgs);
                c_delete.prop("disabled", false);
                // if (status) {
                //     setTimeout(function () {
                //         delete_modal.hide();
                //     }, 10000);
                // }
                fetchData();
            };
            xHttp.send();
        }

        // execute delete modal on delete icon click
        function deleteModal(tabKey) {
            const columnId = tabKey.parentElement.parentElement.firstElementChild.innerText
             id = tabKey.parentElement.parentElement.id;
            if (delete_modal) {
                modalTitle.text(`Select Column No : ${columnId}`);
                mgsArea.text("Confirm to Delete!");
                delete_modal.show();

            }
        }

        // after modal dispose auto run
        deleteModalID.on('hidden.bs.modal', function () {
            fetchData();
        });

        $("tbody").click(function (event) {
            console.log(event.target);

            if (event.target.classList[2] === "delete") {
               // console.log("delete")
                 deleteModal(event.target);
            }
           // div = event.target;
            //  deleteModal(this);

        });

        c_delete.click(function () {
            c_delete.prop("disabled", true);
            remove_();
        })

        // on click refresh button
        refresh.click(function () {
            fetchData();
        });

        // call function on document is loaded
        fetchData();

    });  //// end document ready function


</script>
</html>
