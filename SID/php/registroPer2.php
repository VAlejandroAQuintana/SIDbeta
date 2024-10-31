<?php
include 'db_conexion.php';

/* ALUMNADO */
$RFC_PERS = $_POST['rfc'];
$PERS_NOM = $_POST['nombre'];
$PERS_APP = $_POST['ap'];
$PERS_APM = $_POST['am'];
$PERS_GEN = $_POST['genero'];
$PERS_FUND = $_POST['fundador'];
$PERS_ING = $_POST['dateIns'];
$CLV_CARR = $_POST['carrera'];

$EST_CERT = $_POST['certificado'];
$EST_EST_LAB = $_POST['estatus'];
$EST_GRADO = $_POST['nivel'];
$EST_PLAZA = $_POST['plaza'];
$EST_ASOC = $_POST['asocioaciones'];
$EST_ACT = $_POST['dateAct_activo'];

$EST_SAB = "No";
$EST_LIC = $_POST['licencia_activo'];
$EST_PUESTO = $_POST['puesto_activo'];
$EST_TUTOR = $_POST['tutor_activo'];

$sql = "INSERT INTO personal (RFC_PERS, PERS_NOM, PERS_APP, PERS_APM, PERS_GEN, PERS_FUND, PERS_ING, CLV_CARR) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $RFC_PERS, $PERS_NOM, $PERS_APP, $PERS_APM, $PERS_GEN, $PERS_FUND, $PERS_ING, $CLV_CARR);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$sql2 = "INSERT INTO estatus_personal (EST_CERT, EST_SAB, EST_LIC, EST_EST_LAB, EST_PUESTO, EST_GRADO, EST_TUTOR, EST_PLAZA, EST_ASOC, EST_ACT, RFC_PERS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ssssssssiss", $EST_CERT, $EST_SAB, $EST_LIC, $EST_EST_LAB, $EST_PUESTO, $EST_GRADO, $EST_TUTOR, $EST_PLAZA, $EST_ASOC, $EST_ACT, $RFC_PERS);

if ($stmt2->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$stmt2->close();

$conn->close();

?>