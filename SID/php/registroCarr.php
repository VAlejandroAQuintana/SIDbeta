<?php
include 'db_conexion.php';

/* INFRAESTRUCTURA */
$CLV_CARR = $_POST['clv_carrera'];
$CARR_NOM = $_POST['nom_carrera'];
$CARR_CONV = $_POST['convenio'];
$CARR_SERV = $_POST['servicio'];
$CARR_EVEN = $_POST['evento'];
$CARR_ACT = $_POST['fecha'];

$sql = "INSERT INTO carrera (CLV_CARR, CARR_NOM, CARR_CONV, CARR_SERV, CARR_EVEN, CARR_ACT) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiiis", $CLV_CARR, $CARR_NOM, $CARR_CONV, $CARR_SERV, $CARR_EVEN, $CARR_ACT);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$conn->close();

?>