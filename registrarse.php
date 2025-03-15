<?php include("bd.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimichurri Cómics</title>
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
        <h2>Regístrate</h2>
        <h4>¿Ya estás registrado? <a href="login.php">Inicia Sesión</a></h4>
        <form id="purchase-form" action="registrar.php" method="post">
            <label for="nombre">Nombre:*</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellidos">Apellidos:*</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="usuario">Nombre de Usuario:*</label>
            <input type="text" id="nUsuario" name="nUsuario" required>

            <label for="email">Correo Electrónico:*</label>
            <input type="email" id="email" name="email" required>

            <label for="contrasenya">Contraseña:*</label>
            <input type="password" id="contrasenya" name="contrasenya" required>

            <label for="newsletter">¿Desea recibir noticias?</label>
            <label><input type="radio" name="newsletter" value="true" required>Sí</label>
            <label><input type="radio" name="newsletter" value="false" required>No</label>

            <button type="submit">Registrarse</button>
            <button type="button" onclick="location.href='index.php'">Cancelar</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
</body>
</html>