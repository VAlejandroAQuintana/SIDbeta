<?php
    include '../php/db_conexion.php';

    //Consulta de los nombres del personal
    $stmt = $conn->prepare("SELECT RFC_PERS, PERS_NOM, PERS_APP, PERS_APM FROM personal WHERE CLV_CARR = 'ISC273678286' ");
    if ($stmt) {
    

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $personalL = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $personalL[] = $row;
        }
    } else {
        echo "0 resultados";
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar y Ordenar Personal</title>
    <link rel="stylesheet" href="../css/style-registro.css">
    <link rel="stylesheet" href="../css/styles6.css">
    <link rel="stylesheet" href="../css/styles2.css">
    <?php session_start();?>
    
</head>
<body>
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
                <li><a href="../secciones/VistaA.php">Inicio</a></li>
				<li><a href="">Consultas</a>
					<ul>
                        <li><a href="">Personal</a></li>
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
            <h1>Personal</h1>
            <h2>Ingeniería en Sistemas Computacionales</h2>
            <div class="divider"></div>
        </div>
    </div>-->

    <div class="modal" id="modal-informacion-personal" style="display: none">
        <div class="modal-content" id="modalC">
            <span class="close-button" onclick="closeModal('modal-informacion-personal')">&times;</span>
            <h2>Información del Personal</h2>
            <p><strong>Nombre Completo Personal</strong></p>
            <p>Estatus: Activo</p>
            <p>Plaza: Tiempo Completo</p>
            <p>Máximo grado de estudios: Licenciatura</p>
            <p>Certificaciones: Si</p>
            <p>Asociaciones: 0</p>
            <p>Tutor: Si</p>
            <p>Licencia: No</p>
            <p>Sabático: No</p>
            <p>Jefe de Proyecto Docente</p>
            <p>Última actualización: 00 - 00 - 0000</p>
            <p>Puestos desempeñados:</p>
            <p>ENE/JUN 2020 - AGO/DIC 2023</p>
            <p>ENE/JUN 2017 - AGO/DIC 2019 | Investigador</p>
        </div>
    </div>

    <div class="container">
        <div class="top-bar">
            <button class="filter-button" onclick="toggleFilter()">&#9776; Filtrar por</button>
            <div class="filter-select">
                <label for="sort">Nombre del personal: </label>
                <select id="sort">
                <?php if (!empty($personalL)): ?>
                <?php foreach ($personalL as $personal): ?>
                    <option value=<?php echo $personal['RFC_PERS']; ?>><?php echo $personal['PERS_NOM']." ".$personal['PERS_APP']." ".$personal['PERS_APM']; ?></option>
                    <!-- Agregar más opciones -->
                <?php endforeach; ?> 
                <?php else: ?>
                
                <?php endif; ?>
                </select>   
                <button class="filter-button" id="btnVisuInfo">Visualizar información</button>
            </div>
        </div>
        
        <div class="content-section" id="divContent">
            <div class="filter-section" id="filter-menu" style="display: none;">
                <h2>Filtrar por</h2>
                <div class="filter-group">
                    <label>Género</label>
                    <label><input type="checkbox" id="chkF"> Femenino</label>
                    <label><input type="checkbox" id="chkM"> Masculino</label>
                </div>
                <!--<div class="filter-group">
                    <label>Asociación</label>
                    <div class="association-group">
                        <input type="text" placeholder="Mínimo">
                        <input type="text" placeholder="Máximo">
                    </div>
                </div> -->
                <div class="filter-group">
                    <label for="estatus">Estatus</label>
                    <select id="estatus">
                        <option value="Activo">Activo</option>
                        <option value="Jubilado">Jubilado</option>
                        <option value="Fallecido">Fallecido</option>
                        <option value="Sabatico">Sabatico</option>
                        <!-- Agregar más opciones -->
                    </select>
                </div>
                <div class="filter-group">
                    <label for="grado-estudio">Máximo grado de estudio</label>
                    <select id="grado-estudio">
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestria">Maestría</option>
                        <option value="Doctorado">Doctorado</option>
                        <!-- Agregar más opciones -->
                    </select>
                </div>
                <div class="filter-group">
                    <label for="plaza">Plaza</label>
                    <select id="plaza">
                        <option value="Tiempo Completo">Tiempo Completo</option>
                        <option value="Horas">Horas</option>
                        <option value="3/4 Tiempo">3/4 Tiempo</option>
                        <option value="1/2 Tiempo">1/2 Tiempo</option>
                        <!-- Agregar más opciones -->
                    </select>
                </div>
                <div class="filter-group">
                    <label for="puesto">Puesto</label>
                    <select id="puesto">
                        <option value="Administrativo">Administrativo</option>
                        <option value="Docente">Docente</option>
                        <!-- Agregar más opciones -->
                    </select>
                </div>

                <button id="btnConfirmar">Confirmar</button>
                <button id="btnResetear" onClick="location.reload();">Resetear</button>
            </div>
            <div class="profile-cards" id="profileCs">
                <?php if (!empty($personalL)): ?>
                <?php foreach ($personalL as $personal): ?>
                <div class="profile-card" id=<?php echo $personal['RFC_PERS']; ?>>
                    <img src="../images/perfil.png" alt="Foto de perfil">
                    <h3><?php echo $personal['PERS_NOM']." ".$personal['PERS_APP']." ".$personal['PERS_APM']; ?></h3>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p>No hay datos encontrados.</p>
                <?php endif; ?>
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
            <img src="images/pleca-gob.svg" alt="Imagen">
        </div>
    </footer>
    <script>
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function toggleFilter() {
            var filterMenu = document.getElementById('filter-menu');
            if (filterMenu.style.display === 'none') {
                filterMenu.style.display = 'block';
            } else {
                filterMenu.style.display = 'none';
            }
        }
    </script>

    <script src="../js/vistaC.js"></script>
</body>
</html>
