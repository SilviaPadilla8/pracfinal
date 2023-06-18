<!DOCTYPE html>
<html>
<head>
    <title>Consulta</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión a la base de datos fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$apellido1 = $_POST["apellido1"];
$apellido2 = $_POST["apellido2"];
$email = $_POST["email"];
$login = $_POST["login"];
$password = $_POST["password"];

// Validación de datos
// Validar el formato de correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El formato de correo electrónico no es válido.";
    exit;
}

// Validar la longitud de la contraseña
if (strlen($password) < 4 || strlen($password) > 8) {
    echo "La contraseña debe tener entre 4 y 8 caracteres.";
    exit;
}

// Verificar si el correo electrónico ya está registrado en la base de datos
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "El correo electrónico ya está registrado.";
    echo "<div class='c'>";
    echo "<form method='POST' action='formulario_registro.html'>";
    echo "<input type='submit' id='btn-c' value='Volver al formulario de registro'>";
    echo "</form>";
    echo "</div>";
    exit;
}

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido1, apellido2, email, login, password) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Registro completado con éxito.<br>";
} else {
    echo "Error al insertar el registro: " . $conn->error;
}

echo "<div class='c'>";
echo "<form method='POST' action='consultar_usuario.php'>";
echo "<input type='submit' value='Consulta los usuarios registrados'>";
echo "<form method='POST' action='formulario_registro.html'>";
echo "<input type='submit' id='btn-c' value='Volver al formulario de registro'>";
echo "</form>";
echo "</div>";


$conn->close();
?>

</body>
</html>