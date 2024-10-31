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

document.getElementById('guardarPer_activo').addEventListener('click', function() {
    
    var carrera = document.getElementById('carrera').value;
    var dateIns = document.getElementById('dateIns').value;
    var rfc = document.getElementById('rfc').value;
    var nombre = document.getElementById('nombre').value;
    var ap = document.getElementById('ap').value;
    var am = document.getElementById('am').value;
    var genero = document.getElementById('genero').value;
    var fundador = document.getElementById('fundador').value;
    var plaza = document.getElementById('plaza').value;
    var asocioaciones = document.getElementById('asocioaciones').value;
    var certificado = document.getElementById('certificado').value;
    var nivel = document.getElementById('nivel').value;
    var estatus = document.getElementById('estatus').value;
    var dateAct_activo = document.getElementById('dateAct_activo').value;

    var tutor_activo = document.getElementById('tutor_activo').value;
    var licencia_activo = document.getElementById('licencia_activo').value;
    var puesto_activo = document.getElementById('puesto_activo').value;

    if (!tutor_activo || !licencia_activo || !puesto_activo || !carrera || !dateIns || !rfc || !nombre || !ap || !am || !genero || !fundador || !plaza || !asocioaciones || !certificado || !nivel || !estatus || !dateAct_activo) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('carrera', carrera);
    formData.append('dateIns', dateIns);
    formData.append('rfc', rfc);
    formData.append('nombre', nombre);
    formData.append('ap', ap);
    formData.append('am', am);
    formData.append('genero', genero);
    formData.append('fundador', fundador);
    formData.append('plaza', plaza);
    formData.append('asocioaciones', asocioaciones);
    formData.append('certificado', certificado);
    formData.append('nivel', nivel);
    formData.append('estatus', estatus);
    formData.append('dateAct_activo', dateAct_activo);
    formData.append('tutor_activo', tutor_activo);
    formData.append('licencia_activo', licencia_activo);
    formData.append('puesto_activo', puesto_activo);


    fetch('../php/registroPer2.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar el resultado
        alert(data);
        var contenido6 = document.getElementById('contenido6');
        var contenido7 = document.getElementById('contenido7');
        var contenido2 = document.getElementById('contenido2');
        var contenido1 = document.getElementById('contenido1');
        var contenido5 = document.getElementById('contenido5');
        var cont2 = document.getElementById('cont2');
        var cont3 = document.getElementById('cont3');
        var cont8 = document.getElementById('cont8');
        var cont9 = document.getElementById('cont9');


        contenido5.style.display = 'none';
        contenido1.style.display = 'none';
        contenido2.style.display = 'none';
        cont3.style.display = 'none'; 
        cont8.style.display = 'none';  
        contenido7.style.display = 'block';
        contenido6.style.display = 'block';

        if (certificado === 'No') {
            //cont2.style.display = 'none';   
        }

        if (tutor_activo === 'No') {
            cont9.style.display = 'none'; 
        }

    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al guardar los datos.');
    });

});

document.getElementById('guardarPer_sabatico').addEventListener('click', function() {
    var carrera = document.getElementById('carrera').value;
    var dateIns = document.getElementById('dateIns').value;
    var rfc = document.getElementById('rfc').value;
    var nombre = document.getElementById('nombre').value;
    var ap = document.getElementById('ap').value;
    var am = document.getElementById('am').value;
    var genero = document.getElementById('genero').value;
    var fundador = document.getElementById('fundador').value;
    var plaza = document.getElementById('plaza').value;
    var asocioaciones = document.getElementById('asocioaciones').value;
    var certificado = document.getElementById('certificado').value;
    var nivel = document.getElementById('nivel').value;
    var estatus = document.getElementById('estatus').value;
    var dateAct_sabatico = document.getElementById('dateAct_sabatico').value;

    var licencia_sabatico = document.getElementById('licencia_sabatico').value;
    var puesto_sabatico = document.getElementById('puesto_sabatico').value;

    if (!licencia_sabatico || !puesto_sabatico || !carrera || !dateIns || !rfc || !nombre || !ap || !am || !genero || !fundador || !plaza || !asocioaciones || !certificado || !nivel || !estatus || !dateAct_sabatico) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('carrera', carrera);
    formData.append('dateIns', dateIns);
    formData.append('rfc', rfc);
    formData.append('nombre', nombre);
    formData.append('ap', ap);
    formData.append('am', am);
    formData.append('genero', genero);
    formData.append('fundador', fundador);
    formData.append('plaza', plaza);
    formData.append('asocioaciones', asocioaciones);
    formData.append('certificado', certificado);
    formData.append('nivel', nivel);
    formData.append('estatus', estatus);
    formData.append('dateAct_sabatico', dateAct_sabatico);
    formData.append('licencia_sabatico', licencia_sabatico);
    formData.append('puesto_sabatico', puesto_sabatico);


    fetch('../php/registroPer3.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar el resultado
        alert(data);
        var contenido6 = document.getElementById('contenido6');
        var contenido7 = document.getElementById('contenido7');
        var contenido3 = document.getElementById('contenido3');
        var contenido1 = document.getElementById('contenido1');
        var contenido5 = document.getElementById('contenido5');
        var cont2 = document.getElementById('cont2');
        var cont3 = document.getElementById('cont3');
        var cont8 = document.getElementById('cont8');
        var cont9 = document.getElementById('cont9');


        contenido5.style.display = 'none';
        contenido1.style.display = 'none';
        contenido3.style.display = 'none';
        cont3.style.display = 'none'; 
        cont8.style.display = 'none';  
        cont9.style.display = 'none'; 
        contenido7.style.display = 'block';
        contenido6.style.display = 'block';

        if (certificado === 'No') {
            //cont2.style.display = 'none';   
        }

    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al guardar los datos.');
    });
});

document.getElementById('guardarPer_otros').addEventListener('click', function() {

    var carrera = document.getElementById('carrera').value;
    var dateIns = document.getElementById('dateIns').value;
    var rfc = document.getElementById('rfc').value;
    var nombre = document.getElementById('nombre').value;
    var ap = document.getElementById('ap').value;
    var am = document.getElementById('am').value;
    var genero = document.getElementById('genero').value;
    var fundador = document.getElementById('fundador').value;
    var plaza = document.getElementById('plaza').value;
    var asocioaciones = document.getElementById('asocioaciones').value;
    var certificado = document.getElementById('certificado').value;
    var nivel = document.getElementById('nivel').value;
    var estatus = document.getElementById('estatus').value;
    var dateAct_otro = document.getElementById('dateAct_otro').value;

    if (!carrera || !dateIns || !rfc || !nombre || !ap || !am || !genero || !fundador || !plaza || !asocioaciones || !certificado || !nivel || !estatus || !dateAct_otro) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    var formData = new FormData();
    formData.append('carrera', carrera);
    formData.append('dateIns', dateIns);
    formData.append('rfc', rfc);
    formData.append('nombre', nombre);
    formData.append('ap', ap);
    formData.append('am', am);
    formData.append('genero', genero);
    formData.append('fundador', fundador);
    formData.append('plaza', plaza);
    formData.append('asocioaciones', asocioaciones);
    formData.append('certificado', certificado);
    formData.append('nivel', nivel);
    formData.append('estatus', estatus);
    formData.append('dateAct_otro', dateAct_otro);


    fetch('../php/registroPer.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar el resultado
        alert(data);
        var contenido6 = document.getElementById('contenido6');
        var contenido7 = document.getElementById('contenido7');
        var contenido4 = document.getElementById('contenido4');
        var contenido1 = document.getElementById('contenido1');
        var contenido5 = document.getElementById('contenido5');
        var cont2 = document.getElementById('cont2');
        var cont3 = document.getElementById('cont3');
        var cont8 = document.getElementById('cont8');
        var cont6 = document.getElementById('cont6');
        var cont9 = document.getElementById('cont9');


        contenido5.style.display = 'none';
        contenido1.style.display = 'none';
        contenido4.style.display = 'none';
        cont6.style.display = 'none';
        cont9.style.display = 'none';
        cont3.style.display = 'none'; 
        cont8.style.display = 'none';    
        contenido7.style.display = 'block';
        contenido6.style.display = 'block';

        if (certificado === 'No') {
            //cont2.style.display = 'none';   
        }

    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al guardar los datos.');
    });

});

document.getElementById('guardarExtra').addEventListener('click', function() {
    

});

document.getElementById('siguiente').addEventListener('click', function() {
    var contenido2 = document.getElementById('contenido2');
    var contenido3 = document.getElementById('contenido3');
    var contenido4 = document.getElementById('contenido4');
    var estatus = document.getElementById('estatus').value;

    if (estatus === 'Activo') {
        contenido2.style.display = 'block';
        contenido3.style.display = 'none';
        contenido4.style.display = 'none';
    }else if (estatus === 'Sabático'){
        contenido3.style.display = 'block';
        contenido2.style.display = 'none';
        contenido4.style.display = 'none';
    }else {
        contenido4.style.display = 'block';
        contenido2.style.display = 'none';
        contenido3.style.display = 'none';
    }
    
});