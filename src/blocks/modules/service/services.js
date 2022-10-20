const changeModalBody = function(actionData) {
    const modal = document.querySelector(`#modal-special-call`);
    const modalBody = modal.querySelector(`.modal__left_content`);
    modalBody.innerHTML = actionData;
}

const services = document.querySelector(`.special__body`);

if (services) {
    services.addEventListener(`click`, (evt) => {
        const target = evt.target;

        if (target.closest(`.js-popup-link`)) {
            const service = target.closest(`.js-popup-link`);
            const text = service.querySelector('.js-popup-text').innerHTML;
            changeModalBody(text);
        }
    })
}
