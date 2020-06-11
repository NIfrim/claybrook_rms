$('#newAgreementForm').ready(function () {

	const startDate = $('input[name="agreement_start"]', this);
	const endDate = $('input[name="agreement_end"]', this);

	startDate.change(function () {
		// Set the end date to 12 months apart
		let date = new Date(startDate.val());
		date.setFullYear(date.getFullYear() + 1);

		endDate.val(date.getFullYear() + "-" + (((date.getMonth() + 1) < 10) ? ('0' + (date.getMonth() + 1)) : (date.getMonth() + 1)) + "-" + ((date.getDate() < 10) ? ('0' + date.getDate()) : date.getDate()));
	})

});


function getCookie(cname) {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) === ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) === 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

