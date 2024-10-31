<?php
include 'db_conexion.php';

/* ALUMNADO */
$CLV_EST = $_POST['clvEstatus'];

$DOC_NOM = $_POST['nomDocC'];
$DOC_TIPO = "CERTIFICADO";

$DOC_UBI = "Z:\www\SID\documentos";

$sql = "INSERT INTO documento (DOC_NOM, DOC_TIPO, DOC_UBI, CLV_EST) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $DOC_NOM, $DOC_TIPO, $DOC_UBI, $CLV_EST);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();



$conn->close();

?>