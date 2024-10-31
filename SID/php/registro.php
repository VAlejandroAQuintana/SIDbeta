<?php
include 'db_conexion.php';

/* ALUMNADO */
$CLV_CARR = $_POST['clave'];
$ALUM_BEC = $_POST['beca'];
$ALUM_TITU = $_POST['titulo'];
$ALUM_RES = $_POST['resi'];
$ALUM_ACT = $_POST['fecha'];

$sql = "INSERT INTO alumnado (ALUM_BEC, ALUM_TITU, ALUM_RES, ALUM_ACT, CLV_CARR) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiss", $ALUM_BEC, $ALUM_TITU, $ALUM_RES, $ALUM_ACT, $CLV_CARR);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$conn->close();

?>