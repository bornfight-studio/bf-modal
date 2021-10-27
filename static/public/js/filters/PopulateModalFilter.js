import BaseFilter from "./BaseFilter";
import axios from "axios";
import ModalController from "../components/ModalController";
import ModalHelper from "../components/ModalHelper";
import {populateModalEvent, afterPopulateModalEvent} from "../config/CustomEventConfig";

export default class PopulateModalFilter extends BaseFilter {
    /**
     *
     * @param data (object)
     * @param stateHistory
     */
    populateModal(data, stateHistory = true) {
        let params = '?page_id=' + data.postDataId;

        if (data.returnUrl) {
            params += '&return_url=' + encodeURIComponent(data.returnUrl);
        }

        let modalHelper = new ModalHelper();
        modalHelper.addEvent(populateModalEvent, {
            detail: data,
        });

        axios.get(bf_frontend_ajax_object.ajax_url + "/" + bf_frontend_ajax_object.populate_modal + params).then((response) => {
            this.afterPopulateModal(response.data, stateHistory);
        });
    }

    afterPopulateModal(data, stateHistory) {
        let modal = document.querySelector(".js-bfml-modal");

        if (data.html && modal) {
            modal.innerHTML = data.html;
        }

        if (data.url && stateHistory) {
            this.updateUrls({
                url: data.url,
            }, data.url);
        }

        this.enableFilter();

        const modalController = new ModalController();
        modalController.init(true);
        modalController.openModal();

        let modalHelper = new ModalHelper();
        modalHelper.addEvent(afterPopulateModalEvent, {
            detail: data,
        });
    }
}
