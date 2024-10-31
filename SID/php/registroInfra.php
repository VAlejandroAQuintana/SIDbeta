<?php
include 'db_conexion.php';

/* INFRAESTRUCTURA */
$INFRA_LAB = $_POST['laboratorio'];
$INFRA_TALLER = $_POST['taller'];
$INFRA_BIBLI = $_POST['acervo_biblio'];
$INFRA_PROY = $_POST['proyector'];
$INFRA_SERV = $_POST['servidor'];
$INFRA_COMP = $_POST['computadora'];
$INFRA_ACT = $_POST['fecha'];
$CLV_CARR = $_POST['carrera'];

$sql = "INSERT INTO infraestructura (INFRA_LAB, INFRA_TALLER, INFRA_BIBLI, INFRA_PROY, INFRA_SERV, INFRA_COMP, INFRA_ACT, CLV_CARR) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiiiiss", $INFRA_LAB, $INFRA_TALLER, $INFRA_BIBLI, $INFRA_PROY, $INFRA_SERV, $INFRA_COMP, $INFRA_ACT, $CLV_CARR);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$conn->close();

?>