
// dont remove this var
let revoke_;

$(document).ready(async function () {
    let server = new serverRQ();
    server.url = isValidLik;
    //server._async = false;
    //server.url = isValidLik;
    checkUser_();

    function checkUser_() {
        server.send_();
        if (server.success !== true) {
            if (window.location.href !== login_Page) {
                window.location.href = login_Page;
            }
        }

        // const isValid = isValidLik;
        // let xHttp = new XMLHttpRequest();
        // xHttp.open("GET", isValid, true);
        // xHttp.setRequestHeader('Accept', 'Application/json');
        // xHttp.setRequestHeader('contentType', 'json');
        // xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        // xHttp.onload = () => {
        //     let data = JSON.parse(xHttp.responseText);
        //     if (data['success'] !== true) {
        //         if (window.location.href !== login_Page) {
        //             window.location.href = login_Page;
        //         }
        //     }
        // };
        // xHttp.send();
    }

    revoke_ = function revokeUser_() {
        const revokeLink = `${host}api/user/logout`;
        // let xHttp = new XMLHttpRequest();
        // xHttp.open("GET", revokeLink, true);
        // xHttp.setRequestHeader('Accept', 'Application/json');
        // xHttp.setRequestHeader('contentType', 'json');
        // xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        let revoke = new serverRQ(revokeLink);
        revoke.send_();
        if (revoke.success !== true) {
            if (window.location.href !== login_Page) {
                window.location.href = login_Page;
                window.refresh();
            }
        }

        // xHttp.onload = () => {
        //     let data = JSON.parse(xHttp.responseText);
        //     console.log(data)
        //     if (data['success'] !== true) {
        //         if (window.location.href !== login_Page) {
        //             // window.location.href = login_Page;
        //             window.refresh();
        //         }
        //     }
        // };
        // xHttp.send();
    }


    $("#inAdd").click(function () {
        window.location.href = 'http://localhost:8000/expenses-app/in/add';
    });
    $("#outAdd").click(function () {
        window.location.href = 'http://localhost:8000/expenses-app/out/add';
    });

    $("#inList").click(function () {
        window.location.href = 'http://localhost:8000/expenses-app/in/list';
    });
    $("#outList").click(function () {
        window.location.href = 'http://localhost:8000/expenses-app/out/list';
    });
});

function dangerAlertBox(setElement, message) {
    return `<div class="alert alert-danger" role="alert">${message}</div>`;
}

let div = ''

function list() {

    let container = $('.container');
    // modal item var
    const delete_modal = new bootstrap.Modal('#deleteModal');
    const deleteModalID = $('#deleteModal');
    const modalTitle = $('#deleteModalLabel');
    const mgsArea = $('#deleteMgs');
    const c_delete = $('#c_delete');

    // update modal var
    const update_modal = new bootstrap.Modal('#updateModal');
    const updateModalID = $('#updateModal');
    const updateModalTitle = $('#updateModalLabel');
    const c_update = $('#c_update');
    const updateStatus = $('#updateStatus');

    let dateInput = $("#date");
    let detailsInput = $("#details");
    let amountInput = $("#amount");
    let remarksInput = $("#remarks");

    //
    let incomeList_url = `${host}api/expenses_app/in/list/`;
    let expensesList_url = `${host}api/expenses_app/in/list/`;
    let id = '';
    let tbody = $('#t_body');
    let refresh = $('#refreshIcon');
    let loading = $('#loadingIcon');

    // fetch data from server
    function fetchIncome() {
        // refresh.prop('hidden', true);
        refresh.css('display', 'none');
        loading.prop('hidden', false);
        let element = "";
        let fetch_i = new serverRQ();
        fetch_i.url = incomeList_url;
        fetch_i.send_();
        let list = fetch_i.response.data;
        if (fetch_i.success) {
            for (let i = 0; i < list.length; i++) {
                element += `<tr id='${list[i].id}'>
<td class='clickable'> ${i + 1} </td>
<td class='clickable'> ${list[i].date} </td>
<td class='clickable'> ${list[i].details}</td>
 <td class='clickable'>${list[i].amount}</td>
 <td class='clickable'>${list[i].remarks}</td>
<td class='d-flex justify-content-between'>
<i type='button' class='material-icons text-secondary update'>edit_square</i>
<i type='button' class='material-icons text-danger delete'>delete</i>
</td>
</tr>`;
            }
            tbody.empty();
            tbody.append(element);
            //}
            loading.prop("hidden", true);
            refresh.css('display', 'block');
        }
    } // end fetch data function
    function fetchExpenses() {
        // refresh.prop('hidden', true);
        refresh.css('display', 'none');
        loading.prop('hidden', false);
        let element = "";
        let fetch = new serverRQ(expensesList_url);
        fetch.send_();

        let list = fetch.response.data
        if (fetch.success) {
            for (let i = 0; i < list.length; i++) {
                element += `<tr id='${list[i].id}'>
<td class='clickable'> ${i + 1} </td>
<td class='clickable'> ${list[i].date} </td>
<td class='clickable'> ${list[i].details}</td>
 <td class='clickable'>${list[i].amount}</td>
 <td class='clickable'>${list[i].remarks}</td>
<td class='d-flex justify-content-between'>
<i type='button' class='material-icons text-secondary update'>edit_square</i>
<i type='button' class='material-icons text-danger delete'>delete</i>
</td>
</tr>`;
            }
            tbody.empty();
            tbody.append(element);
            //}
            loading.prop("hidden", true);
            refresh.css('display', 'block');
        }
        // xHttp.send();
    } // end fetch data function
    // request update data to server

    function update_() {
        const updateLink = `${incomeList_url + id}/update`;
        const formData = new FormData();
        formData.append("date", dateInput.val());
        formData.append("details", detailsInput.val());
        formData.append("amount", amountInput.val());
        formData.append("remarks", remarksInput.val());
        let update = new serverRQ(updateLink, 'POST', formData);
        console.log(update)
        update.send_();
        if (!update.success) {
            updateStatus.text(update.message);
            updateElement('default');
        } else {
            updateStatus.text(update.message);
            updateElement('success');
        }
        fetchIncome();
    }

    // request remove data to server
    function remove_() {
        c_delete.prop("disabled", true);
        const deleteLink = `${incomeList_url + id}/delete`;
        let remove = new serverRQ(deleteLink, 'GET');
        remove.send_();
        if (!remove.success) {
            c_delete.prop("disabled", false);
        }
        mgsArea.text(remove.message);
        fetchIncome();
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

    // execute update modal on delete icon click
    function updateModal(tabKey) {
        id = tabKey.parentElement.parentElement.id;
        let index = tabKey.parentElement.parentElement.children[0].innerText;
        let date = tabKey.parentElement.parentElement.children[1].innerText;
        let details = tabKey.parentElement.parentElement.children[2].innerText;
        let amount = tabKey.parentElement.parentElement.children[3].innerText;
        let remarks = tabKey.parentElement.parentElement.children[4].innerText;
        if (update_modal) {
            updateModalTitle.text(`Select Column No : ${index}`);
            dateInput.val(date);
            detailsInput.val(details);
            amountInput.val(amount);
            remarksInput.val(remarks);
            update_modal.show();
        }
    }

    // after modal dispose auto run
    deleteModalID.on('hidden.bs.modal', function () {
        fetchIncome();
    });
    updateModalID.on('hidden.bs.modal', function () {
        updateStatus.text('');
        updateElement('default');
        fetchIncome();
    });

    $("tbody").click(function (event) {
        //console.log(event.target);
        if (event.target.classList[2] === "delete") {
            deleteModal(event.target);
        }
        if (event.target.classList[2] === "update") {
            updateModal(event.target);
        }
        // div = event.target;
    });
    $("#t_body").on('click', '.clickable', function () {
        window.location.href = in_view_Page;
        console.log(this.parentElement)
    });

    c_delete.click(function () {
        c_delete.prop("disabled", true);
        remove_();
    });
    c_update.click(function () {
        updateElement();
        update_();
    });

    //   button effect function
    function updateElement(status = '') {
        if (status !== "default") {
            c_update.prop("disabled", true);
            c_update.text("Updating");
            c_update.removeClass("btn-outline-primary");
            c_update.addClass("btn-outline-info");
        } else {
            // for default action
            c_update.prop("disabled", false);
            c_update.text("Update");
            // c_update.removeAttribute("class");
            //c_update.setAttribute("class",'');

            c_update.removeClass("btn-outline-success");
            c_update.addClass("btn-outline-primary");
        }
        if (status === 'success') {
            // c_update.prop("disabled", false);
            c_update.text("Updated");
            // c_update.removeAttribute("class");
            //c_update.setAttribute("class",'');
            c_update.removeClass("btn-outline-info").addClass("btn-outline-success");
            // c_update.addClass("btn-outline-success");
        }
    }

    // on click refresh button
    refresh.click(function () {
        fetchIncome();
    });

    // call function on document is loaded
   // fetchIncome();
}

// server request class
class serverRQ {
    url;
    success;
    response;
    message;
    method = "GET";
    data;
    _async = false;

    constructor(url, method = "GET", data, async = false) {
        this.method = method;
        this.url = url;
        this.data = data;
        this._async = async;
        // this.send_();
    }

    send_() {
        let http = new XMLHttpRequest();
        http.open(this.method, this.url, this._async);
        http.setRequestHeader('Accept', 'Application/json');
        http.setRequestHeader('contentType', 'json');
        http.setRequestHeader('Authorization', 'Bearer ' + getToken());
        http.onload = () => {
            this.response = JSON.parse(http.responseText);
            this.message = this.response['message'];
            this.success = this.response['success'];
        };
        http.send(this.data);
    }
}

class DataList {
    tbody;
    refresh;
    loading;

    constructor() {
        this.tbody = $('#t_body');
        this.refresh = $('#refreshIcon');
        this.loading = $('#loadingIcon');
    }

    viewList(link) {
        this.refresh.css('display', 'none');
        this.loading.prop('hidden', false);
        let element = "";
        let fetch = new serverRequest();
        fetch.url = link;
        const self = this;
        fetch.xFetch().then(function (response) {
            self.tbody.empty();
            let list = response.data;
            if (response.success) {
                for (let i = 0; i < list.length; i++) {
                    element += `<tr id='${list[i].id}'>
<td class='clickable'> ${i + 1} </td>
<td class='clickable'> ${list[i].date} </td>
<td class='clickable'> ${list[i].details}</td>
 <td class='clickable'>${list[i].amount}</td>
 <td class='clickable'>${list[i].remarks}</td>
<td class='d-flex justify-content-between'>
<i type='button' class='material-icons text-secondary update'>edit_square</i>
<i type='button' class='material-icons text-danger delete'>delete</i>
</td>
</tr>`;
                }
                self.tbody.append(element);
                //}
                self.loading.prop("hidden", true);
                self.refresh.css('display', 'block');
            }
        });
    }

}




