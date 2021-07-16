import SwitcherController from "./components/SwitcherController";

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
};

/**
 * Document ready callback
 */

ready(() => {
    const switcherController = new SwitcherController();

    switcherController.init();
});
