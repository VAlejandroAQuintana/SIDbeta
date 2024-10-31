<?php
include 'db_conexion.php';

$NombreCarrera = $_POST['nombreCarrera'];

$sql = "SELECT MAX(INFRA_ACT) AS FechaMaxima FROM `infraestructura` WHERE CLV_CARR = '$NombreCarrera';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $FechaMaxima = $row['FechaMaxima'];
} else {
    $FechaMaxima = "0000-00-00";
}

//print_r($FechaMaxima);

$stmt = $conn->prepare("SELECT * FROM `infraestructura` WHERE CLV_CARR = '$NombreCarrera' AND INFRA_ACT = '$FechaMaxima';");
if ($stmt) {
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener los resultados
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $Laboratorios = $row['INFRA_LAB'];
            $ABibliografico = $row['INFRA_BIBLI'];
            $Proyectores = $row['INFRA_PROY'];
            $Servidores = $row['INFRA_SERV'];
            $Computadoras = $row['INFRA_COMP'];
        }
   } else {
            echo "0 resultados";
    }
    
    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

$infoInfra = [];
array_push($infoInfra, [
    "laboratorios" => $Laboratorios,
    "aBibliografico" => $ABibliografico,
    "proyectores" => $Proyectores,
    "servidores" => $Servidores,
    "computadoras" => $Computadoras,
    "fechaMaxima" => $FechaMaxima,   
]);

echo json_encode($infoInfra);

?>