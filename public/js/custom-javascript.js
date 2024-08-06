// page link var
const host = 'http://localhost:8000/';
const expensesApp = "expenses-app";
const home_Page = `${host+expensesApp}/user`;
const login_Page = `${host+expensesApp}/login`;
const in_add_Page = `${host+expensesApp}/in/add`;
const in_list_Page = `${host+expensesApp}/in/list`;
const in_view_Page = `${host+expensesApp}/in/single-view`;
// dont remove this var
let revoke_;
// api link
const isValidLik = `${host}api/user/isValid`;
const loginLik = `${host}api/user/login`;

function to_home() {
    window.location.href=home_Page;
}
function to_profile() {
    window.location.href=`${home_Page}/profile`;
}
function to_settings() {
    window.location.href=home_Page+"/settings";
}
function to_contact() {
    window.location.href=home_Page+"/contact";
}
function logout() {
    revoke_()
    //setToken('null');
    window.location.href=login_Page;
}
function setToken(key) {
    sessionStorage.setItem(`${host}key`, key);
}

function getToken() {
    return sessionStorage.getItem(`${host}key`);
}

$(document).ready(function () {
    checkUser_();
    function checkUser_() {
        const isValid = isValidLik;
        let xHttp = new XMLHttpRequest();
        xHttp.open("GET", isValid, true);
        xHttp.setRequestHeader('Accept', 'Application/json');
        xHttp.setRequestHeader('contentType', 'json');
        xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        xHttp.onload = () => {
            let data = JSON.parse(xHttp.responseText);
            if (data['isValid'] !== true) {
                if (window.location.href !== login_Page) {
                    window.location.href = login_Page;
                }
            }
        };
        xHttp.send();
    }
     revoke_= function revokeUser_() {
        const revokeLink = `${host}api/user/logout`;
        let xHttp = new XMLHttpRequest();
        xHttp.open("GET", revokeLink, true);
        xHttp.setRequestHeader('Accept', 'Application/json');
        xHttp.setRequestHeader('contentType', 'json');
        xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        xHttp.onload = () => {
            let data = JSON.parse(xHttp.responseText);
            console.log(data)
            if (data['success'] !== true) {
                if (window.location.href !== login_Page) {
                   // window.location.href = login_Page;
                    window.refresh();
                }
            }
        };
        xHttp.send();
    }


    $("#inAdd").click(function () {
        window.location.href = 'http://localhost:8000/expenses-app/in/add';
    });
    $("#viewList").click( function () {
        window.location.href = 'http://localhost:8000/expenses-app/in/list';
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
    let url = `${host}api/expenses_app/in/list/`;
    let id = '';
    let tbody = $('#t_body');
    let refresh = $('#refreshIcon');
    let loading = $('#loadingIcon');

    // fetch data from server
    function fetchData() {
        // refresh.prop('hidden', true);
        refresh.css('display', 'none');
        loading.prop('hidden', false);
        let element = "";
        const xHttp = new XMLHttpRequest();
        xHttp.open("GET", url, true);
        xHttp.setRequestHeader('Accept', 'Application/json');
        xHttp.setRequestHeader('contentType', 'json');
        xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        xHttp.onload = () => {
            let toJson = JSON.parse(xHttp.responseText);
            let list = toJson['data'];
            if (toJson['success']) {
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
            }
            loading.prop("hidden", true);
            refresh.css('display', 'block');
        };
        xHttp.send();
    } // end fetch data function

    // request update data to server
    function update_() {
        const updateLink = `${url + id}/update`;
        const formData = new FormData();
        formData.append("date", dateInput.val());
        formData.append("details", detailsInput.val());
        formData.append("amount", amountInput.val());
        formData.append("remarks", remarksInput.val());

        const xHttp = new XMLHttpRequest();
        xHttp.open("POST", updateLink, true);
        xHttp.setRequestHeader('Accept', 'Application/json');
        xHttp.setRequestHeader('contentType', 'json');
        xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        xHttp.onload = () => {
            let toJson = JSON.parse(xHttp.responseText);
            let mgs = toJson['message'];
            let status = toJson['success'];
            //console.log(`${status} : ${mgs}`);
            if (!status) {
                updateStatus.text("update failed");
                updateElement('default');
            } else {
                updateStatus.text(mgs);
                updateElement('success');
            }
            fetchData();
        };
        xHttp.send(formData);
    }

    // request remove data to server
    function remove_() {
        const deleteLink = `${url + id}/delete`;
        const xHttp = new XMLHttpRequest();
        xHttp.open("GET", deleteLink, true);
        xHttp.setRequestHeader('Accept', 'Application/json');
        xHttp.setRequestHeader('contentType', 'json');
        xHttp.setRequestHeader('Authorization', 'Bearer ' + getToken());
        xHttp.onload = () => {
            let toJson = JSON.parse(xHttp.responseText);
            let mgs = toJson['message'];
           // let status = toJson['success'];
           // console.log(`${status} : ${mgs}`);
            mgsArea.text(mgs);
            c_delete.prop("disabled", false);
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
        fetchData();
    });
    updateModalID.on('hidden.bs.modal', function () {
        updateStatus.text('');
        updateElement('default');
        fetchData();
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
    $("#t_body").on('click','.clickable',function () {
        // if (event.target !== event.target.parentElement.lastElementChild) {
        //     console.log('true');
        //container.load(in_view_Page);
        window.location.href=in_view_Page;
        //
        // } else {
        //     console.log('false');
        // }
         console.log(this.parentElement)
        // console.log(event.target.parentElement);
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
        fetchData();
    });

    // call function on document is loaded
    fetchData();
}
