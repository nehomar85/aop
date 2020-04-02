$(document).ready(function(){
	$("#submit").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		/*var dataString = '&email1='+ email + '&password1='+ password;
		if(email==''||password==''){
			alert("Complete campos obligatorios");
		}
		else
		{*/
		$.ajax({
		  type: "POST",
		  url: "connections/acceso_usuario",
		  data: {email,password},
		  cache: false,
		  success: function(result){
			if (result == true) {
				//alert("redireccionando");
				window.location = "inicio";
			}else{
				alert(result);
			}
		  }
		});
		//}
		return false;
	});
});