$(function() {
    const $introSlider = $('.js-intro-slider');
    const arrows = $introSlider.attr("data-arrows").split(",");

    $introSlider.slick({
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        prevArrow: `<button class="slick-prev slick-arrow"><img src="${arrows[0]}"></button>`,
        nextArrow: `<button class="slick-next slick-arrow"><img src="${arrows[1]}"></button>`,
        responsive: [
            {
              breakpoint: 768,

              settings: {
                adaptiveHeight: true,
                arrows: false,
                dots: true,
              }
            }
        ]
    });
})
