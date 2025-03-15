<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_chimichurri";
$conn = new mysqli($servername, $username,
$password, $dbname);
if ($conn->connect_error) {
 die("Conexión fallida: " .
$conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $nombre = $_POST['nombre'];
 $apellidos = $_POST['apellidos'];
 $usuario = $_POST['nUsuario'];
 $email = $_POST['email'];
 $newsletter = $_POST['newsletter'];
 $contrasenya = $_POST['contrasenya'];

 $contrasenyaHash = password_hash($contrasenya, PASSWORD_BCRYPT);

 $sql = "INSERT INTO usuarios (nombre, apellidos, nUsuario, email, newsletter, contrasenya) VALUES ('$nombre',
'$apellidos', '$usuario', '$email', '$newsletter', '$contrasenyaHash')";
 if ($conn->query($sql) === TRUE) {
 echo "Nuevo registro creado con éxito";
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }
 $conn->close();
}
?>