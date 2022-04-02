(function ($) {
	$('.slide_slick').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		prevArrow:"<button type='button' class='cct_slick_click cct_slick_prev'><i class='fa-solid fa-angle-left'></i></i></button>",
		nextArrow:"<button type='button' class='cct_slick_click cct_slick_next'><i class='fa-solid fa-angle-right' ></i></button>",

		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: false,
					dots: false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
})(jQuery);