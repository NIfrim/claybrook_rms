$(document).ready(function() {
	$('.nav-buttons-wrapper .nav-link').click(function () {
		const allNavLinks = $('.nav-buttons-wrapper .nav-link');
		const allSubmenus = $('.sub-menu-list');

		// Collapse all nav links
		allNavLinks.attr('aria-expanded', 'false');
		allNavLinks.addClass('collapsed');
		allSubmenus.removeClass('show');

		$(this).attr('aria-expanded', 'true');
		$(this).removeClass('collapsed');
	});

	let lastScrollPos = 0;

	$('main').scroll(function () {
		let currentScrollPos = this.scrollTop;
		let windowWidth = $(window).width();

		const navButtons = $('.web-title');
		const navIcons = $('.nav-icon');
		const logo = $('#logo');
		const listWrappers = $('nav .list-unstyled');

		if (windowWidth > 991) {
			if (currentScrollPos < lastScrollPos) {
				// Scrolling up code
				navButtons.removeClass('small');
				navIcons.removeClass('small');
				listWrappers.removeClass('small');
				logo.removeClass('smallLogo');

			} else {
				// Scrolling down code
				navButtons.addClass('small');
				navIcons.addClass('small');
				listWrappers.addClass('small');
				logo.addClass('smallLogo');
			}
		}

		lastScrollPos = currentScrollPos;
	});

	$('main').click(function () {
		$('.collapse').collapse('hide');
	})
});