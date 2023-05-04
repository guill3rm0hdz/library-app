$(document).ready(function() {
  // Manejar Funciones en eventos de Validacion
  $('.input').on('input keydown',function() {
    let element = $(this);
    validarInput(element);
  });

  $("#formulario").on('submit',function(event) {
    event.preventDefault();
    let form = document.getElementById("formulario");
    let element = $('.input');
    let validar = validarFormulario(element);
    if (validar === false) {
      return false;
    }else if (validar === true) {
      form.submit();
    }
  });

});

//Extrae los registros de usuarios para cargar en el autocompletar
$(document).ready(function() {
  $.ajax({
    url: base_url+'home/get_data_ajax/users',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      $(".autocompleteUser").autocomplete({
        source: response.map(function(item) { 
          return {
              label: item.name, // muestra el nombre del usuario en la lista de opciones
              value: item.name // al seleccionar una opción, establece el ID del usuario en el campo de entrada
          };
      }),
      minLength: 1,
      select: function(event, ui) { }
      });
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
  });  
});  


//Extrae los registros de categorias para cargar en el autocompletar
$(document).ready(function() {
  var selectedOptions = [];
  $.ajax({
    url: base_url+'home/get_data_ajax/categories',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      $("#autocomplete-category").autocomplete({
        source: response.map(function(item) { 
          return {
              label: item.name, // muestra el nombre del usuario en la lista de opciones
              value: item.name // al seleccionar una opción, establece el ID del usuario en el campo de entrada
          };
      }),
      minLength: 1,
        select: function(event, ui) {
          var optionValue = ui.item.value;
          // Agregar la opción seleccionada al contenedor
          selectedOptions.push(optionValue);
          updateSelectedOptions();
          // Limpiar el campo de entrada de autocompletar después de seleccionar una opción
          $(this).val("");
          return false;
        }
      });
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
  });  


  // Actualizar el contenedor de opciones seleccionadas
  function updateSelectedOptions() {
    $("#selected-options").empty();
    for (var i = 0; i < selectedOptions.length; i++) {
      var optionValue = selectedOptions[i];
      var optionElement = $("<div></div>").addClass("selected-option");
      var optionLabel = $("<input type='text' class='btn btn-secondary' name='categoryBook[]' value='"+optionValue+"' readonly/>");
      var deleteButton = $("<span><i class='bi bi-x-square'></i></span>").addClass("delete-button");
      deleteButton.click((function(option) {
        return function() {
          // Eliminar la opción del arreglo de opciones seleccionadas
          selectedOptions.splice(selectedOptions.indexOf(option), 1);
          updateSelectedOptions();
          }
        })(optionValue));
        optionElement.append(optionLabel);
        optionElement.append(deleteButton);
        $("#selected-options").append(optionElement);
      }
    }
  });

  //Funciones para validar los input del formulario
  function validarInput(element){
    let elementValue = element.val();
    let elementType = element.attr('type');
    let letters = '';
    
    if(elementType === 'text'){letters = /^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s.,:;-][A-Za-záéíóúüñÁÉÍÓÚÜÑ\s.,:;-\s]*$/;}
    else if(elementType === 'email'){letters = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;}
    else if(elementType === 'date'){letters =  /^\d{4}-\d{2}-\d{2}$/;}

    if (!elementValue.match(letters) || !element.val()) {
      element.addClass("is-invalid");
      return false;
    }
    element.removeClass("is-invalid");
    return true;
  }

  //Funcion para validar el formulario completo
  function validarFormulario(element){
    let elementValido = true;
    let validar = true;
    element.each(function() {
      validar = validarInput($(this));
      if(validar === false || !$(this).val() === true){
        elementValido = false;
      }
    });

    //if(elementValido === true){
      if($("#autocomplete-category").length){elementValido = validarCategory();}
    //}
    return elementValido;
  }

  
  //Funcion para validar la existencia de categirias que se asignan al libro
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