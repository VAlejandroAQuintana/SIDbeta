document.addEventListener("DOMContentLoaded", function() {
    var headers = document.querySelectorAll('.encabezado3');
    var headerOffsets = Array.from(headers).map(header => header.offsetTop);

    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;

        headers.forEach((header, index) => {
            if (currentScrollPos > headerOffsets[index]) {
                header.classList.add('fixed');
            } else {
                header.classList.remove('fixed');
            }
        });
    };
});

/* INFRAESTRUCTURA */
document.getElementById('guardarUser').addEventListener('click', function() {
    
    var usuario = document.getElementById('usuario').value;
    var password = document.getElementById('password').value;
    var tipo = document.getElementById('tipo').value;


    if (!usuario || !password || !tipo) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('usuario', usuario);
    formData.append('password', password);
    formData.append('tipo', tipo);

    fetch('../php/controlUser.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar el resultado
        alert(data);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al guardar los datos.');
    });
});