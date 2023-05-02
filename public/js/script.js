 // Manejar el evento de clic en el botón
 /*const buttons = document.querySelectorAll('.botonSidebar');


 buttons.forEach(button => {
    let section = button.id;
        $("#"+section).click(function() {
            $.ajax({
                url: base_url+'home/cargar_seccion/'+section,
                type: "GET",
                success: function(data) {
                    $("#content-dashboard").html(data);
                }
            });
        });
    });*/

  // Manejar Funciones de Validacion
  $('.input').on('input',function() {
    var input = $(this);
    validarInput(input);
  });

  $('input[type="email"]').on('input',function() {
    var email = $(this);
    validarEmail(email);
  });

  $("#formulario").on('submit',function(event) {
    event.preventDefault();
    var form = document.getElementById("formulario");
    var input = $('.input');

    if (validarFormulario(input) === false) {
      return false;
    }else if (validarFormulario(input) === true) {
      form.submit();
    }
  });


  //Funciones para validar los input del formulario
  function validarInput(input){
    var inputValue = input.val();
    var letters = /^[A-Za-z]+$/;
    if (!inputValue.match(letters)) {
      input.addClass("is-invalid");
      return false;
    }
    input.removeClass("is-invalid");
    return true;
  }

  function validarEmail(email){
    var emailValue = email.val();    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailValue.match(emailRegex)) {
      email.addClass("is-invalid");
      return false;
    }
      email.removeClass("is-invalid");
    return true;
  }

  function validarFormulario(input){
    var inputValido = true;
    var validar = true;
    input.each(function() {
      var type = $(this).attr('type');
      if(type === 'text'){validar = validarInput($(this));
      }else if(type === 'email'){validar = validarEmail($(this));}
      if(validar === false || !$(this).val()){
        inputValido = false;
      }
    });
    return inputValido;
  }

