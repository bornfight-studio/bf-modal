export default class SwitcherController {
    constructor() {
        this.DOM = {
            switcher: ".js-wpbf-switcher",
        }

        this.switchers = document.querySelectorAll(this.DOM.switcher);
    }

    init() {
        this.setSwitcher();

        this.initEvent();
    }

    setSwitcher() {
        if (this.switchers.length > 0) {
            this.switchers.forEach((switcher) => {
                let input = switcher.querySelector("input[type=checkbox]");

                if (input.checked && !switcher.classList.contains("is-active")) {
                    switcher.classList.add("is-active");
                }
            });
        }
    }

    initEvent() {
        if (this.switchers.length > 0) {
            this.switchers.forEach((switcher) => {
                let input = switcher.querySelector("input[type=checkbox]");

                input.addEventListener('change', (event) => {
                    if (switcher.classList.contains("is-active")) {
                        switcher.classList.remove("is-active");
                    } else {
                        switcher.classList.add("is-active");
                    }
                });
            });
        }
    }
}
