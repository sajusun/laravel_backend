/*don`t remove any global var*/
// (function () {
//     const user = new User();
//     user.isValid_User();
// })();
$(document).ready(function () {

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


// display data dynamically dataList
class DataList {
    tbody;
    circularBtn = new CircularLoading('refreshIcon', 'loadingIcon')
    fetch = new serverRequest();

    constructor() {
        this.tbody = $('#t_body');
    }

    viewList(link) {
        this.circularBtn.starProcessing();
        let element = "";
        this.fetch.url = link;
        const self = this;
        this.fetch.xGet().then(function (response) {
            self.tbody.empty();
            let list = response.data;
            console.log(response)
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
                self.circularBtn.default();
            }
        });
    }
}

//Income Model
class Income extends DataList {
    addLink = apiLink.in_add;
    listLink = apiLink.incomeList_url;
    deleteM = new DeleteModal();
    updateM = new UpdateModal();

    viewData() {
        $('#refreshIcon').click(() => {
            this.#getData();
        });
        methods.go2singlePage();
        this.#getData();
        this.#modalFunc();
    }

    #modalFunc() {
        let self = this;
        $("tbody").click(function (event) {
            if (event.target.classList[2] === "delete") {
                self.deleteM.show(event.target);
            }
            if (event.target.classList[2] === "update") {
                self.updateM.show(event.target);
            }
        });

        self.deleteM.deleteProcess(this.listLink);
        self.updateM.updateProcess(this.listLink);
    }

    #getData() {
        this.viewList(this.listLink);
    }

}

/*// Expenses Model*/

class Expenses extends DataList {
    addLink = apiLink.out_add;
    listLink = apiLink.expensesList_url;
    deleteM = new DeleteModal();
    updateM = new UpdateModal();

    viewData() {
        methods.go2singlePage();
        $('#refreshIcon').click(() => {
            this.#getData();
        });
        this.#getData();
        this.#modalFunc();
    }

    #modalFunc() {
        let self = this;
        $("tbody").click(function (event) {
            if (event.target.classList[2] === "delete") {
                self.deleteM.show(event.target);
            }
            if (event.target.classList[2] === "update") {
                self.updateM.show(event.target);
            }
        });
        self.deleteM.modalOnClose();
        self.updateM.modalOnClose();
        self.deleteM.deleteProcess(this.listLink);
        self.updateM.updateProcess(this.listLink);
    }

    #getData() {
        this.viewList(this.listLink);
    }

}

/*Delete Model*/
class DeleteModal extends DataList {

    delete_modal = new bootstrap.Modal('#deleteModal');
    btn_effect = methods.buttonEffect.delete();
    deleteModalID = $('#deleteModal');
    modalTitle = $('#deleteModalLabel');
    response_status = $('#response_status');
    id;
    c_delete = $('#c_delete');
    server = new serverRequest();

    /*delete model show method*/
    show(tabKey) {
        const columnId = tabKey.parentElement.parentElement.firstElementChild.innerText
        this.id = tabKey.parentElement.parentElement.id;
        if (this.delete_modal) {
            this.modalTitle.text(`Select Column No : ${columnId}`);
            this.response_status.text("Confirm to Delete!");
            this.delete_modal.show();
        }

    }

    /*onModel close method*/
    modalOnClose() {
        let self = this;
        this.deleteModalID.on('hidden.bs.modal', function () {
            self.btn_effect.default();
        });
    }

    /*delete process method*/
    deleteProcess(link) {
        this.c_delete.click(() => {
            this.btn_effect.starProcessing();
           // let responseMgs = new AlertMessages('response_status');
            const deleteLink = `${link + this.id}/delete`;
            const server = new serverRequest();
            server.url = deleteLink;
            server.xGet().then((response) => {
                if (!response.success) {
                    this.btn_effect.default()
                }
                this.viewList(link)
                this.btn_effect.disabled()
                this.response_status.text(response.message)
            })
        })
    }
}

/*Update model*/
class UpdateModal extends DataList {
    /*[Update model properties]*/
    btn_effect = methods.buttonEffect.update();
    update_modal = new bootstrap.Modal('#updateModal');
    updateModalID = $('#updateModal');
    updateModalTitle = $('#updateModalLabel');
    c_update = $('#c_update');
    updateStatus = $('#updateStatus');
    dateInput = $("#date");
    detailsInput = $("#details");
    amountInput = $("#amount");
    remarksInput = $("#remarks");
    id;

    /*display model on call*/
    show(tabKey) {
        this.id = tabKey.parentElement.parentElement.id;
        let index = tabKey.parentElement.parentElement.children[0].innerText;
        let date = tabKey.parentElement.parentElement.children[1].innerText;
        let details = tabKey.parentElement.parentElement.children[2].innerText;
        let amount = tabKey.parentElement.parentElement.children[3].innerText;
        let remarks = tabKey.parentElement.parentElement.children[4].innerText;
        if (this.update_modal) {
            this.updateModalTitle.text(`Select Column No : ${index}`);
            this.dateInput.val(date);
            this.detailsInput.val(details);
            this.amountInput.val(amount);
            this.remarksInput.val(remarks);
            this.update_modal.show();
        }

    }

    /*model on close method*/
    modalOnClose() {
        let self = this;
        this.updateModalID.on('hidden.bs.modal', function () {
            self.btn_effect.default();
        });
    }

    /*Update process method*/
    updateProcess(link) {
        this.c_update.click(() => {
            this.btn_effect.starProcessing();
            const updateLink = `${link + this.id}/update`;
            let data = {
                date: this.dateInput.val(),
                details: this.detailsInput.val(),
                amount: this.amountInput.val(),
                remarks: this.remarksInput.val(),
            };
            let update = new serverRequest();
            update.url = updateLink;
            update.data = data;
            update.xPost().then((response) => {
                if (!response.success) {
                    this.updateStatus.text(response.message);
                } else {
                    this.updateStatus.text(response.message);
                }
                this.btn_effect.default();
                this.viewList(link);
            })

        })

    }
}






