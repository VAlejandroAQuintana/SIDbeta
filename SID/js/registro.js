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

/* ALUMADO */
document.getElementById('guardarAlum').addEventListener('click', function() {
    
    var clave = document.getElementById('carr').value;
    var beca = document.getElementById('becados').value;
    var titulo = document.getElementById('titulados').value;
    var resi = document.getElementById('residentes').value;
    var fecha = document.getElementById('fecha').value;

    if (!clave || !beca || !titulo || !resi || !fecha) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('clave', clave);
    formData.append('beca', beca);
    formData.append('titulo', titulo);
    formData.append('resi', resi);
    formData.append('fecha', fecha);

    fetch('../php/registro.php', {
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