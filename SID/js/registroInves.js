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

document.getElementById('guardarInves').addEventListener('click', function() {
    
    var rfc = document.getElementById('rfc').value;
    var sni = document.getElementById('sni').value;
    var patente = document.getElementById('patente').value;
    var academico = document.getElementById('academico').value;
    var linea = document.getElementById('linea').value;
    var beca = document.getElementById('beca').value;
    var perfil = document.getElementById('perfil').value;
    var fecha = document.getElementById('fecha').value;


    if (!rfc || !sni || !patente || !academico || !linea || !beca || !perfil || !fecha) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('rfc', rfc);
    formData.append('sni', sni);
    formData.append('patente', patente);
    formData.append('academico', academico);
    formData.append('linea', linea);
    formData.append('beca', beca);
    formData.append('perfil', perfil);
    formData.append('fecha', fecha);

    fetch('../php/registroInves.php', {
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