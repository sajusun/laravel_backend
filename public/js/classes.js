class AlertMessages {
    alertElementID;

    constructor(alertElementID) {
        this.alertElementID = $('#' + alertElementID)
    }

    success(message) {
        this.alertElementID.html(`<div class="alert text-success" role="alert">${message}</div>`);
    }

    info(message) {
        this.alertElementID.html(`<div class="alert text-info" role="alert">${message}</div>`);
    }

    danger(message) {
        this.alertElementID.html(`<div class="alert text-danger" role="alert">${message}</div>`);
    }
}

class Button_effect {
    defaultButton = null;
    buttonID;
    displayName;
    loadingName = '';
    processing = false;

    constructor(ButtonID, OnLoadingName) {
        this.buttonID = ButtonID;
        this.loadingName = OnLoadingName;
        this.defaultButton = $('#' + ButtonID);
        this.displayName = $('#' + ButtonID).text();
    }

    default() {
        if (this.processing) {
            this.defaultButton.text(this.displayName);
            this.defaultButton.prop("disabled", false);
            //this.defaultButton.parentElement.html(this.processingElement);
        }else{
            this.defaultButton.text(this.displayName);
            this.defaultButton.prop("disabled", true);
        }
    }

    starProcessing() {
        this.defaultButton.text(this.loadingName);
        this.defaultButton.prop("disabled", true);
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
                'Authorization': 'Bearer ' + getToken(),
            }
        })
            .then(async function (response) {
                //console.log(response.data);
                result = await response.data;
            })
            .catch(function (error) {
                console.log("server rq error" + error);
            });
        return result;
    }

    async xGet() {
        let result;
        await axios.get(this.url, {
            headers: {
                'Authorization': 'Bearer ' + getToken(),
            }
        })
            .then(async function (response) {
                //console.log(response.data);
                result = await response.data;
            })
            .catch(function (error) {
                console.log("server rq error" + error);
            });
        return result;
    }

}


// modal class
