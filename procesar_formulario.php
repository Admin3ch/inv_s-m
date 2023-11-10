<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Conecta a la base de datos (debes configurar la conexión a tu base de datos)
    $conexion = new mysqli("host", "usuario", "contraseña", "nombre_de_la_base_de_datos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Prepara y ejecuta una consulta SQL para insertar el proveedor
    $sql = "INSERT INTO proveedores (nombre, direccion, telefono, email) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $direccion, $telefono, $email);

    if ($stmt->execute()) {
        echo "Proveedor agregado exitosamente.";
    } else {
        echo "Error al agregar el proveedor: " . $stmt->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
}
?>
