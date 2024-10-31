
const boton = document.getElementById("btnConfirmar");
var chkF = document.getElementById("chkF");
var chkM = document.getElementById("chkM");

const resultados = document.getElementById("profileCs");
const resultados2 = document.getElementById("sort");
const resultados3 = document.getElementById("modalC");
var infoPer = document.getElementById("modal-informacion-personal");

var estatus = document.getElementById("estatus");
var grado_estudio = document.getElementById("grado-estudio");
var plaza = document.getElementById("plaza");
var puesto = document.getElementById("puesto");
var totalPersonal = [];
var filterMenu = document.getElementById('filter-menu');

const boton2 = document.getElementById("btnVisuInfo");

boton2.addEventListener("click", function(event){

    if(resultados2.value==""){}
    else{
        
        const form2 = new FormData();
        form2.append("rfc", resultados2.value);

        fetch("../php/vermasPers.php", {
            method: "POST",
            body: form2
        })
        .then(response => response.json())
        .then(json => {
            let template = ``;
            json.forEach((item) => {
                template += `
                <span class="close-button" onclick="closeModal('modal-informacion-personal')">&times;</span>
                <h2>Información del Personal</h2>
                <p><strong>${item.nombre} ${item.apellidoP} ${item.apellidoM}</strong></p>
                <p>Estatus: ${item.estatus}</p>
                <p>Plaza: ${item.plaza}</p>
                <p>Máximo grado de estudios: ${item.estudios}</p>
                <p>Certificaciones: ${item.certificaciones}</p>
                <p>Asociaciones: ${item.asociaciones}</p>
                <p>Tutor: ${item.tutor}</p>
                <p>Licencia: ${item.licencia}</p>
                <p>Sabático: ${item.sabatico}</p>
                <p>${item.puesto}</p>
                <p>Última actualización: ${item.actualizacion}</p>
                `;
            })
            resultados3.innerHTML = template;
        })

        if (infoPer.style.display === 'none') {
            infoPer.style.display = 'block';
        } else {
            infoPer.style.display = 'none';
        }
    }
});

boton.addEventListener("click", function(event){

    const form = new FormData();
    form.append("estatus", estatus.value);
    form.append("gradoE", grado_estudio.value);
    form.append("plaza", plaza.value);
    form.append("puesto", puesto.value);
    form.append("checkF", chkF.checked);
    form.append("checkM", chkM.checked);

    fetch("../php/filtrarPers.php", {
        method: "POST",
        body: form
    })
    .then(response => response.json())
    .then(json => {
        let template = ``;
        json.forEach((item) => {
            if(item.nombre=="0 resultados"){
                template += `<h3>No hay datos encontrados.</h3>`
            }
            else{
                template += `
                <div class="profile-card" id=${item.rfc}>
                    <img src="../images/perfil.png" alt="Foto de perfil">
                    <h3>${item.nombre} ${item.apellidoP} ${item.apellidoM}</h3>
                
                </div>`;
            }
        })
        resultados.innerHTML = template;

        
        let template2 = ``;
        json.forEach((item) => {
            if(item.nombre=="0 resultados"){
                template2 += ``
            }
            else{
                template2 += `
                <option value=${item.rfc}>${item.nombre} ${item.apellidoP} ${item.apellidoM}</option>
                `;    
            }
        })
        resultados2.innerHTML = template2;
    })
    
    if (filterMenu.style.display === 'none') {
        filterMenu.style.display = 'block';
        
    } else {
        filterMenu.style.display = 'none';
        
    }

});