<?php
    include 'db_conexion.php';

    $RFC = $_POST["rfc"];

    //print_r($RFC);
    $stmt = $conn->prepare("SELECT * FROM personal WHERE RFC_PERS = '$RFC'");
    if ($stmt) {
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener los resultados
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = $row['PERS_NOM'];
                $apellidoP = $row['PERS_APP'];
                $apellidoM = $row['PERS_APM'];
            }
        } else {
            echo "0 resultados";
        }
    
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $stmt = $conn->prepare("SELECT * FROM estatus_personal WHERE RFC_PERS = '$RFC'");
    if ($stmt) {
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener los resultados
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estatus = $row['EST_EST_LAB'];
                $plaza = $row['EST_PLAZA'];
                $estudios = $row['EST_GRADO'];
                $certificaciones = $row['EST_CERT'];
                $asociaciones = $row['EST_ASOC'];
                $tutor = $row['EST_TUTOR'];
                $licencia = $row['EST_LIC'];
                $sabatico = $row['EST_SAB'];
                $puesto = $row['EST_PUESTO'];
                $actualizacion = $row['EST_ACT'];
            }
        } else {
            echo "0 resultados";
        }
    
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    $infoPersonal = [];
    array_push($infoPersonal, [
        "nombre" => $nombre,
        "apellidoP" => $apellidoP,
        "apellidoM" => $apellidoM,
        "estatus" => $estatus,
        "plaza" => $plaza,
        "estudios" => $estudios,
        "certificaciones" => $certificaciones,
        "asociaciones" => $asociaciones,
        "tutor" => $tutor,
        "licencia" => $licencia,
        "sabatico" => $sabatico,
        "puesto" => $puesto,
        "actualizacion" => $actualizacion,
    ]);

    echo json_encode($infoPersonal);

?>