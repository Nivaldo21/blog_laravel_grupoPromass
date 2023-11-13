document.addEventListener('DOMContentLoaded', function() {
    // Mostrar la alerta
    var alertContainer = document.getElementById('alertContainer');
    alertContainer.style.display = 'block';

    // Ocultar la alerta después de 5000 milisegundos (5 segundos)
    setTimeout(function() {
      closeAlert();
    }, 4000);
  });

  function closeAlert() {
    var alertContainer = document.getElementById('alertContainer');
    alertContainer.style.display = 'none';
  }