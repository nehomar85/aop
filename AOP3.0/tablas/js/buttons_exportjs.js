$(function () {
	//$("#example1").DataTable();
	$('#casos2').DataTable({
	  "paging": false,
	  "lengthChange": false,
	  "searching": false,
	  "ordering": false,
	  "info": false,
	  "autoWidth": true,
	  dom: 'Bfrtip',
	  responsive: false,
	  buttons: [
		{
			extend:    'copyHtml5',
			text:      '<i class="fa fa-files-o"></i>',
			//text:      '<i class="far fa-copy"></i>',
			titleAttr: 'Copiar'
		},
		{
			extend:    'excelHtml5',
			text:      '<i class="fa fa-file-excel-o"></i>',
			//text:      '<i class="far fa-file-excel"></i>',
			titleAttr: 'Excel'
		},
		{
			extend:    'pdfHtml5',
			text:      '<i class="fa fa-file-pdf-o"></i>',
			//text:      '<i class="far fa-file-pdf"></i>',
			titleAttr: 'PDF'
		}
	  ],
	  //buttons: [ 'copy', 'excel', 'pdf']
	});
});