export const magnificPopupTrigger = () => {
    $.magnificPopup.close();
    $.magnificPopup.open({
        items: {
            src: '#modal-success'
            },
        type: 'inline',
        callbacks : {
            open : function() {
                setTimeout(()=> $.magnificPopup.close(), 4000)
            }
        }
    });
};
