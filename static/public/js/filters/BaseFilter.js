export default class BaseFilter {
    constructor() {
        this.Base = {
            body: "body",
        };
    }

    getBodyElement() {
        return document.querySelector(this.Base.body);
    }

    disableFilter() {
        this.getBodyElement().classList.add("is-filter-disabled");
    }

    enableFilter() {
        this.getBodyElement().classList.remove("is-filter-disabled");
    }

    isFilterInProgress() {
        return this.getBodyElement().classList.contains("is-filter-disabled");
    }

    updateUrls(stateData, url) {
        history.pushState(stateData, document.title, url);
    }
}
