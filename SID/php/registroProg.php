<?php
include 'db_conexion.php';

/* INFRAESTRUCTURA */
$CLV_PROG = $_POST['clave_programa'];
$PROG_NOM = $_POST['nom_programa'];
$PROG_VIG = $_POST['fecha'];
$PROG_ESP = $_POST['especialidad'];
$PROG_ACRE = $_POST['acreditacion'];
$PROG_CAP = $_POST['capitulado'];
$PROG_MATR = $_POST['matricula'];
$PROG_FICH = $_POST['ficha'];
$PROG_ING = $_POST['ingreso'];
$PROG_LENG = $_POST['lengua'];
$PROG_EFIC = $_POST['eficiencia'];
$CLV_CARR = $_POST['carrera'];

$sql = "INSERT INTO programa (CLV_PROG, PROG_NOM, PROG_VIG, PROG_ESP, PROG_ACRE, PROG_CAP, PROG_MATR, PROG_FICH, PROG_ING, PROG_LENG, PROG_EFIC, CLV_CARR) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiiiiiisds", $CLV_PROG, $PROG_NOM, $PROG_VIG, $PROG_ESP, $PROG_ACRE, $PROG_CAP, $PROG_MATR, $PROG_FICH, $PROG_ING, $PROG_LENG, $PROG_EFIC, $CLV_CARR);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$conn->close();

?>