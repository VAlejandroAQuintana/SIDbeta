<?php
include 'db_conexion.php';

/* INFRAESTRUCTURA */
$CUENTA_USUARIO = $_POST['usuario'];
$CUENTA_PASSWORD = $_POST['password'];
$CUENTA_TIPO = $_POST['tipo'];

$sql = "INSERT INTO cuenta (CUENTA_USUARIO, CUENTA_PASSWORD, CUENTA_TIPO) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $CUENTA_USUARIO, $CUENTA_PASSWORD, $CUENTA_TIPO);

if ($stmt->execute()) {
    echo "Datos guardados exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();

$conn->close();

?>