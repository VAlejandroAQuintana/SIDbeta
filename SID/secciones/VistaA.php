<?php
include '../php/db_conexion.php';

//Consulta de todos los datos de la tabla carrera
$stmt = $conn->prepare("SELECT * FROM carrera WHERE CLV_CARR = 'ISC273678286' ");
if ($stmt) {
    

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $carrera = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carrera[] = $row;
        }
    } else {
        echo "0 resultados";
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

//Consulta de todos los datos de la tabla programa
$stmt = $conn->prepare("SELECT * FROM programa WHERE CLV_CARR = 'ISC273678286' ");
if ($stmt) {
    

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $programa = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $programa[] = $row;
        }
    } else {
        echo "0 resultados";
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

//Consulta de la cantitad total de personal
$sql = "SELECT COUNT(*) AS total FROM estatus_personal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personal = $row['total'];
} else {
    $total_personal = 0;
}

//Consulta del personal que tenga un estado laboral activo
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_EST_LAB = 'Activo' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalA = $row['total'];
    $PorPerA = $total_personalA/$total_personal*100;
} else {
    $total_personalA = 0;
    $PorPerA = 0;
}

//Consulta del personal que esté de sabatico
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_EST_LAB = 'Sabatico' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalS = $row['total'];
    $PorPerS = $total_personalS/$total_personal*100;
} else {
    $total_personalS = 0;
    $PorPerS=0;
}

//Consulta del personal que tenga un estado laboral activo
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_EST_LAB = 'Fallecido' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalFa = $row['total'];
    $PorPerFa = $total_personalFa/$total_personal*100;
} else {
    $total_personalFa = 0;
    $PorPerFa=0;
}

//Consulta del personal que esté jubilado
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_EST_LAB = 'Jubilado' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalJ = $row['total'];
    $PorPerJ = $total_personalJ/$total_personal*100;
} else {
    $total_personalJ = 0;
    $PorPerJ=0;
}

//Consulta del personal que trabaja de tiempo completo
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_PLAZA = 'Tiempo Completo' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalTC = $row['total'];
    $PorPerTC = $total_personalTC/$total_personal*100;
} else {
    $total_personalTC = 0;
    $PorPerTC=0;
}

//Consulta del personal que trabaja de medio tiempo
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_PLAZA = '1/2 Tiempo' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalMT = $row['total'];
    $PorPerMT = $total_personalMT/$total_personal*100;
} else {
    $total_personalMT = 0;
    $PorPerMT=0;
}

//Consulta del personal que trabaja de horas
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_PLAZA = 'Horas' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalH = $row['total'];
    $PorPerH = $total_personalH/$total_personal*100;
} else {
    $total_personalH = 0;
    $PorPerH=0;
}

//Consulta del personal que trabaja de tres cuartos de tiempo
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_PLAZA = '3/4 de Tiempo' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalTCT = $row['total'];
    $PorPerTCT = $total_personalTCT/$total_personal*100;
} else {
    $total_personalTCT = 0;
    $PorPerTCT=0;
}

//Consulta del personal que tenga una licenciatura
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_GRADO = 'Licenciatura' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalLIC = $row['total'];
} else {
    $total_personalLIC = 0;
}

//Consulta del personal que tenga una maestría
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_GRADO = 'Maestria' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalMAE = $row['total'];
} else {
    $total_personalMAE = 0;
}

//Consulta del personal que tenga un doctorado
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_GRADO = 'Doctorado' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalDOC = $row['total'];
} else {
    $total_personalDOC = 0;
}

//Consulta del personal que tenga licencia
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_LIC = 'Si' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalLICE = $row['total'];
} else {
    $total_personalLICE = 0;
}

//Consulta del personal que tenga certificaciones
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_CERT = 'Si' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalCERT = $row['total'];
} else {
    $total_personalCERT = 0;
}

//Consulta del personal que sea tutor
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_TUTOR = 'Si' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalTutor = $row['total'];
} else {
    $total_personalTutor = 0;
}

//Consulta del personal que sea hombre
$sql = "SELECT COUNT(*) AS total FROM personal WHERE PERS_GEN = 'M' AND CLV_CARR = 'ISC273678286' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalM = $row['total'];
} else {
    $total_personalM = 0;
}

//Consulta del personal que sea mujer
$sql = "SELECT COUNT(*) AS total FROM personal WHERE PERS_GEN = 'F' AND CLV_CARR = 'ISC273678286'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalF = $row['total'];
} else {
    $total_personalF = 0;
}

//Consultas del personal que sea docente y administrativo
$sql = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_PUESTO = 'Administrativo'";
$sql2 = "SELECT COUNT(*) AS total FROM estatus_personal WHERE EST_PUESTO != 'Administrativo'";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalADMIN = $row['total'];
} else {
    $total_personalADMIN = 0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalNADMIN = $row['total'];
} else {
    $total_personalNADMIN = 0;
}

//Consulta de todos los datos de la tabla alumnado
$stmt = $conn->prepare("SELECT * FROM alumnado WHERE CLV_CARR = 'ISC273678286'");
if ($stmt) {
    

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $alumnado = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $alumnado[] = $row;
        }
    } else {
        echo "0 resultados";
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

//Consulta de todos los datos de la tabla infraestructura
$stmt = $conn->prepare("SELECT * FROM infraestructura WHERE CLV_CARR = 'ISC273678286'");
if ($stmt) {
    

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $infra = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $infra[] = $row;
        }
    } else {
        echo "0 resultados";
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

//Consultas del personal que tenga y no tenga SNI
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_SNI = 'Si' ";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_SNI = 'No' ";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalSNI = $row['total'];
    $PorPerSNI = $total_personalSNI/$total_personal*100;
} else {
    $total_personalSNI = 0;
    $PorPerSNI=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalSNIN = $row['total'];
    $PorPerSNIN = $total_personalSNIN/$total_personal*100;
} else {
    $total_personalSNIN = 0;
    $PorPerSNIN=0;
}

//Consultas del personal que tenga y no tenga patentes
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PAT = 'Si' ";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PAT = 'No' ";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalPAT = $row['total'];
    $PorPerPAT = $total_personalPAT/$total_personal*100;
} else {
    $total_personalPAT = 0;
    $PorPerPAT=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalPATN = $row['total'];
    $PorPerPATN = $total_personalPATN/$total_personal*100;
} else {
    $total_personalPATN = 0;
    $PorPerPATN=0;
}



//Consultas del personal que tenga y no tenga un cuerpo académico
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_ACA = 'Si' ";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_ACA = 'No' ";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalACA = $row['total'];
    $PorPerACA = $total_personalACA/$total_personal*100;
} else {
    $total_personalACA = 0;
    $PorPerACA=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalACAN = $row['total'];
    $PorPerACAN = $total_personalACAN/$total_personal*100;
} else {
    $total_personalACAN = 0;
    $PorPerACAN=0;
}

//Consultas del personal que tenga y no tenga lineas de investigación
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_LINEA_INV = 'Si' ";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_LINEA_INV = 'No' ";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalLINV = $row['total'];
    $PorPerLINV = $total_personalLINV/$total_personal*100;
} else {
    $total_personalLINV = 0;
    $PorPerLINV=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalLINVN = $row['total'];
    $PorPerLINVN = $total_personalLINVN/$total_personal*100;
} else {
    $total_personalLINVN = 0;
    $PorPerLINVN=0;
}

//Consultas del personal que tenga y no tenga beca academica
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_BEC = 'Si' ";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_BEC = 'No' ";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalBEC = $row['total'];
    $PorPerBEC = $total_personalBEC/$total_personal*100;
} else {
    $total_personalBEC = 0;
    $PorPerBEC=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalBECN = $row['total'];
    $PorPerBECN = $total_personalBECN/$total_personal*100;
} else {
    $total_personalBECN = 0;
    $PorPerBECN=0;
}

//Consultas del personal que tenga y no tenga un perfil deseable
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PERFIL_DES = 'Si' ";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PERFIL_DES = 'No' ";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalPD = $row['total'];
    $PorPerPD = $total_personalPD/$total_personal*100;
} else {
    $total_personalPD = 0;
    $PorPerPD=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalPDN = $row['total'];
    $PorPerPDN = $total_personalPDN/$total_personal*100;
} else {
    $total_personalPDN = 0;
    $PorPerPDN=0;
}

// Cerrar la conexión
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productividad en Investigación</title>
    
    <link rel="stylesheet" href="../css/style-registro.css">
    <link rel="stylesheet" href="../css/styles3.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php session_start();?>
</head>
<body>
    <?php foreach ($carrera as $carrera): ?>
    <header class="encabezado1">
        <div class="contenido_encabezado1">
            <img src="../imagenes/logo-gob.svg" alt="Logo" class="small-svg">
            <nav class="listaE1">
                <ul>
                    <li><a href="https://www.gob.mx/gobierno" target="_blank">Gobierno</a></li>
                    <li><a href="https://www.participa.gob.mx/" target="_blank">Participa</a></li>
                    <li><a href="https://datos.gob.mx/" target="_blank">Datos</a></li>
                </ul>
            </nav>
            <a href="https://www.gob.mx/busqueda" target="_blank" class="search-icon">
                <span class="mdi mdi-magnify"></span>
            </a>
        </div>
    </header>

    <header class="encabezado2">
        <div class="contenido_encabezado2">
            <img src="../imagenes/logo-gob-mx.png" alt="Logo" class="logoPNG">
            <img src="../imagenes/linea-vertical-separador-logos.svg" alt="Logo">
            <img src="../imagenes/logo-educacion.svg" alt="Logo" class="logoPNG2">
            <img src="../imagenes/linea-vertical-separador-logos.svg" alt="Logo">
            <img src="../imagenes/logo-tecnm.svg" alt="Logo" class="logoPNG3">
            <img src="../imagenes/linea-vertical-separador-logos.svg" alt="Logo">
            <img src="../imagenes/itver-logo.png" alt="Logo" class="logoPNG4">
        </div>
    </header>

    <header class="encabezado3">
        <div class="contenido_encabezado3">
            <ul class="nav">
				<li><a href="">Inicio</a></li>
				<li><a href="">Consultas</a>
					<ul>
						<li><a href="../secciones/VistaC.php">Personal</a></li>
						<li><a href="../secciones/VistaD.php">Alumnado</a></li>
						<li><a href="../secciones/VistaB.php">Investigaciones</a></li>
                        <li><a href="../secciones/VistaF.php">Infraestructura</a></li>
                        <li><a href="../secciones/VistaG.php">Programa</a></li>
					</ul>
				</li>
				<li><a href="">Enlaces</a>
					<ul>
						<li><a href="https://www.tecnm.mx/">TECNM</a></li>
						<li><a href="https://www.veracruz.tecnm.mx/">ITVER</a></li>
						<li><a href="https://sii.veracruz.tecnm.mx/">SII</a></li>
						<li><a href="https://elearning.veracruz.tecnm.mx/">Moodle</a></li>
                        <li><a href="https://www.veracruz.tecnm.mx/index.php/mapa-del-tecnm-veracruz">Mapa virtual 3D del ITVER</a></li>
                        <li><a href="https://elibro.net/es/lc/itver/inactivo">Biblioteca elibro</a></li>
                        <li><a href="https://www.veracruz.tecnm.mx/index.php/normateca/documentos-operativos/manuales">Manuales del ITVER</a></li>
                        <li><a href="https://veracruztecnm-my.sharepoint.com/personal/disc_veracruz_tecnm_mx/_layouts/15/onedrive.aspx?id=%2Fpersonal%2Fdisc%5Fveracruz%5Ftecnm%5Fmx%2FDocuments%2FIngenier%C3%ADa%20en%20Sistemas%20Computacionales%2FReglamento%5Fde%5FEstudiantes%5Fdel%5FTecNM%2Epdf&parent=%2Fpersonal%2Fdisc%5Fveracruz%5Ftecnm%5Fmx%2FDocuments%2FIngenier%C3%ADa%20en%20Sistemas%20Computacionales&ga=1">Reglamento de estudiantes del TecNM</a></li>
					</ul>
				</li>
                <li><a href=""><span class="mdi mdi-account-box usuario"></span><?php echo isset($_SESSION['nombre_usuario']) ? htmlspecialchars($_SESSION['nombre_usuario']) : 'Invitado'; ?></a>
                    <ul>
                        <li><a href="../index.html">Cerrar Sesión</a></li>
                    </ul>
                </li>
			</ul>
        </div>
    </header>

    <!--<div class="header">
        <img src="../imagenes/itver.jpg" alt="Encabezado">
        <div class="overlay">
            <h1>Investigación</h1>
            <h2>Ingeniería en Sistemas Computacionales</h2>
            <div class="divider"></div>
        </div>
    </div>-->

    <div class="container">
        <div class="report-box">
            <h2>Reporte de Productividad en Investigación</h2>
            
            <div class="info-section">
            <?php if (!empty($programa)): ?>
                <?php foreach ($programa as $programa): ?>  
                <p><strong>Carrera:</strong> <?php echo $carrera['CARR_NOM']; ?></p>
                <p><strong>Año de creación:</strong> 1974 <span style="float: right;"><strong>CLAVE:</strong> <?php echo $programa['CLV_CARR']; ?></span></p>
                <table class="summary-table">
                    <tr>
                        <td class="center-align" colspan="2"><strong>RESUMEN</strong></td>
                    </tr>
                    <tr>         
                                     
                        <td>
                            <strong>Especialidades:</strong> <?php echo $programa['PROG_ESP']; ?><br>
                            <strong>Acreditaciones:</strong> <?php echo $programa['PROG_ACRE']; ?><br>
                            <strong>Capitulados:</strong> <?php echo $programa['PROG_CAP']; ?>0<br>
                            <strong>Matrícula:</strong> <?php echo $programa['PROG_MATR']; ?><br>
                            <strong>Fichas:</strong> <?php echo $programa['PROG_FICH']; ?><br>
                            <strong>Ingreso:</strong> <?php echo $programa['PROG_ING']; ?><br>
                            <strong>Segunda Lengua:</strong> <?php echo $programa['PROG_LENG']; ?><br>
                            <strong>Eficiencia Terminal:</strong> <?php echo $programa['PROG_EFIC']; ?>%<br>
                        </td>
                        <?php endforeach; ?>
                        <td>
                            <img src="/mnt/data/image.png" alt="Imagen de la tabla" class="summary-image">
                        </td>
                    </tr>
                </table>
                
            </div>
            <?php else: ?>
                <p>No hay datos sobre la carrera.</p>
            <?php endif; ?>
            
        </div>
        
        <div class="additional-info">
            <h2>PERSONAL</h2>
            <table class="personal-table">
                <tr>
                    <td>
                        <strong>Se cuenta con:</strong><br>
                        <?php echo $total_personal; ?> personas como personal<br>
                        <strong>Docentes:</strong> <?php echo $total_personalNADMIN; ?><br>
                        <strong>Administrativos:</strong> <?php echo $total_personalADMIN; ?><br>
                        <strong>Donde se tiene:</strong><br>
                        <?php echo $total_personalF; ?> <img src="ruta/a/imagen_femenino.png" alt="Femenino" class="small-icon"> <?php echo $total_personalM; ?> <img src="ruta/a/imagen_masculino.png" alt="Masculino" class="small-icon">
                    </td>
                    <td>
                        <div class="chart-container">
                            <h3>Estatus</h3>
                            <canvas id="estatusChart"></canvas>
                        </div>
                    </td>
                    <td>
                        <div class="chart-container">
                            <h3>Plaza</h3>
                            <canvas id="plazaChart"></canvas>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="chart-container">
                            <h3>Sabático</h3>
                            <canvas id="sabaticoChart"></canvas>
                        </div>
                    </td>
                    <td>
                        <div class="chart-container">
                            <h3>Máximo grado de estudios</h3>
                            <canvas id="gradoEstudiosChart"></canvas>
                        </div>
                    </td>
                    <td>
                        <div class="chart-container">
                            <h3>Personal que cuenta con:</h3>
                            <canvas id="personalCuentaChart"></canvas>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="history-section">
                            <h3>Historial de puestos administrativos</h3>
                            <p>Jefe de Proyecto Docente</p>
                            <p>PERIODO - NOMBRE COMPLETO PERSONAL - ESTADO: EJERCIENDO</p>
                            <p>PERIODO - NOMBRE COMPLETO PERSONAL - ESTADO: NO EJERCIENDO</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Tablas adicionales -->
        <div class="additional-sections">
            <h2>ALUMNOS</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>BECADOS</th>
                        <th>TITULADOS</th>
                        <th>RESIDENTES</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($alumnado as $alumnado): ?>
                    <tr>
                        <td><?php echo $alumnado['ALUM_BEC']; ?></td>
                        <td><?php echo $alumnado['ALUM_TITU']; ?></td>
                        <td><?php echo $alumnado['ALUM_RES']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <h2>INFRAESTRUCTURA</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>LABORATORIOS</th>
                        <th>TALLERES</th>
                        <th>COMPUTADORAS</th>
                        <th>ACERVO BIBLIOGRÁFICO</th>
                        <th>PROYECTORES</th>
                        <th>SERVIDORES</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($infra as $infra): ?>
                    <tr>
                        <td><?php echo $infra['INFRA_LAB']; ?></td>
                        <td><?php echo $infra['INFRA_TALLER']; ?></td>
                        <td><?php echo $infra['INFRA_COMP']; ?></td>
                        <td><?php echo $infra['INFRA_BIBLI']; ?></td>
                        <td><?php echo $infra['INFRA_PROY']; ?></td>
                        <td><?php echo $infra['INFRA_SERV']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <h2>VINCULACIÓN</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>CONVENIOS</th>
                        <th>SERVICIOS</th>
                        <th>EVENTOS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $carrera['CARR_CONV']; ?></td>
                        <td><?php echo $carrera['CARR_SERV']; ?></td>
                        <td><?php echo $carrera['CARR_EVEN']; ?></td>
                    </tr>
                </tbody>
            </table>

            <h2>INVESTIGACIÓN</h2>
            <div class="grafica">
                <canvas id="grafica1"></canvas>
            </div>
        </div>
    </div>

    <footer class="pie-de-pagina">

            <div class="footer-section section-uno">
                <div class="section">
                    <div class="section1">
                        <p>Dirección:</p>
                        <p>Tecnológico Nacional de México Veracruz <br> Calz. Miguel Angel de Quevedo 2779 <br> Col. Formando Hogar, Veracruz, Ver. MEXICO CP 91897 <br> Contacto: <br> (229) 934 15 00 <br> web_veracruz@tecnm.mx</p>
                        <p>Tecnológico Nacional de México Campus Veracruz <br> <a href="https://www.veracruz.tecnm.mx/index.php" class="linksa">www.veracruz.tecnm.mx</a> </p>
                    </div>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15071.537488956355!2d-96.159607!3d19.200252!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c34419964cc761%3A0xa6d7c54363cf608e!2sTecNM%20-%20Campus%20Instituto%20Tecnol%C3%B3gico%20de%20Veracruz!5e0!3m2!1ses-419!2smx!4v1716952412070!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="footer-section section-dos">
                <div class="section">
                    <img src="../images/logo-gob.svg" alt="Logo" class="gob">
                    <div class="section1">
                        <p>Enlaces</p>
                        <nav class="listaE2">
                            <ul>
                                <li><a href="https://participa.gob.mx" target="_blank">Participa</a></li>
                                <li><a href="https://www.gob.mx/publicaciones" target="_blank">Publicaciones Oficiales</a></li>
                                <li><a href="http://www.ordenjuridico.gob.mx" target="_blank">Marco Jurídico</a></li>
                                <li><a href="https://consultapublicamx.plataformadetransparencia.org.mx/vut-web/" target="_blank">Plataforma Nacional de Transparencia</a></li>
                                <li><a href="https://alertadores.funcionpublica.gob.mx" target="_blank">Alerta</a></li>
                                <li><a href="https://sidec.funcionpublica.gob.mx" target="_blank">Denuncia</a></li>
                            </ul>
                        </nav>
                    </div>
    
                    <div class="section1">
                        <p>¿Qué es gob.mx?</p>
                        <p>Es el portal único de trámites, información <br> y participación ciudadana. <br> <a href="https://www.gob.mx/que-es-gobmx" class="linksa">Leer más</a> </p>
                        <nav class="listaE2">
                            <ul>
                                <li><a href="https://datos.gob.mx" target="_blank">Portal de datos abiertos</a></li>
                                <li><a href="https://www.gob.mx/accesibilidad" target="_blank">Declaración de accesibilidad</a></li>
                                <li><a href="https://www.gob.mx/aviso_de_privacidad" target="_blank">Aviso de privacidad integral</a></li>
                                <li><a href="https://www.gob.mx/privacidadsimplificado" target="_blank">Aviso de privacidad simplificado</a></li>
                                <li><a href="https://www.gob.mx/terminos" target="_blank">Terminos y Condiciones</a></li>
                                <li><a href="https://www.gob.mx/terminos#medidas-seguridad-informacion" target="_blank">Política de seguridad</a></li>
                                <li><a href="https://www.gob.mx/sitemap" target="_blank">Mapa de sitio</a></li>
                            </ul>
                        </nav>
                    </div>
    
                    <div class="section1">
                        <a href="https://www.gob.mx/tramites/ficha/presentacion-de-quejas-y-denuncias-en-la-sfp/SFP54" class="links">Denuncia contra servidores <br> públicos</a>
                        <p>Síguenos en</p>
                        <div class="cont4">
                            <a href="https://www.facebook.com/gobmexico" target="_blank">
                                <span class="mdi mdi-facebook icon-white"></span>
                            </a>
                            <a href="https://x.com/GobiernoMX" target="_blank">
                                <span class="mdi mdi-twitter icon-white"></span>
                            </a>
                        </div>
                    </div>
    
                </div>
                <img src="../images/pleca-gob.svg" alt="Imagen">
            </div>

    </footer >

    <script>
        // Datos y configuración para los gráficos
        const estatusData = {
            labels: ['Activo', 'Fallecido', 'Jubilado', 'Sabático'],
            datasets: [{
                data: [<?php echo $PorPerA; ?>, <?php echo $PorPerFa; ?>, <?php echo $PorPerJ; ?>, <?php echo $PorPerS; ?>], // Valores asignados
                backgroundColor: ['#388E3C', '#4CAF50', '#81C784', '#A5D6A7']
            }]
        };

        const plazaData = {
            labels: ['Tiempo Completo', 'Horas', '3/4 de Tiempo', '1/2 Tiempo'],
            datasets: [{
                data: [<?php echo $PorPerTC; ?>, <?php echo $PorPerH; ?>, <?php echo $PorPerTCT; ?>, <?php echo $PorPerMT; ?>], // Valores asignados
                backgroundColor: ['#388E3C', '#4CAF50', '#81C784', '#A5D6A7']
            }]
        };

        const sabaticoData = {
            labels: ['En proceso', 'Culminado'],
            datasets: [{
                data: [50, 50], // Valores asignados
                backgroundColor: ['#388E3C', '#4CAF50']
            }]
        };

        const gradoEstudiosData = {
            labels: ['Licenciatura', 'Maestría', 'Doctorado'],
            datasets: [{
                label: 'Máximo grado de estudios',
                data: [<?php echo $total_personalLIC; ?>, <?php echo $total_personalMAE; ?>, <?php echo $total_personalDOC; ?>],
                backgroundColor: ['#388E3C', '#4CAF50', '#81C784']
            }]
        };

        const personalCuentaData = {
            labels: ['Licencia', 'Certificación', 'Tutor'],
            datasets: [{
                label: 'Personal que cuenta con',
                data: [<?php echo $total_personalLICE; ?>, <?php echo $total_personalCERT; ?>, <?php echo $total_personalTutor; ?>],
                backgroundColor: ['#388E3C', '#4CAF50', '#81C784']
            }]
        };

        const investigacionData1 = {
            labels: ['SNI', 'Patentes', 'Cuerpo Académico', 'Línea de Investigación', 'Beca Académica', 'Perfil Deseable'],
            datasets: [
                {
                    label: 'Si',
                    data: [<?php echo $PorPerSNI; ?>, <?php echo $PorPerPAT; ?>, <?php echo $PorPerACA; ?>, <?php echo $PorPerLINV; ?>, <?php echo $PorPerBEC; ?>, <?php echo $PorPerPD; ?>],
                    backgroundColor: '#4CAF50',
                },
                {
                    label: 'No',
                    data: [<?php echo $PorPerSNIN; ?>, <?php echo $PorPerPATN; ?>, <?php echo $PorPerACAN; ?>, <?php echo $PorPerLINVN; ?>, <?php echo $PorPerBECN; ?>, <?php echo $PorPerPDN; ?>],
                    backgroundColor: '#388E3C',
                }
            ]
        };

        // Configuración de gráficos
        const config = (type, data) => ({
            type: type,
            data: data,
            options: {
                indexAxis: 'y', // Gráfico de barras horizontales para investigacionData1
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.dataset.label || '';
                                const value = context.raw;
                                return label + ': ' + value + '%';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Creación de gráficos
        window.onload = function() {
            new Chart(document.getElementById('estatusChart'), config('doughnut', estatusData));
            new Chart(document.getElementById('plazaChart'), config('doughnut', plazaData));
            new Chart(document.getElementById('sabaticoChart'), config('doughnut', sabaticoData));
            new Chart(document.getElementById('gradoEstudiosChart'), config('bar', gradoEstudiosData));
            new Chart(document.getElementById('personalCuentaChart'), config('bar', personalCuentaData));
            new Chart(document.getElementById('grafica1'), config('bar', investigacionData1));
        };
    </script>
    <?php endforeach; ?>
</body>
</html>
