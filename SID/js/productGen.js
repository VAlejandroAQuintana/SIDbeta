    const boton = document.getElementById("btnConfirmar");
    const resultados = document.getElementById("chartC");

    const canvas1 = document.getElementById("chart1");
    const canvas2 = document.getElementById("chart2");
    const canvas3 = document.getElementById("chart3");
    const canvas4 = document.getElementById("chart4");
    const canvas5 = document.getElementById("chart5");
    const canvas6 = document.getElementById("chart6");

    var FechaI = document.getElementById("inFechaInicio");
    var FechaF = document.getElementById("inFechaFin");

    boton.addEventListener("click", function(event){
        event.preventDefault();

        canvas1.remove();
        canvas5.remove();
        canvas6.remove();
        canvas4.remove();
        canvas3.remove();
        canvas2.remove();

        const form = new FormData();
        form.append("fechaInicio", FechaI.value);
        form.append("fechaFin", FechaF.value);
        
        fetch("../php/productGen.php", {
            method: "POST",
            body: form
        })
        .then(response => response.json())
        .then(json => {

            let template1 = `
            <div class="chart-box">
            <h3>SNI</h3>
            <canvas id="chart1"></canvas>
            
        </div>
        <div class="chart-box">
            <h3>Patentes</h3>
            <canvas id="chart2"></canvas>
            
        </div>
        <div class="chart-box">
            <h3>Cuerpo Académico</h3>
            <canvas id="chart3"></canvas>
            
        </div>
        <div class="chart-box">
            <h3>Línea de Investigación</h3>
            <canvas id="chart4"></canvas>
            
        </div>
        <div class="chart-box">
            <h3>Beca Académica</h3>
            <canvas id="chart5"></canvas>
            
        </div>
        <div class="chart-box">
            <h3>Perfil Deseable</h3>
            <canvas id="chart6"></canvas>
            
        </div>
            `;

            resultados.innerHTML = template1;

            json.forEach((item) => {
                let template2
                const data = [
                    { id: 'chart1', label: 'SNI', yes: item.PorPerSNI, no: item.PorPerSNIN },
                    { id: 'chart2', label: 'Patentes', yes: item.PorPerPAT, no: item.PorPerPATN },
                    { id: 'chart3', label: 'Cuerpo Académico', yes: item.PorPerACA, no: item.PorPerACAN },
                    { id: 'chart4', label: 'Línea de Investigación', yes: item.PorPerLINV, no: item.PorPerLINVN },
                    { id: 'chart5', label: 'Beca Académica', yes: item.PorPerBEC, no: item.PorPerBECN },
                    { id: 'chart6', label: 'Perfil Deseable', yes: item.PorPerPD, no: item.PorPerPDN }
                ];
        
                data.forEach(chartData => {
                    const ctx = document.getElementById(chartData.id).getContext('2d');
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Sí', 'No'],
                            datasets: [{
                                label: chartData.label,
                                data: [chartData.yes, chartData.no],
                                backgroundColor: ['#006400', '#8FBC8F'],
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: false
                                }
                            }
                        }
                    });
                });
            })
            
        });
    });


