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
		const allSubmenus = $('.sub-menu-list');

		if (currentScrollPos < lastScrollPos) {
			//
		} else {
			// Scrolling down code
			allSubmenus.removeClass('show');
		}

		lastScrollPos = currentScrollPos;
	})

	$('main').click(function () {
		const allSubmenus = $('.sub-menu-list');
		allSubmenus.removeClass('show');
	})
});