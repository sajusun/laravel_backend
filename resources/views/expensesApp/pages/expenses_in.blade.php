<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <title>Income List</title>
    @include('expensesApp.layout.header_files');
</head>

<body>
{{--navbar--}}
@include('expensesApp.layout.navBar')
<div class="container">
    <h2>List</h2>
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

{{--update modal--}}
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body justify-content-center">
                <form>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="date">Date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="details">Details:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="details" placeholder="Enter Details"
                                   name="details">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="amount">Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="amount" placeholder="Enter Amount"
                                   name="amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="remarks">Remark:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="remarks" placeholder="Remark Here"
                                   name="remarks">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span id="updateStatus"></span>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="c_update" type="button" class="btn btn-outline-primary">Update</button>
            </div>
        </div>
    </div>
</div>
</body>

<script>
//     let div = ''
//
//     $(document).ready(function () {
//         // modal item var
//         const delete_modal = new bootstrap.Modal('#deleteModal');
//         const deleteModalID = $('#deleteModal');
//         const modalTitle = $('#deleteModalLabel');
//         const mgsArea = $('#deleteMgs');
//         const c_delete = $('#c_delete');
//
//         // update modal var
//         const update_modal = new bootstrap.Modal('#updateModal');
//         const updateModalID = $('#updateModal');
//         const updateModalTitle = $('#updateModalLabel');
//         const c_update = $('#c_update');
//         const updateStatus = $('#updateStatus');
//
//         let dateInput = $("#date");
//         let detailsInput = $("#details");
//         let amountInput = $("#amount");
//         let remarksInput = $("#remarks");
//
//         //
//         let url = "http://localhost:8000/api/expenses_app/in/list/";
//         let id = '';
//         let tbody = $('#t_body');
//         let refresh = $('#refreshIcon');
//         let loading = $('#loadingIcon');
//
//         // fetch data from server
//         function fetchData() {
//             // refresh.prop('hidden', true);
//             refresh.css('display', 'none');
//             loading.prop('hidden', false);
//             let element = "";
//             const xHttp = new XMLHttpRequest();
//             xHttp.open("GET", url, true);
//             xHttp.setRequestHeader('Accept', 'Application/json');
//             xHttp.setRequestHeader('contentType', 'json');
//             xHttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token'));
//             xHttp.onload = () => {
//                 let toJson = JSON.parse(xHttp.responseText);
//                 let list = toJson['data'];
//                 if (toJson['success']) {
//                     for (let i = 0; i < list.length; i++) {
//                         element += `<tr id='${list[i].id}'>
// <td> ${i + 1} </td>
// <td> ${list[i].date} </td>
// <td> ${list[i].details}</td>
//  <td>${list[i].amount}</td>
//  <td>${list[i].remarks}</td>
// <td class='d-flex justify-content-between'>
// <i type='button' class='material-icons text-secondary update'>edit_square</i>
// <i type='button' class='material-icons text-danger delete'>delete</i>
// </td>
// </tr>`;
//                     }
//                     tbody.empty();
//                     tbody.append(element);
//                 }
//                 loading.prop("hidden", true);
//                 refresh.css('display', 'block');
//             };
//             xHttp.send();
//         } // end fetch data function
//
//         // request update data to server
//         function update_() {
//             const updateLink = `${url + id}/update`;
//             const formData = new FormData();
//             formData.append("date", dateInput.val());
//             formData.append("details", detailsInput.val());
//             formData.append("amount", amountInput.val());
//             formData.append("remarks", remarksInput.val());
//
//             const xHttp = new XMLHttpRequest();
//             xHttp.open("POST", updateLink, true);
//             xHttp.setRequestHeader('Accept', 'Application/json');
//             xHttp.setRequestHeader('contentType', 'json');
//             xHttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token'));
//             xHttp.onload = () => {
//                 let toJson = JSON.parse(xHttp.responseText);
//                 let mgs = toJson['message'];
//                 let status = toJson['success'];
//                 console.log(`${status} : ${mgs}`);
//                 if (!status) {
//                     updateStatus.text("update failed");
//                     updateElement('default');
//                 } else {
//                     updateStatus.text(mgs);
//                     updateElement('success');
//                 }
//                 fetchData();
//             };
//             xHttp.send(formData);
//         }
//
//         // request remove data to server
//         function remove_() {
//             const deleteLink = `${url + id}/delete`;
//             const xHttp = new XMLHttpRequest();
//             xHttp.open("GET", deleteLink, true);
//             xHttp.setRequestHeader('Accept', 'Application/json');
//             xHttp.setRequestHeader('contentType', 'json');
//             xHttp.setRequestHeader('Authorization', 'Bearer ' + sessionStorage.getItem('token'));
//             xHttp.onload = () => {
//                 let toJson = JSON.parse(xHttp.responseText);
//                 let mgs = toJson['message'];
//                 let status = toJson['success'];
//                 console.log(`${status} : ${mgs}`);
//                 mgsArea.text(mgs);
//                 c_delete.prop("disabled", false);
//                 fetchData();
//             };
//             xHttp.send();
//         }
//
//         // execute delete modal on delete icon click
//         function deleteModal(tabKey) {
//             const columnId = tabKey.parentElement.parentElement.firstElementChild.innerText
//             id = tabKey.parentElement.parentElement.id;
//             if (delete_modal) {
//                 modalTitle.text(`Select Column No : ${columnId}`);
//                 mgsArea.text("Confirm to Delete!");
//                 delete_modal.show();
//             }
//         }
//
//         // execute update modal on delete icon click
//         function updateModal(tabKey) {
//             id = tabKey.parentElement.parentElement.id;
//             let index = tabKey.parentElement.parentElement.children[0].innerText;
//             let date = tabKey.parentElement.parentElement.children[1].innerText;
//             let details = tabKey.parentElement.parentElement.children[2].innerText;
//             let amount = tabKey.parentElement.parentElement.children[3].innerText;
//             let remarks = tabKey.parentElement.parentElement.children[3].innerText;
//             if (update_modal) {
//                 updateModalTitle.text(`Select Column No : ${index}`);
//                 dateInput.val(date);
//                 detailsInput.val(details);
//                 amountInput.val(amount);
//                 remarksInput.val(remarks);
//                 update_modal.show();
//             }
//         }
//
//         // after modal dispose auto run
//         deleteModalID.on('hidden.bs.modal', function () {
//             fetchData();
//         });
//         updateModalID.on('hidden.bs.modal', function () {
//             updateStatus.text('');
//             updateElement('default');
//             fetchData();
//         });
//
//         $("tbody").click(function (event) {
//             console.log(event.target);
//             if (event.target.classList[2] === "delete") {
//                 // console.log("delete")
//                 deleteModal(event.target);
//             }
//             if (event.target.classList[2] === "update") {
//                 // console.log("update")
//                 updateModal(event.target);
//             }
//             div = event.target;
//         });
//
//         c_delete.click(function () {
//             c_delete.prop("disabled", true);
//             remove_();
//         });
//         c_update.click(function () {
//             updateElement();
//             update_();
//         });
//
//         //   button effect function
//         function updateElement(status = '') {
//             if (status !== "default") {
//                 c_update.prop("disabled", true);
//                 c_update.text("Updating");
//                 c_update.removeClass("btn-outline-primary");
//                 c_update.addClass("btn-outline-info");
//             } else {
//                 // for default action
//                 c_update.prop("disabled", false);
//                 c_update.text("Update");
//                 // c_update.removeAttribute("class");
//                 //c_update.setAttribute("class",'');
//
//                 c_update.removeClass("btn-outline-success");
//                 c_update.addClass("btn-outline-primary");
//             }
//             if (status === 'success') {
//                 // c_update.prop("disabled", false);
//                 c_update.text("Updated");
//                 // c_update.removeAttribute("class");
//                 //c_update.setAttribute("class",'');
//                 c_update.removeClass("btn-outline-info").addClass("btn-outline-success");
//                 // c_update.addClass("btn-outline-success");
//             }
//         }
//
//         // on click refresh button
//         refresh.click(function () {
//             fetchData();
//         });
//
//         // call function on document is loaded
//         fetchData();
//     });  //// end document ready function


</script>
</html>
