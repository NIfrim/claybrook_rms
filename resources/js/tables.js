$(document).ready(function () {
	let table = $('#table').DataTable({
		select: true,
		responsive: true,
	});

    /*Make rows selectable by clicking on them*/
	table.select.style('multi');

	// /* Clear selected rows when clicking clear selection button */
	$('#clearSelection').click( function () {
		table.rows('.selected').deselect()
	} );

	// /* Remove selected rows */
	// $('#removeSelected').click( function () {
	// 	console.log(table.rows('.table-active').data());
	// } );
});