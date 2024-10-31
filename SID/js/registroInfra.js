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
document.getElementById('guardarInfra').addEventListener('click', function() {
    
    var carrera = document.getElementById('carrera').value;
    var laboratorio = document.getElementById('laboratorio').value;
    var taller = document.getElementById('taller').value;
    var biblio = document.getElementById('biblio').value;
    var proyector = document.getElementById('proyector').value;
    var servidor = document.getElementById('servidor').value;
    var computadora = document.getElementById('computadora').value;
    var fecha = document.getElementById('fecha').value;

    if (!carrera || !laboratorio || !taller || !biblio || !proyector || !servidor || !computadora || !fecha) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('laboratorio', laboratorio);
    formData.append('taller', taller);
    formData.append('acervo_biblio', biblio);
    formData.append('proyector', proyector);
    formData.append('servidor', servidor);
    formData.append('computadora', computadora);
    formData.append('fecha', fecha);
    formData.append('carrera', carrera);

    fetch('../php/registroInfra.php', {
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