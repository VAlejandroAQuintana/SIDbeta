<?php
include 'db_conexion.php';

$NombreCarrera = $_POST['nombreCarrera'];

$sql = "SELECT MAX(ALUM_ACT) AS FechaMaxima FROM alumnado WHERE CLV_CARR = '$NombreCarrera';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $FechaMaxima = $row['FechaMaxima'];
} else {
    $FechaMaxima = "0000-00-00";
}

$stmt = $conn->prepare("SELECT * FROM alumnado WHERE CLV_CARR = '$NombreCarrera' AND ALUM_ACT = '$FechaMaxima';");
if ($stmt) {
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener los resultados
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $Becados = $row['ALUM_BEC'];
            $Titulados = $row['ALUM_TITU'];
            $Residentes = $row['ALUM_RES'];
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
    "becados" => $Becados,
    "titulados" => $Titulados,
    "residentes" => $Residentes,
    "fechaMaxima" => $FechaMaxima,  
]);

echo json_encode($infoInfra);
?>