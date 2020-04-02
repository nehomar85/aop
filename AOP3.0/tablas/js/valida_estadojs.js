function validaEstado(sel) {
	if (sel.value=="Resuelto" || sel.value=="Cerrado"){
		divC = document.getElementById("fechaSolucion");
		divC.style.display = "";
		divT = document.getElementById("fechaLastUpd");
		divT.style.display = "";
		divT = document.getElementById("fechaEstado");
		divT.style.display = "none";
	}else if (sel.value==""){
		divC = document.getElementById("fechaSolucion");
		divC.style.display="none";
		divT = document.getElementById("fechaEstado");
		divT.style.display = "none";
	}else{
		divC = document.getElementById("fechaSolucion");
		divC.style.display = "none";
		divT = document.getElementById("fechaEstado");
		divT.style.display = "";
		divT = document.getElementById("fechaLastUpd");
		divT.style.display = "";
		
	}
}