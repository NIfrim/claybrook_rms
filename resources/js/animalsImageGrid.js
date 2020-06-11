$('#animalsGrid').ready(function () {
	// Get the animal images grid
	const images = $('#animalsGrid div');

	images.click(function () {
		const total = $('#totalCost');

		// Toggle select
		$('img', this).toggleClass('selected');

		// Calculate and set total price
		let totalPrice = getTotal();
		total.text(totalPrice + ' £');

		// Add input fields to be sent with the post request
		if ($('img', this).hasClass('selected')) {

			addHiddenInputs($('img', this).attr('id'));

		} else {

			removeHiddenInput($('img', this).attr('id'))

		}
	})
});

function getTotal() {
	const price = $('.selected ~ .price').text();

	return price.split(' £').reduce(function (prev, curr) {return Number(prev) + Number(curr)});
}

function addHiddenInputs(id) {

	const inputsWrapper = $('#animalsHiddenInputs');
	const animalIdInputTemplate = '<input type = "text" name="animal_id[]" value="'+ id +'" id="'+ id +'-input" required hidden>';

	inputsWrapper.append(animalIdInputTemplate);
}

function removeHiddenInput(id) {

	$('#' + id + '-input').remove();

}