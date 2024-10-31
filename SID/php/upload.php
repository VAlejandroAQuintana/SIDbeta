<?php
// Directorio donde se guardarán los archivos subidos
$targetDir = "../documentos/"; 

// Crear el directorio si no existe
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfFile"])) {
    $fileName = basename($_FILES["pdfFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Verificar si el archivo es un PDF
    if ($fileType == "pdf") {
        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFilePath))
        {
            // Guardar la ruta del archivo en una variable
            $fileUrl = realpath($targetFilePath);
            echo "El archivo ha sido subido exitosamente. Ruta: " . $fileUrl;
        } else {
            echo "Hubo un error subiendo el archivo.";
        }
    } else {
        echo "Solo se permiten archivos PDF.";
    }
} else {
    echo "No se ha subido ningún archivo.";
}
?>