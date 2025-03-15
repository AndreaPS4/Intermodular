<?php include('bd.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    // Subir imagen
    $imagen = $_FILES['imagen']['name'];
    $target_dir = "img/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssds', $nombre, $descripcion, $precio, $imagen);
    $stmt->execute();

    echo "Producto agregado con éxito.";
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
        <form method="POST" action="agregarProducto.php" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre del producto" required>
            <textarea name="descripcion" placeholder="Descripción del producto"></textarea>
            <input type="number" name="precio" placeholder="Precio" step="0.01" required>
            <input type="file" name="imagen" required>
            <button type="submit">Agregar producto</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
</body>
</html> 