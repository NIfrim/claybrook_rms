$('#app').ready(function () {
	const table = $('#watchlistHistoryTable').DataTable({
		select: false,
		searching: false,
		dom: 'Bfrtip',
		buttons: [
			'addWatchlistHistory'
		]
	});

	const editBtn = $('#editWatchlistHistory');
	const watchlistHistoryForm = $('#watchlistHistoryForm');

	editBtn.click(function () {
		// Get the row data
		let rowData = table.row($(this).closest('tr')).data();

		// Get the form inputs
		let formInputs = $('#watchlistHistoryForm :input').not('button').not('[name = "_token"]');

		// Set the form inputs values
		for (let i = 0; i < rowData.length - 1; i++) {
			if (formInputs[i].name === 'datetime') {

				$(formInputs[i]).val(rowData[i].replace(' ', 'T'))

			}  else {

				$(formInputs[i]).val(rowData[i]);
			}
		}

		// Set form action to edit instead of new
		let newAction = watchlistHistoryForm.attr('action').replace('newWatchlistHistory', 'editWatchlistHistory');

		watchlistHistoryForm.attr('action', newAction);

		// Show the modal
		$('#watchlistHistoryModal').modal('toggle');
	})
});


$.fn.dataTable.ext.buttons.addWatchlistHistory = {
	text: 'Add History',
	className: 'mr-2 rounded-lg',
	action: function ( e, dt, node, config ) {
		const watchlistHistoryForm = $('#watchlistHistoryForm');
		const formInputs = $('#watchlistHistoryForm :input:not(:button):not([name = "_token"]):not([name = "animal_id"])');

		// Set form action to edit instead of new
		let newAction = watchlistHistoryForm.attr('action').replace('editWatchlistHistory', 'newWatchlistHistory');
		watchlistHistoryForm.attr('action', newAction);

		// Empty form inputs except animal_id and _token
		formInputs.val('');

		$('#watchlistHistoryModal').modal('toggle');
	}
};