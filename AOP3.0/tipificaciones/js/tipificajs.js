$(document).ready(function(){
	$("#clase").change(function(){
		$.ajax({
			url:"tipificaciones/TipificaCat",
			type: "POST",
			data:"idclase="+$("#clase").val(),
			success: function(clase){
				$("#categoria").html(clase);
			}
		})
	});
	
	$("#categoria").change(function(){
		$.ajax({
			url:"tipificaciones/TipificaCat",
			type: "POST",
			data:"idcategoria="+$("#categoria").val(),
			success: function(categoria){
				$("#tipo").html(categoria);
			}
		})
	});
});