<?php
include 'db_conexion.php';
$FechaI = $_POST['fechaInicio'];
$FechaF = $_POST['fechaFin'];

//print_r($fechaF);

//Consulta de la cantitad total de personal
$sql = "SELECT COUNT(*) AS total FROM investigacion";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personal = $row['total'];
} else {
    $total_personal = 0;
}

//Consultas del personal que tenga y no tenga SNI
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_SNI = 'Si' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_SNI = 'No' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalSNI = $row['total'];
    $PorPerSNI = $total_personalSNI/$total_personal*100;
} else {
    $total_personalSNI = 0;
    $PorPerSNIN = 0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalSNIN = $row['total'];
    $PorPerSNIN = $total_personalSNIN/$total_personal*100;
} else {
    $total_personalSNIN = 0;
    $PorPerSNIN = 0;
}

//Consultas del personal que tenga y no tenga patentes
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PAT = 'Si' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PAT = 'No' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalPAT = $row['total'];
    $PorPerPAT = $total_personalPAT/$total_personal*100;
} else {
    $total_personalPAT = 0;
    $PorPerPAT=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalPATN = $row['total'];
    $PorPerPATN = $total_personalPATN/$total_personal*100;
} else {
    $total_personalPATN = 0;
    $PorPerPATN=0;
}


//Consultas del personal que tenga y no tenga un cuerpo académico
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_ACA = 'Si' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_ACA = 'No' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalACA = $row['total'];
    $PorPerACA = $total_personalACA/$total_personal*100;
} else {
    $total_personalACA = 0;
    $PorPerACA=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalACAN = $row['total'];
    $PorPerACAN = $total_personalACAN/$total_personal*100;
} else {
    $total_personalACAN = 0;
    $PorPerACAN=0;
}

//Consultas del personal que tenga y no tenga lineas de investigación
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_LINEA_INV = 'Si' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_LINEA_INV = 'No' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalLINV = $row['total'];
    $PorPerLINV = $total_personalLINV/$total_personal*100;
} else {
    $total_personalLINV = 0;
    $PorPerLINV=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalLINVN = $row['total'];
    $PorPerLINVN = $total_personalLINVN/$total_personal*100;
} else {
    $total_personalLINVN = 0;
    $PorPerLINVN=0;
}

//Consultas del personal que tenga y no tenga beca academica
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_BEC = 'Si' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_BEC = 'No' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalBEC = $row['total'];
    $PorPerBEC = $total_personalBEC/$total_personal*100;
} else {
    $total_personalBEC = 0;
    $PorPerBEC=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalBECN = $row['total'];
    $PorPerBECN = $total_personalBECN/$total_personal*100;
} else {
    $total_personalBECN = 0;
    $PorPerBECN=0;
}

//Consultas del personal que tenga y no tenga un perfil deseable
$sql = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PERFIL_DES = 'Si' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";
$sql2 = "SELECT COUNT(*) AS total FROM investigacion WHERE INV_PERFIL_DES = 'No' AND (INV_ACT >= '$FechaI' AND INV_ACT <= '$FechaF')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $total_personalPD = $row['total'];
    $PorPerPD = $total_personalPD/$total_personal*100;
} else {
    $total_personalPD = 0;
    $PorPerPD=0;
}

if ($result2->num_rows > 0) {
    // Obtener el resultado
    $row = $result2->fetch_assoc();
    $total_personalPDN = $row['total'];
    $PorPerPDN = $total_personalPDN/$total_personal*100;
} else {
    $total_personalPDN = 0;
    $PorPerPDN=0;
}

$PerINF = [];

array_push($PerINF, [
    "PorPerSNI" => $PorPerSNI,
    "PorPerSNIN" => $PorPerSNIN,
    "PorPerPAT" => $PorPerPAT,
    "PorPerPATN" => $PorPerPATN,
    "PorPerACA" => $PorPerACA,
    "PorPerACAN" => $PorPerACAN,
    "PorPerLINV" => $PorPerLINV,
    "PorPerLINVN" => $PorPerLINVN,
    "PorPerBEC" => $PorPerBEC,
    "PorPerBECN" => $PorPerBECN,
    "PorPerPD" => $PorPerPD,
    "PorPerPDN" => $PorPerPDN,
]);

echo json_encode($PerINF);

$conn->close();
?>