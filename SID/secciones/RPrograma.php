<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SID</title>
    <link rel="stylesheet" href="../css/style-registro.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="../js/registroProg.js" defer></script>
    <?php include '../php/cargaDatos.php'; ?>
    <?php session_start();?>
</head>
<body>
    
    <header class="encabezado1">
        <div class="contenido_encabezado1">
            <img src="../images/logo-gob.svg" alt="Logo" class="small-svg">
            <nav class="listaE1">
                <ul>
                    <li><a href="https://www.gob.mx/gobierno" target="_blank">Gobierno</a></li>
                    <li><a href="https://www.participa.gob.mx/" target="_blank">Participa</a></li>
                    <li><a href="https://datos.gob.mx/" target="_blank">Datos</a></li>
                </ul>
            </nav>
            <a href="https://www.gob.mx/busqueda" target="_blank">
                <span class="mdi mdi-magnify icon-white"></span>
            </a>
        </div>
    </header>

    <header class="encabezado2">
        <div class="contenido_encabezado2">
            <img src="../images/logo-gob-mx.png" alt="Logo" class="logoPNG">
            <img src="../images/linea-vertical-separador-logos.svg" alt="Logo">
            <img src="../images/logo-educacion.svg" alt="Logo" class="logoPNG2">
            <img src="../images/linea-vertical-separador-logos.svg" alt="Logo">
            <img src="../images/logo-tecnm.svg" alt="Logo" class="logoPNG3">
            <img src="../images/linea-vertical-separador-logos.svg" alt="Logo">
            <img src="../images/itver-logo.png" alt="Logo" class="logoPNG4">
        </div>
    </header>

    <header class="encabezado3">
        <div class="contenido_encabezado3">
            <ul class="nav">
				<li><a href="../secciones/Inicio.php">Inicio</a></li>
				<li><a href="">Registro</a>
					<ul>
						<li><a href="../secciones/RPersonal.php">Personal</a></li>
						<li><a href="../secciones/RAlumno.php">Alumnado</a></li>
						<li><a href="../secciones/RInvestigacion.php">Investigaciones</a></li>
                        <li><a href="../secciones/RInfraestructura.php">Infraestructura</a></li>
                        <li><a href="">Programa</a></li>
                        <li><a href="../secciones/RCarrera.php">Carrera</a></li>
					</ul>
				</li>
                <li><a href="../secciones/RControlUsuario.php">Control Acceso</a></li>
				<li><a href="">Enlaces</a>
					<ul>
						<li><a href="https://www.tecnm.mx/" target="_blank">TECNM</a></li>
						<li><a href="https://www.veracruz.tecnm.mx/" target="_blank">ITVER</a></li>
						<li><a href="https://sii.veracruz.tecnm.mx/" target="_blank">SII</a></li>
						<li><a href="https://elearning.veracruz.tecnm.mx/" target="_blank">Moodle</a></li>
                        <li><a href="https://www.veracruz.tecnm.mx/index.php/mapa-del-tecnm-veracruz" target="_blank">Mapa virtual 3D del ITVER</a></li>
                        <li><a href="https://elibro.net/es/lc/itver/inactivo" target="_blank">Biblioteca elibro</a></li>
                        <li><a href="https://www.veracruz.tecnm.mx/index.php/normateca/documentos-operativos/manuales" target="_blank">Manuales del ITVER</a></li>
                        <li><a href="https://veracruztecnm-my.sharepoint.com/personal/disc_veracruz_tecnm_mx/_layouts/15/onedrive.aspx?id=%2Fpersonal%2Fdisc%5Fveracruz%5Ftecnm%5Fmx%2FDocuments%2FIngenier%C3%ADa%20en%20Sistemas%20Computacionales%2FReglamento%5Fde%5FEstudiantes%5Fdel%5FTecNM%2Epdf&parent=%2Fpersonal%2Fdisc%5Fveracruz%5Ftecnm%5Fmx%2FDocuments%2FIngenier%C3%ADa%20en%20Sistemas%20Computacionales&ga=1" target="_blank">Reglamento de estudiantes del TecNM</a></li>
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

    <div class="cuerpo">
        <div class="contenido">
            <h3>REGISTRO PROGRAMA</h3>
        </div>
        <div class="contenido1">
            <div class="cont1">

                <p>Carrera:</p>
                <select id="carrera" class="combobox2">
                    <?php foreach ($carrera as $carrera): ?>
                        <option value=<?php echo $carrera['CLV_CARR']; ?>><?php echo $carrera['CLV_CARR']." - ".$carrera['CARR_NOM']; ?></option>
                    <?php endforeach; ?> 
                </select>

                <p>Clave del programa:</p>
                <input type="text" id="clv_programa" name="clv_programa" placeholder="">
                <p>Nombre del programa:</p>
                <input type="text" id="nom_programa" name="nom_programa" placeholder="">

                <p>Fecha de vencimiento:</p>
                <input type="date" id="fecha" name="fecha" placeholder="">

                <p>Numero de especialidades:</p>
                <input type="number" id="especialidad" name="especialidad" placeholder="">
                <p>Numero de acreditaciones:</p>
                <input type="number" id="acreditacion" name="acreditacion" placeholder="">
                <p>Numero de capitulados:</p>
                <input type="number" id="capitulado" name="capitulado" placeholder="">
                <p>Numero de matriculas:</p>
                <input type="number" id="matricula" name="matricula" placeholder="">
                <p>Numero de fichas:</p>
                <input type="number" id="ficha" name="ficha" placeholder="">
                <p>Numero de ingresados:</p>
                <input type="number" id="ingreso" name="ingreso" placeholder="">

                <p>¿Se cuenta con segunda lengua?</p>
                <select id="lengua" class="combobox2">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>

                <p>Eficiencia terminal</p>
                <input type="number" id="terminal" name="terminal" placeholder="">

                <button class="submit" id="guardarProg">Ingresar</button>

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
    </footer>

</body>
</html>
