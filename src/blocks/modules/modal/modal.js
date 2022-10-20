$(function() {
    $('.js-popup-link').magnificPopup({
        type:'inline',
        midClick: true
    });

    $(".js-popup-close").on("click", function() {
        $.magnificPopup.close()
    })
})