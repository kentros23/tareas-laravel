import './bootstrap';

// Obtener todos los botones y etiquetas por su ID
var buttons = document.querySelectorAll("#myButton");
var labels = document.querySelectorAll("#mylabel");

// Recorrer todos los botones y agregar un evento de clic
buttons.forEach(function(button, index) {
  button.addEventListener("click", function() {
    // Cambiar el color de la etiqueta correspondiente al botón
    labels[index].style.color = "white";
  });
});

