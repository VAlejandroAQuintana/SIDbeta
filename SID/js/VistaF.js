const boton = document.getElementById("btnConfirmar");
const resultados = document.getElementById("infoTable");

var NomCarrera = document.getElementById("sort");

boton.addEventListener("click", function(event){
    //alert(NomCarrera.value);

    const form = new FormData();
    form.append("nombreCarrera", NomCarrera.value);

    fetch("../php/infraGen.php", {
        method: "POST",
        body: form
    })
    .then(response => response.json())
    .then(json => {
        let template = ``;
        json.forEach((item) => {
            template += `<tr>
            <td><strong>Fecha mas reciente:</strong></td>
            <td><div class="input-box">${item.fechaMaxima}</div></td>
        </tr>
        <tr>
            <td><strong>Laboratorios:</strong></td>
            <td><div class="input-box">${item.laboratorios}</div></td>
        </tr>
        <tr>
            <td><strong>Acervo Bibliográfico:</strong></td>
            <td><div class="input-box">${item.aBibliografico}</div></td>
        </tr>
        <tr>
            <td><strong>Proyectores:</strong></td>
            <td><div class="input-box">${item.proyectores}</div></td>
        </tr>
        <tr>
            <td><strong>Servidores:</strong></td>
            <td><div class="input-box">${item.servidores}</div></td>
        </tr>
        <tr>
            <td><strong>Computadoras:</strong></td>
            <td><div class="input-box">${item.computadoras}</div></td>
        </tr>
        <tr>
            <td><strong>Plan de Carrera:</strong></td>
            <td>
                <button class="btn-plan">Ver plan de estudios</button>
                <button class="btn-plan">Ver Plantilla Docente</button>
            </td>
        </tr>`;    

        })

        resultados.innerHTML = template;

    });
})