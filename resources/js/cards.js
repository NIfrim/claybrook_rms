$(document).ready(function () {
	const readMoreBtn = $('.card-read-more');

	// Expand text container and rotate
	readMoreBtn.click(function () {
		$(this).parent().siblings('.card-text').toggleClass('expand');
		$(this).toggleClass('rotate180');
	});
});