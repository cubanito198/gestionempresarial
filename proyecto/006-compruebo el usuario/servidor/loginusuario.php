<?php
header('Content-Type: application/json');

// Leer el JSON de la entrada
$data = json_decode(file_get_contents('php://input'), true);

// Comprobar si las claves 'usuario' y 'contrasena' existen en el array
if (isset($data['usuario']) && isset($data['contrasena'])) {
    $usuario = $data['usuario'];
    $contrasena = $data['contrasena'];
    
    // Aquí puedes agregar la lógica para validar el usuario y la contraseña, por ejemplo, consultando la base de datos.

    // Respuesta en JSON (por ejemplo, éxito)
    echo json_encode(["resultado" => "ok"]);
} else {
    // Respuesta en JSON en caso de error
    echo json_encode(["resultado" => "ko"]);
}
?>



