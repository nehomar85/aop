$(document).ready(function(){
	$("#eClase2").change(function(){
		$.get("tablas/tipificaciones/TipificaCat","idclase="+$("#eClase2").val(), function(data){
			$("#eCategoria2").html(data);
		});
	});
	
	$("#eCategoriaResolucion2").change(function(){
		$.get("tablas/tipificaciones/CausaRaiz","idCatResolucion="+$("#eCategoriaResolucion2").val(), function(data){
			$("#eCausaRaiz2").html(data);
		});
	});
});