document.getElementById('uploadForm_certificacion').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();

    xhr.open('POST', '../php/upload.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('message').innerHTML = xhr.responseText; // Mostrar el mensaje del servidor
        } else {
            document.getElementById('message').innerHTML = 'Hubo un error subiendo el archivo.';
        }
    };
    xhr.send(formData);
});