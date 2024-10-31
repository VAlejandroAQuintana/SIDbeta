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
document.getElementById('guardarCarr').addEventListener('click', function() {
    
    var clv_carrera = document.getElementById('clv_carrera').value;
    var nom_carrera = document.getElementById('nom_carrera').value;
    var convenio = document.getElementById('convenio').value;
    var servicio = document.getElementById('servicio').value;
    var evento = document.getElementById('evento').value;
    var fecha = document.getElementById('fecha').value;


    if (!clv_carrera || !nom_carrera || !convenio || !servicio || !evento || !fecha) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('clv_carrera', clv_carrera);
    formData.append('nom_carrera', nom_carrera);
    formData.append('convenio', convenio);
    formData.append('servicio', servicio);
    formData.append('evento', evento);
    formData.append('fecha', fecha);

    fetch('../php/registroCarr.php', {
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