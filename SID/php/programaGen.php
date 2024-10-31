<?php
include 'db_conexion.php';

$NombreCarrera = $_POST['nombreCarrera'];

$sql = "SELECT MAX(PROG_VIG) AS FechaMaxima FROM programa WHERE CLV_CARR = '$NombreCarrera';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtener el resultado
    $row = $result->fetch_assoc();
    $FechaMaxima = $row['FechaMaxima'];
} else {
    $FechaMaxima = "0000-00-00";
}

$stmt = $conn->prepare("SELECT * FROM programa WHERE CLV_CARR = '$NombreCarrera' AND PROG_VIG = '$FechaMaxima';");
if ($stmt) {
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener los resultados
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $Espacialidades = $row['PROG_ESP'];
            $Capitulados = $row['PROG_CAP'];
            $Acreditaciones = $row['PROG_ACRE'];
            $Matriculados = $row['PROG_MATR'];
            $Fichas = $row['PROG_FICH'];
            $Alumnos = $row['PROG_ING'];
            $EfiTer = $row['PROG_EFIC'];
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
    "especialidades" => $Espacialidades,
    "capitulados" => $Capitulados,
    "acreditaciones" => $Acreditaciones,
    "matriculados" => $Matriculados,
    "fichas" => $Fichas,
    "alumnos" => $Alumnos, 
    "fechaMaxima" => $FechaMaxima,  
    "efiTer" => $EfiTer,
]);

echo json_encode($infoInfra);
?>