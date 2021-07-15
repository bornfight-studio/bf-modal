import BaseFilter from "./BaseFilter";
import axios from "axios";
import ModalController from "../components/ModalController";

export default class PopulateModalFilter extends BaseFilter {
    // getParams(element) {
    //     let params = "";
    //
    //     let pageId = element.dataset.pageId;
    //     let moduleIndex = element.dataset.moduleIndex;
    //     let modalType = element.dataset.modalType;
    //
    //     params += "?page_id=" + pageId + "&module_index=" + moduleIndex + "&modal_type=" + modalType;
    //
    //
    //     return params;
    // }

    /**
     *
     * @param data (object)
     * @param stateHistory
     */
    populateModal(data, stateHistory = true) {
        // let url = element.dataset.apiUrl;


        let params = '?page_id=' + data.postDataId;

        if (data.returnUrl) {
            params += '&return_url=' + encodeURIComponent(data.returnUrl);
        }

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

        const modalController = new ModalController();
        modalController.init(true);
        modalController.openModal();
    }
}
