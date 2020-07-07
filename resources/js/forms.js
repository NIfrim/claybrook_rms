$('#animalForm').ready(function () {
	const toggler = $('#reproductionType');
	const animalType = $('#animalType').val();

	if (animalType === 'REPTILE') {
		// Set initial hidden inputs
		toggleHiddenInputs(toggler.val());

		// Function used to hide specific inputs
		if (toggler) {
			toggler.change(function () {
				// Get the value of the selector used to toggle other inputs visibility
				let togglerVal = $(this).val();

				toggleHiddenInputs(togglerVal);
			})
		}
	}
});

function toggleHiddenInputs(togglerVal) {
	const clutchSizeInputRow = $('#clutchSize').closest('.row');
	const offspringNumberInputRow = $('#offspringNumber').closest('.row');

	switch (togglerVal) {
		case 'LIVE BEARER':
			clutchSizeInputRow.hide();
			offspringNumberInputRow.show();
			break;

		case 'EGG LAYER':
			clutchSizeInputRow.show();
			offspringNumberInputRow.hide();
			break;

		default: clutchSizeInputRow.hide();
			offspringNumberInputRow.hide();
			break;
	}
}