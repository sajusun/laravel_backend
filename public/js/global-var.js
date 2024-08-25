// page link var
const host = 'http://localhost:8000/';
const expensesApp = "expenses-app";
const home_Page = `${host + expensesApp}/user`;
const login_Page = `${host + expensesApp}/login`;
const signup_Page = `${host + expensesApp}/register`;
const in_add_Page = `${host + expensesApp}/in/add`;
const in_list_Page = `${host + expensesApp}/in/list`;
const in_view_Page = `${host + expensesApp}/in/view`;


// api link
const apiLink = {
    isValid: `${host}api/user/isValid`,
    login: `${host}api/user/login`,
    register: `${host}api/user/register`,
    in_add: `${host}api/expenses_app/in/add`,
    out_add: `${host}api/expenses_app/out/add`,
    incomeList_url: `${host}api/expenses_app/in/list/`,
    expensesList_url: `${host}api/expenses_app/out/list/`
}
methods = {
    // this method route data view page dynamically
    go2singlePage(pageLink) {
        $("#t_body").on('click', '.clickable', function () {
            window.location.href = `${window.location.href}/${this.parentElement.id}/view`;
            console.log(this.parentElement.id)
        });
    },
    // button effects
    buttonEffect: {
        delete() {
            return new Button_effect('c_delete', 'Deleting', 'Deleted')
        },
        update() {
            return new Button_effect('c_update', 'Updating')
        },
        login() {
            return new Button_effect('login_btn', 'Logging')
        },
        signup() {
            return new Button_effect('resister_btn', 'Processing')
        },
    }
}


function getCurrentYear() {
    const d = new Date();
    return d.getFullYear();

}

function to_home() {
    window.location.href = home_Page;
}
function redirect(url) {
    window.location.href = url;
}

function to_profile() {
    window.location.href = `${home_Page}/profile`;
}

function to_settings() {
    window.location.href = home_Page + "/settings";
}

function to_contact() {
    window.location.href = home_Page + "/contact";
}
// logout function
function logout() {
    new User().logout();
}

const token = {
    set(key) {
        sessionStorage.setItem(`${host}key`, key);
    },
    get() {
        return sessionStorage.getItem(`${host}key`);
    }
}

function setToken(key) {
    sessionStorage.setItem(`${host}key`, key);

}

function getToken() {
    return sessionStorage.getItem(`${host}key`);
}
