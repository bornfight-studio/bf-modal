import BaseFilter from "./BaseFilter";
import axios from "axios";
import ModalController from "../components/ModalController";
import ModalHelper from "../components/ModalHelper";

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
        modalHelper.addEvent('populateModal', {
            detail: data,
        });

        axios.get(wpbf_frontend_ajax_object.ajax_url + "/" + wpbf_frontend_ajax_object.populate_modal + params).then((response) => {
            this.afterPopulateModal(response.data, stateHistory);
        });
    }

    afterPopulateModal(data, stateHistory) {
        let modal = document.querySelector(".js-modal");

        if (data.html && modal) {
            modal.innerHTML = data.html;
        }

        if (data.url && stateHistory) {
            this.updateUrls({
                url: data.url,
            }, data.url);
        }

        this.enableFilter();

        let modalHelper = new ModalHelper();
        modalHelper.addEvent('afterPopulateModal', {
            detail: data,
        });

        const modalController = new ModalController();
        modalController.init(true);
        modalController.openModal();
    }
}
