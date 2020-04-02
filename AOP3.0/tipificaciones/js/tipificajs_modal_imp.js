$(document).ready(function(){
	$("#cliente22").change(function(){
		$.get("tablas/tipificaciones/Tipifica_IMP","cliente="+$("#cliente22").val(), function(data){
			$("#idcaso22").html(data);
		});
	});
});