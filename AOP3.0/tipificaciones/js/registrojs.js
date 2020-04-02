// Upon load..
window.addEventListener('load', () => {
  // Grab all the forms
  var forms = document.getElementsByClassName('needs-validation');
  // Iterate over each one
  for (let form of forms) {
    // Add a 'submit' event listener on each one
    form.addEventListener('submit', (evt) => {
      // check if the form input elements have the 'required' attribute  
      if (!form.checkValidity()) {
        evt.preventDefault();
        evt.stopPropagation();
        //console.log('Bootstrap will handle incomplete form fields');
		//alert('Por favor complete todos los campos obligatorios del formulario');
      } else {
        // Since form is now valid, prevent default behavior..
        evt.preventDefault();
        //console.info('All form fields are now valid...');
		var url = "tipificaciones/RegistrarCaso";
        $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario").serialize(),
           success: function(data)
           {
             $('#resp').html(data);
           }
		});
      }
      form.classList.add('was-validated');
    });
  }
});