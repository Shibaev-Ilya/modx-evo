$(function() {
	const $headerBtn = $('.js-header-burger');
	const $nav = $('.js-nav');
	const $body = $("body");

	const removeClass = () => {
		$headerBtn.removeClass('active');
		$nav.removeClass('active');
	}

	const toggleClasses = () => {
		$headerBtn.eq(0).toggleClass('active');
		$nav.toggleClass('active');
	}

	$headerBtn.on('click', toggleClasses);

	$nav.children().on('click', removeClass)

	$(window).on('click', function(e) {
		if (!$nav.is(e.target) && $nav.has(e.target).length === 0 
			&& !$headerBtn.is(e.target) && $headerBtn.has(e.target).length === 0 ) removeClass()
	})

})