<?php
session_start(); 
include 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tu clave secreta de reCAPTCHA
    $secret = '6LexXfIpAAAAABZJ0eZCcki3Cc4Hw5uLuZNrtYHb';
    // La respuesta del reCAPTCHA desde el formulario
    $response = $_POST['g-recaptcha-response'];
    // La IP del usuario
    $remoteip = $_SERVER['REMOTE_ADDR'];

    // Envía la solicitud a la API de reCAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $secret,
        'response' => $response,
        'remoteip' => $remoteip
    );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $resultJson = json_decode($result);

    if ($resultJson->success) {
        // reCAPTCHA fue verificado exitosamente
        if (empty($_POST['user']) || empty($_POST['passw'])) {
            echo json_encode(["status" => "error", "message" => "Se detectaron campos vacíos"]);
            exit;
        }

        $user = $_POST['user'];
        $passw = $_POST['passw'];

        $stmt = $conn->prepare("SELECT CUENTA_TIPO, CUENTA_USUARIO FROM cuenta WHERE CUENTA_USUARIO = ? AND CUENTA_PASSWORD = ?");
        $stmt->bind_param("ss", $user, $passw);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tipo = $row['CUENTA_TIPO'];

            $nombre_usuario = $row['CUENTA_USUARIO']; // Obtener el nombre de usuario

            // Guardar el nombre de usuario en la sesión
            $_SESSION['nombre_usuario'] = $nombre_usuario;

            if ($tipo == 'ADMINISTRADOR') {
                echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso", "role" => "ADMINISTRADOR"]);
            } elseif ($tipo == 'PERSONAL') {
                echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso", "role" => "PERSONAL"]);
            } elseif ($tipo == 'ALUMNO') {
                echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso", "role" => "ALUMNO"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Tipo de usuario no reconocido"]);
            }

            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Usuario o contraseña incorrectos"]);
        }

        $conn->close();
    } else {
        // reCAPTCHA no fue verificado
        echo json_encode(["status" => "error", "message" => "Por favor complete el CAPTCHA correctamente."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método de solicitud no válido"]);
}
?>
