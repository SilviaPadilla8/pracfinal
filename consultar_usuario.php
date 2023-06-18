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

// Consulta los usuarios registrados
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Usuarios Registrados</h2>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th><th>Login</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido1"] . "</td>";
        echo "<td>" . $row["apellido2"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["login"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron usuarios registrados.";
}

$conn->close();

echo "<div class='c'>";
echo "<form method='POST' action='formulario_registro.html'>";
echo "<input type='submit' id='btn-c' value='Volver al formulario de registro'>";
echo "</form>";
echo "</div>";

?>

</body>
</html>