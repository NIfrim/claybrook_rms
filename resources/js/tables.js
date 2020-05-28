$(document).ready(function () {
	const table = $('#table, #table2').DataTable({
		select: true,
		language: {
			emptyTable: "No data available in table"
		}
	});

    /*Make rows selectable by clicking on them*/
	table.select.style('multi');

	// /* Clear selected rows when clicking clear selection button */
	$('#clearSelection').click( function () {
		table.rows('.selected').deselect();
		clearFormInput();
	} );

	/* Add selected rows ids to the remove selected form input */
	$('tr').click( addSelectedToInput );
});

function clearFormInput () {
	$('#removeInput').val('');
}

function addSelectedToInput () {
	const removeFormInput = $('#removeInput');

	// Get the selected row id which is in column 0
	let selectedRowId = $(this).find('td').first().text();

	if (!findInString(removeFormInput.val(), selectedRowId)) {
		// Get the values of the removeFormInput as array, and remove empty elements
		let newVal = removeFormInput.val().split(',').filter(elem => elem.length !== 0);

		// Add the selected row id to the newVal
		newVal.push(selectedRowId);

		// Add the new value to the input as a string
		removeFormInput.val(newVal.toString());

	} else {
		// Get and filter the value from the input
		let newVal = removeFormInput.val().split(',').filter(elem => elem !== selectedRowId);

		// Add the filtered value back to the input
		removeFormInput.val(newVal.toString());
	}
}

function findInString(string, needle) {
	return string.includes(needle);
}