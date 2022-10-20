$(()=> {
    ymaps.ready(init); 
	let newMap;

	function init() {
		newMap = new ymaps.Map("ymaps", {
            center: [55.542105, 37.546345],
            zoom: 12,
            controls: []
		});

        const placemark = new ymaps.Placemark([55.542105, 37.546345], {
            hintContent: "Kia",
            hideIcon: false
        });
        
        newMap.geoObjects.add(placemark);
        const width = $(window).width()
        
        if(width < 770) newMap.behaviors.disable('drag');
	};
})
