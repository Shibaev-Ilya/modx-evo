(function ($, app) {

    /*function serviceNav() {
        $('body').on('click', '.js-service-nav', function (e) {
            e.preventDefault();
            let $this = $(this);
            let itemId = $this.attr('href');
            let scrollTo = $(itemId).offset().top;
            $('body,html').animate({
                scrollTop: scrollTo - 43
            }, 2000);
        });
    }*/

    function initServiceSlider() {
        let slider = $('.js-service-slider');
        if (!slider.hasClass('slick-initialized')) {
            slider.slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                mobileFirst: true,
                centerMode: true,
                dots: false,
                arrows: true,
                centerPadding: 0,
                responsive: [{
                        breakpoint: 1980,
                        settings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 560,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 300,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });
        }
    }

    function serviceMap() {
        let map = $('#footer-map');

        if (map.length < 1) {
            return false;
        }

        let coords = map.data('coords'),
            baloon = map.data('baloon');

        let myMap = new ymaps.Map('footer-map', {
            center: coords,
            zoom: 16,
            controls: [],
            behaviors: ['drag', 'dblClickZoom', 'multiTouch']
        }, {
            searchControlProvider: 'yandex#search'
        });

        let placemark1 = new ymaps.Placemark(
            coords, {
                hintContent: 'Kia',
                balloonContentHeader: 'Kia',
                balloonContent: baloon,
            }, {
                iconLayout: 'default#image',
                iconImageSize: [96, 69],
                iconImageOffset: [-45, -65],
                iconImageHref: './_assets/img/service/placemark.png',
            }
        );

        myMap.geoObjects.add(placemark1);

        function isMobile() {
            if (navigator.userAgent.match(/Android/i) ||
                navigator.userAgent.match(/webOS/i) ||
                navigator.userAgent.match(/iPhone/i) ||
                navigator.userAgent.match(/iPad/i) ||
                navigator.userAgent.match(/iPod/i) ||
                navigator.userAgent.match(/BlackBerry/i) ||
                navigator.userAgent.match(/Windows Phone/i)
            ) {
                return true;
            } else {
                return false;
            }
        }

        if (isMobile()) {
            myMap.behaviors.disable('drag');
        }
    }

    function initServiceMap() {
        ymaps.ready(serviceMap);
    }

    function disclaimer() {
        $('body').on('click', '.js-disclaimer', function () {
            $('.js-disclaimer-body').stop().slideToggle();
        });
    }

    function disclaimerService() {
        $('body').on('click', '.js-disclaimer-service', function () {
            $('.js-disclaimer-service-body').stop().slideToggle();
        });
    }

    initServiceSlider();
    //app.serviceNav = serviceNav;
    //app.initServiceSlider = initServiceSlider;
    //app.initServiceMap = initServiceMap;
    //app.disclaimer = disclaimer;
    //app.disclaimerService = disclaimerService;

    disclaimer();
    disclaimerService();


})(jQuery, window.app);
