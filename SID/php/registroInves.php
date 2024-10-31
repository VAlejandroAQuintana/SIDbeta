<?php
include 'db_conexion.php';

/* INFRAESTRUCTURA */
$INV_SNI = $_POST['sni'];
$INV_PAT = $_POST['patente'];
$INV_ACA = $_POST['academico'];
$INV_LINEA_INV = $_POST['linea'];
$INV_BEC = $_POST['beca'];
$INV_PERFIL_DES = $_POST['perfil'];
$INV_ACT = $_POST['fecha'];
$RFC_PERS = $_POST['rfc'];

$sql = "INSERT INTO investigacion (INV_SNI, INV_PAT, INV_ACA, INV_LINEA_INV, INV_BEC, INV_PERFIL_DES, INV_ACT, RFC_PERS) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $INV_SNI, $INV_PAT, $INV_ACA, $INV_LINEA_INV, $INV_BEC, $INV_PERFIL_DES, $INV_ACT, $RFC_PERS);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$conn->close();

?>