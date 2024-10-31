const boton = document.getElementById("btnConfirmar");
const resultados = document.getElementById("divPlantilla");

var NomCarrera = document.getElementById("sort");

boton.addEventListener("click", function(event){
    //alert(NomCarrera.value);

    const form = new FormData();
    form.append("nombreCarrera", NomCarrera.value);

    fetch("../php/programaGen.php", {
        method: "POST",
        body: form
    })
    .then(response => response.json())
    .then(json => {
        let template = ``;
        json.forEach((item) => {
            template += `
            <div class="admin-toolbar">
                <span>Especialidades</span>
                <span>${item.especialidades}</span>
            </div>
            <div class="admin-toolbar">
                <span>Capitulados</span>
                <span>${item.capitulados}</span>
            </div>
            <div class="admin-toolbar">
                <span>Acreditaciones</span>
                <span>${item.acreditaciones}</span>
            </div>
            <div class="admin-toolbar">
                <span>Matriculados</span>
                <span>${item.matriculados}</span>
            </div>
            <div class="admin-toolbar">
                <span>Fichas</span>
                <span>${item.fichas}</span>
            </div>
            <div class="admin-toolbar">
                <span>Alumnos ingresados</span>
                <span>${item.alumnos}</span>
            </div>
            <div class="admin-toolbar">
                <span>Eficiencia terminal</span>
                <span>${item.efiTer}%</span>
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