import ModalController from "./components/ModalController";

const ready = (callbackFunc) => {
    if (document.readyState !== "loading") {
        /**
         * Document is already ready, call the callback directly
         */
        callbackFunc();
    } else if (document.addEventListener) {
        /**
         * All modern browsers to register DOMContentLoaded
         */
        document.addEventListener("DOMContentLoaded", callbackFunc);
    } else {
        /**
         * Old IE browsers
         */
        document.attachEvent("onreadystatechange", function () {
            if (document.readyState === "complete") {
                callbackFunc();
            }
        });
    }

    window.addEventListener("popstate", (ev) => {
        let currentState = history.state;

        if (currentState) {
            if (currentState.url) {
                // console.log(currentState.url);

                location.reload();
            }
        }
    });
};

/**
 * Document ready callback
 */

ready(() => {
    const modalController = new ModalController();

    modalController.init();
});
