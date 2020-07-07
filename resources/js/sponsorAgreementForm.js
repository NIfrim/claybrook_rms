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

