<?php

include 'db_conexion.php';

    //Carrera
    $stmt = $conn->prepare("SELECT CLV_CARR, CARR_NOM FROM carrera");
    if ($stmt) {
    
    $stmt->execute();

    $result = $stmt->get_result();
    $carrera = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carrera[] = $row;
        }
    } else {
        //echo "0 resultados";
    }

    $stmt->close();
    } else {
    echo "Error al preparar la consulta: " . $conn->error;
    }

    //Personal
    $stmt = $conn->prepare("SELECT RFC_PERS FROM personal");
    if ($stmt) {
    
    $stmt->execute();

    $result = $stmt->get_result();
    $personal = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $personal[] = $row;
        }
    } else {
        //echo "0 resultados";
    }

    $stmt->close();
    } else {
    echo "Error al preparar la consulta: " . $conn->error;
    }

    //PERSONAL REGISTRADO AL DIA
    //$stmt = $conn->prepare("SELECT CLV_EST, RFC_PERS  FROM estatus_personal WHERE DATE(EST_ACT) = date_add(CURDATE(), INTERVAL -1 DAY)");
    $stmt = $conn->prepare("SELECT CLV_EST, RFC_PERS  FROM estatus_personal WHERE DATE(EST_ACT) = CURDATE()");
    if ($stmt) {
    
    $stmt->execute();

    $result = $stmt->get_result();
    $personalHoy = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $personalHoy[] = $row;
        }
    } else {
        //echo "0 resultados";
    }

    $stmt->close();
    } else {
    echo "Error al preparar la consulta: " . $conn->error;
    }

?>