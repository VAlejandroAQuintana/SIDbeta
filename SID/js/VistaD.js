const boton = document.getElementById("btnConfirmar");
const resultados = document.getElementById("divPlantilla");

var NomCarrera = document.getElementById("sort");

boton.addEventListener("click", function(event){
    //alert(NomCarrera.value);

    const form = new FormData();
    form.append("nombreCarrera", NomCarrera.value);

    fetch("../php/alumnadoGen.php", {
        method: "POST",
        body: form
    })
    .then(response => response.json())
    .then(json => {
        let template = ``;
        json.forEach((item) => {
            template += `
            <div class="admin-toolbar">
                <span>Alumnos becados</span>
                <span>${item.becados}</span>
            </div>
            <div class="admin-toolbar">
                <span>Alumnos titulados</span>
                <span>${item.titulados}</span>
            </div>
            <div class="admin-toolbar">
                <span>Alumnos residentes</span>
                <span>${item.residentes}</span>
            </div>
            <div class="admin-toolbar black-toolbar">
                <span>Fecha más reciente</span>
                <span>${item.fechaMaxima}</span>
            </div>
            `;
        })

        resultados.innerHTML = template;

    })

})