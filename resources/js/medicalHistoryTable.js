$('#app').ready(function () {
	const table = $('#medicalHistoryTable').DataTable({
		select: false,
		searching: false,
		dom: 'Bfrtip',
		buttons: [
			'addMedicalHistory'
		]
	});

	const editBtn = $('#editMedicalHistory');
	const medicalHistoryForm = $('#medicalHistoryForm');

	editBtn.click(function () {
		// Get the row data
		let rowData = table.row($(this).closest('tr')).data();

		// Get the form inputs
		let formInputs = $('#medicalHistoryForm :input').not('button').not('[name = "_token"]');

		// Set the form inputs values
		for (let i = 0; i < rowData.length - 1; i++) {
			if (formInputs[i].name === 'datetime') {

				$(formInputs[i]).val(rowData[i].replace(' ', 'T'))

			}  else {

				$(formInputs[i]).val(rowData[i]);
			}
		}

		// Set form action to edit instead of new
		let newAction = medicalHistoryForm.attr('action').replace('newMedicalHistory', 'editMedicalHistory');

		medicalHistoryForm.attr('action', newAction);

		// Show the modal
		$('#medicalHistoryModal').modal('toggle');
	})
});


$.fn.dataTable.ext.buttons.addMedicalHistory = {
	text: 'Add History',
	className: 'mr-2 rounded-lg',
	action: function ( e, dt, node, config ) {
		const medicalHistoryForm = $('#medicalHistoryForm');
		const formInputs = $('#medicalHistoryForm :input:not(:button):not([name = "_token"]):not([name = "animal_id"])');

		// Set form action to edit instead of new
		let newAction = medicalHistoryForm.attr('action').replace('editMedicalHistory', 'newMedicalHistory');
		medicalHistoryForm.attr('action', newAction);

		// Empty form inputs except animal_id and _token
		formInputs.val('');

		$('#medicalHistoryModal').modal('toggle');
	}
};