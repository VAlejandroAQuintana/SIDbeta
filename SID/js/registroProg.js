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
document.getElementById('guardarProg').addEventListener('click', function() {
    
    var carrera = document.getElementById('carrera').value;
    var clv_programa = document.getElementById('clv_programa').value;
    var nom_programa = document.getElementById('nom_programa').value;
    var especialidad = document.getElementById('especialidad').value;
    var acreditacion = document.getElementById('acreditacion').value;
    var capitulado = document.getElementById('capitulado').value;
    var matricula = document.getElementById('matricula').value;
    var ficha = document.getElementById('ficha').value;
    var ingreso = document.getElementById('ingreso').value;
    var lengua = document.getElementById('lengua').value;
    var terminal = document.getElementById('terminal').value;
    var fecha = document.getElementById('fecha').value;


    if (!carrera || !clv_programa || !nom_programa || !especialidad || !acreditacion || !capitulado || !matricula || !ficha || !ingreso || !lengua || !terminal || !fecha) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('carrera', carrera);
    formData.append('clave_programa', clv_programa);
    formData.append('nom_programa', nom_programa);
    formData.append('especialidad', especialidad);
    formData.append('acreditacion', acreditacion);
    formData.append('capitulado', capitulado);
    formData.append('matricula', matricula);
    formData.append('ficha', ficha);
    formData.append('ingreso', ingreso);
    formData.append('lengua', lengua);
    formData.append('eficiencia', terminal);
    formData.append('fecha', fecha);

    fetch('../php/registroProg.php', {
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