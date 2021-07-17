export default class ModalHelper {
    addEvent(eventName, data = {}) {
        let event = new CustomEvent(eventName, data);

        document.dispatchEvent(event);
    }
}
