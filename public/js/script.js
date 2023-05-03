 // Manejar el evento de clic en el botón
 /*const buttons = document.querySelectorAll('.botonSidebar');


    let selectedCategory = $(".selected-option");
    elementValido = validarCategory(selectedCategory);

    console.log(elementValido)
       selectedCategory.each(function() {
        var optionText = $(this).find("span").text();
        console.log(optionText);
      });



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
$(document).ready(function() {
  // Manejar Funciones de Validacion
  $('.input, .email, .select, .date').on('input',function() {
    let element = $(this);
    validarInput(element);
  });

  $("#formulario").on('submit',function(event) {
    event.preventDefault();
    let form = document.getElementById("formulario");
    let element = $('.input, .email, .select, .date');
    let validar = validarFormulario(element);

    if (validar === false) {
      return false;
    }else if (validar === true) {
      form.submit();
    }
  });





  //Funciones para validar los input del formulario
  function validarInput(element){
    let elementValue = element.val();
    let elementType = element.attr('type');
    let letters = '';
    
    if(elementType === 'text'){letters = /^[A-Za-z][A-Za-z\s]*$/;}
    else if(elementType === 'email'){letters = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;}
    else if(elementType === 'date'){letters =  /^\d{4}-\d{2}-\d{2}$/;}

    if (!elementValue.match(letters) || !element.val()) {
      element.addClass("is-invalid");
      return false;
    }
    element.removeClass("is-invalid");
    return true;
  }





  function validarCategory(){
    let element = $("#selected-options");
    elementValido = true;
    if(element.children().length > 0){
      $("#autocomplete-category").removeClass("is-invalid");
    }else{
      $("#autocomplete-category").addClass("is-invalid");
      elementValido = false;
    }
    return elementValido;
  };



  
  //Funcion para validar el formulario completo
  function validarFormulario(element){
    let elementValido = true;
    let validar = true;
    element.each(function() {
      validar = validarInput($(this));
      if(validar === false || !$(this).val()){
        elementValido = false;
      }
    });
    validarCategory(element);
    return elementValido;
  }



    var selectedOptions = [];
    // Inicializar el widget de autocompletar
    $("#autocomplete-category").autocomplete({
      source: ["Opción 1", "Opción 2", "Opción 3", "Opción 4", "Opción 5"],
      select: function(event, ui) {
        var optionValue = ui.item.value;
        // Agregar la opción seleccionada al contenedor
        selectedOptions.push(optionValue);
        updateSelectedOptions($(this));
        // Limpiar el campo de entrada de autocompletar después de seleccionar una opción
        $(this).val("");
        return false;
      }
    });
  
    // Actualizar el contenedor de opciones seleccionadas
    function updateSelectedOptions(element) {
      let elementOption = $("#selected-options");
      elementOption.empty();
      for (var i = 0; i < selectedOptions.length; i++) {
        var optionValue = selectedOptions[i];
        var optionElement = $("<div class='btn btn-dark' style='margin:10px;'></div>").addClass("selected-option");
        var optionLabel = $("<span></span>").text(optionValue);
        var deleteButton = $("<i class='bi bi-x-square' style='margin:0 0 0 10px;'></i>").addClass("delete-button");
        deleteButton.click((function(option) {
          return function() {
            // Eliminar la opción del arreglo de opciones seleccionadas
            selectedOptions.splice(selectedOptions.indexOf(option), 1);
            updateSelectedOptions();
          }
        })(optionValue));
        optionElement.append(optionLabel);
        optionElement.append(deleteButton);
        elementOption.append(optionElement);
      }
      validarCategory();
    }


    $('#autocompleteUser').autocomplete({
      source: ["Opción 1", "Opción 2", "Opción 3", "Opción 4", "Opción 5"],
      select: function(event, ui) {
        // Evitar el comportamiento por defecto del evento select
        return false;
      }
    });    
  });
  