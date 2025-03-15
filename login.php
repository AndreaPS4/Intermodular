<?php
session_start();
include('bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoTrab = $_POST['codigoTrab'];
    $contrasenya = $_POST['contrasenya'];

    $sql = "SELECT * FROM trabajadores WHERE codigoTrab = ? AND contrasenya = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $codigoTrab, $contrasenya);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
            $_SESSION['codigoTrab'] = $codigoTrab;
            header("Location: panelControl.php");
            exit();
    } else {
        echo "Código o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimichurri Cómics</title>
    <link rel="stylesheet" href="css/registrar.css">
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem("modoOscuro", "activado");
            } else {
                localStorage.setItem("modoOscuro", "desactivado");
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
            if (localStorage.getItem("modoOscuro") === "activado") {
                document.body.classList.add("dark-mode");
            }
        });
    </script>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="img/logo.png" class="icono" alt="Logo de Chimichurri Cómics">
                <img src="img/eslogan.png" class="eslogan" alt="Eslogan Chimichurri Cómics">
            </div>
            <div class="search-container">
                <form action="resultados.php" method="GET">
                    <input type="text" class="search-box" name="query" placeholder="Buscar..." id="searchInput" required>
                    <button type="submit" class="search-button"></button>
                </form>    
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Novedades</a></li>
                    <li><a href="#">Próximamente</a></li>
                    <li><a href="catalogo.php">Catálogo</a></li>
                    <li><a href="registrarse.php">Regístrate</a></li>
                    <li><a href="login.php">Inicia Sesión</a></li>
                    <li><a href="carrito.html">Carrito</a></li>
                </ul>
            </nav>
        </div>
        <button class="modo-oscuro" onclick="toggleDarkMode()">Modo Oscuro</button>
    </header>
    <main>
        <h2>Inicia Sesión</h2>
        <h4>¿No tienes cuenta? <a href="registrarse.php">Regístrate</a></h4>
        <form method="POST" action="login.php">
            <label for="codigoTrab">Código de Trabajador:*</label>
            <input type="text" name="codigoTrab" placeholder="Código de Trabajador" required>
            <label for="nombre">Contraseña:*</label>
            <input type="password" name="contrasenya" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesión</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
    </body>
</html>