<?php
    include 'db_conexion.php';

    $estatus = $_POST["estatus"];
    $gradoE = $_POST["gradoE"];
    $plaza = $_POST["plaza"];
    $puesto = $_POST["puesto"];

    $checkF = $_POST["checkF"];
    $checkM = $_POST["checkM"];

    if($puesto == "Administrativo"){
        $stmt = $conn->prepare("SELECT RFC_PERS FROM estatus_personal WHERE EST_EST_LAB = '$estatus' AND EST_GRADO = '$gradoE' AND EST_PLAZA = '$plaza' AND EST_PUESTO = '$puesto'");
    }
    else{
        $stmt = $conn->prepare("SELECT RFC_PERS FROM estatus_personal WHERE EST_EST_LAB = '$estatus' AND EST_GRADO = '$gradoE' AND EST_PLAZA = '$plaza' AND EST_PUESTO != 'Administrativo'");
    }

    if ($stmt) {
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener los resultados
        $result = $stmt->get_result();
        $ListaRFC = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ListaRFC[] = $row;
            }
        } else {
            
        }
    
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    //print_r($ListaRFC);

    if($checkF == "true"){
        if($checkM == "true"){
            $sql = "SELECT * FROM personal WHERE CLV_CARR = 'ISC273678286' AND (RFC_PERS = '' ";
            foreach ($ListaRFC as $RFC){
                $sql=$sql."OR RFC_PERS = '$RFC[RFC_PERS]' ";
            }
            $sql=$sql.")";
        }
        else{
            $sql = "SELECT * FROM personal WHERE PERS_GEN = 'F' AND CLV_CARR = 'ISC273678286' AND (RFC_PERS = '' ";
            foreach ($ListaRFC as $RFC){
                $sql=$sql."OR RFC_PERS = '$RFC[RFC_PERS]' ";
            }
            $sql=$sql.")";
        }
    }
    else{
        if($checkM == "true"){
            $sql = "SELECT * FROM personal WHERE PERS_GEN = 'M' AND CLV_CARR = 'ISC273678286' AND (RFC_PERS = '' ";
            foreach ($ListaRFC as $RFC){
                $sql=$sql."OR RFC_PERS = '$RFC[RFC_PERS]' ";
            }
            $sql=$sql.")";
        }
        else{
            $sql = "SELECT * FROM personal WHERE CLV_CARR = 'ISC273678286' AND (RFC_PERS = '' ";
            foreach ($ListaRFC as $RFC){
                $sql=$sql."OR RFC_PERS = '$RFC[RFC_PERS]' ";
            }
            $sql=$sql.")";
        }
    }

    //print_r($sql);
    $result = mysqli_query($conn, $sql);

    // Obtener los resultados
    $ListaRFCFinal = [];
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($ListaRFCFinal, [
                "nombre" => $row['PERS_NOM'],
                "apellidoP" => $row['PERS_APP'],
                "apellidoM" => $row['PERS_APM'],
                "rfc" => $row['RFC_PERS'],
            ]);
        }
    } else {
        array_push($ListaRFCFinal, [
            "nombre" => "0 resultados",
        ]);
    }
    echo json_encode($ListaRFCFinal);
    //print_r($ListaRFCFinal);

    $conn->close();
?>
