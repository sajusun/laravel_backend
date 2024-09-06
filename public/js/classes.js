// Alert message DOM class
class AlertMessages {
    #alertElementID;

    constructor(alertElementID) {
        this.#alertElementID = $('#' + alertElementID)
    }

    success(message) {
        this.#alertElementID.html(`<div class="alert text-success" role="alert">${message}</div>`);
    }

    info(message) {
        this.#alertElementID.html(`<div class="alert text-info" role="alert">${message}</div>`);
    }

    danger(message) {
        this.#alertElementID.html(`<div class="alert text-danger" role="alert">${message}</div>`);
    }
}

// button effect class-make button onLoading effect
class Button_effect {
    #defaultButton = null;
    #buttonID;
    #displayName;
    #onFinishedName;
    #loadingName = '';
    _processing = false;

    constructor(ButtonID, OnLoadingName, OnFinishedName = null) {
        this.#buttonID = ButtonID;
        this.#loadingName = OnLoadingName;
        this.#onFinishedName = OnFinishedName
        this.#defaultButton = $('#' + ButtonID);
        this.#displayName = this.#defaultButton.text();
    }

    default() {
        this.#defaultButton.text(this.#displayName);
        this.#defaultButton.prop("disabled", false);
    }

    starProcessing() {
        this.#defaultButton.text(this.#loadingName);
        this.#defaultButton.prop("disabled", true);
    }

    disabled() {
        if (this.#onFinishedName != null) {
            this.#defaultButton.text(this.#onFinishedName);
        } else {
            this.#defaultButton.text(this.#displayName);
        }
        this.#defaultButton.prop("disabled", true);
    }
}

class CircularLoading {
    defaultElement = null;
    processingElement;
    displayElementID;
    processing = false;

    constructor(DisplayElementID, ProcessingElementID) {
        this.displayElementID = DisplayElementID;
        this.processingElement = $('#' + ProcessingElementID);
        this.defaultElement = $('#' + DisplayElementID);
    }

    default() {
        this.defaultElement.css('display', 'block');
        this.processingElement.css('display', 'none');
        //this.defaultButton.parentElement.html(this.processingElement);
    }

    starProcessing() {
        this.defaultElement.css('display', 'none');
        this.processingElement.css('display', 'block');

        // this.defaultButton.text(this.loadingName);
        // this.defaultButton.prop("disabled", true);
    }

    boot(processing) {
        this.processing = processing;
        if (this.processing) {
            this.starProcessing();
        } else {
            this.default();
        }
    }
}

// server Request class-send all server request trough here
class serverRequest {
    url;
    success;
    response;
    message;
    method;
    data;

    async xPost() {
        let result;
        await axios.post(this.url, this.data, {
            headers: {
                'Authorization': 'Bearer ' + token.get(),
            }
        })
            .then(async function (response) {
                //console.log(response.data);
                result = await response.data;
            })
            .catch(function (error) {
                //console.log(error);
                result = {
                    success: false,
                    message: error.response.data.message
                }
            });
        return result;
    }

    async xGet() {
        let result;
        await axios.get(this.url, {
            headers: {
                'Authorization': 'Bearer ' + token.get(),
            }
        })
            .then(async function (response) {
                //console.log(response.data);
                result = await response.data;
            })
            .catch(function (error) {
              //  console.log(error);
                result = {
                    success: false,
                    message: error.response.data.message
                }
            });
        return result;
    }

}

// User Model Class
class User {
    #revokeLink = `${host}api/user/logout`;
    #isValid_link = apiLink.isValid;
    #loginLink = apiLink.login;
    #registerLink=apiLink.register;
    #server = new serverRequest();

    // user registration method
    signup(){
        const responseMgs = $('#responseMgs');
        responseMgs.html('');
        const btnEffect = methods.buttonEffect.signup();
        this.#server.url = this.#registerLink;
        let name = $("#name").val();
        let email = $("#email").val();
        let pass = $("#password").val();
        let c_pass = $("#c_password").val();
        // if (pass !==  c_pass) {
        //     responseMgs.html(`<div class='alert alert-danger'>Password not match</div>`);
        // } else {
            this.#server.data = {
                name: name,
                email: email,
                password: pass,
                password_confirmation: c_pass
            };
            btnEffect.starProcessing();
            this.#server.xPost().then((response) => {
                if (response['success']) {
                    console.log(response)
                    token.set(response['access_token']);
                    responseMgs.html(`<div class='alert alert-success' role='alert'>${response['message']}</div>`);
                   // window.location.href = home_Page;
                    btnEffect.disabled();
                } else {
                    btnEffect.default();
                    responseMgs.html(`<div class='alert alert-danger' role='alert'>${response['message']}</div>`);
                }

            });
       // }

    }

    // login method.
    login() {
        const loginMgs = $('#loginMgs');
        const btnEffect = methods.buttonEffect.login();
        this.#server.url = this.#loginLink;
        let email = $("#email").val();
        let pass = $("#password").val();
        const data = {
            email: email,
            password: pass
        }
        if (email === "" || pass === "") {
            loginMgs.html(`<div class='alert alert-danger'>Enter Required Field</div>`);
        } else {
            this.#server.data = data;
            btnEffect.starProcessing();
            this.#server.xPost().then((response) => {
                if (response['success']) {
                    token.set(response['access_token']);
                    window.location.href = home_Page;
                } else {
                    btnEffect.default();
                    loginMgs.html(`<div class='alert alert-danger' role='alert'>${response['message']}</div>`);
                }

            })
        }
    }

    // checking if user is valid or logged in
    isValid_User() {
        this.#server.url = this.#isValid_link;
        this.#server.xGet().then((response) => {
            if (response.success !== true) {
                if (window.location.href !== signup_Page) {
                    if (window.location.href !== login_Page) {
                        window.location.href = login_Page;
                    }
                }
            } else {
                if (window.location.href === login_Page) {
                    window.location.href = home_Page;
                }
            }
        })
    }

    // user logout method
    logout() {
        this.#server.url = this.#revokeLink;
        this.#server.xGet().then((response) => {
            if (response.success === true) {
                if (window.location.href !== login_Page) {
                    window.location.href = login_Page;
                    // window.refresh();
                }
            }
        })
    }
}

