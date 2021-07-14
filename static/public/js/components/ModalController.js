import BaseFilter from "../filters/BaseFilter";
import PopulateModalFilter from "../filters/PopulateModalFilter";


export default class ModalController {
    constructor() {
        this.DOM = {
            modal: ".js-modal",
            modalTrigger: ".js-modal-trigger",
            ajaxModalTrigger: ".js-ajax-modal-trigger",
            ajaxModalClose: ".js-ajax-modal-close",
            modalClose: ".js-modal-close",

            states: {
                isActive: "is-active",
            },
        };

        this.modal = document.querySelector(this.DOM.modal);
        this.modalTriggers = document.querySelectorAll(this.DOM.modalTrigger);
        this.modalClose = document.querySelector(this.DOM.modalClose);
        this.baseFilter = new BaseFilter();
    }

    /**
     * Init
     */
    init(onlyTriggers = false) {
        if (this.modal === null) {
            return;
        }

        if (onlyTriggers !== true) {
            this.hiddenModalEvent();
        }
        this.setEventListeners();
    }

    hiddenModalEvent() {
        if (typeof window.openPopupID !== "undefined" && window.openPopupID !== 0) {
            if (!this.modal.classList.contains('is-active')) {
                let populateModalFilter = new PopulateModalFilter();
                populateModalFilter.populateModal(window.openPopupID);
            }
        }
    }

    setEventListeners() {
        if (this.modalTriggers.length > 0) {
            this.modalTriggers.forEach((trigger) => {
                trigger.addEventListener("click", (ev) => {
                    ev.preventDefault();
                    ev.stopPropagation();


                    this.openModal();


                    if (this.baseFilter.isFilterInProgress()) {
                        return;
                    }

                    this.baseFilter.disableFilter();

                    if (ev.currentTarget.classList.contains('js-ajax-modal-trigger')) {
                        let popupModalFilter = new PopulateModalFilter();
                        popupModalFilter.populateModal(ev.currentTarget);
                    } else {
                        this.openModal();
                    }
                });
            });
        }
    }

    openModal() {
        this.modal.classList.add(this.DOM.states.isActive);
        this.setCloseEventListeners();
        setTimeout(() => {
        }, 300)

        this.baseFilter.enableFilter();
    }

    setCloseEventListeners() {
        if (this.modalClose !== null) {
            this.modalClose.addEventListener("click", () => {

                if (this.modalClose.classList.contains('js-ajax-modal-close')) {
                    let url = this.modalClose.dataset.returnUrl;

                    if (url) {
                        history.pushState(null, document.title, url);
                    }
                }

                this.closeModal();
            });
        }

        window.addEventListener("keydown", (ev) => {
            if (ev.key === "Escape") {
                this.closeModal();
            }
        });
    }

    closeModal() {
        this.modal.classList.remove(this.DOM.states.isActive);
    }
}
