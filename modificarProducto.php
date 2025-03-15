<?php
include('bd.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?";

    if (!empty($_FILES['imagen']['name'])) {
        $imagen = $_FILES['imagen']['name'];
        $target_dir = "img/"; 
        $target_file = $target_dir . basename($imagen);
        
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
            $sql .= ", imagen = ?";
        } else {
            echo "Hubo un error al cargar la imagen.";
            exit();
        }
    }


    $sql .= " WHERE nombre = ?";

    $stmt = $conn->prepare($sql);
    if (!empty($_FILES['imagen']['name'])) {
        $stmt->bind_param('ssdss', $nombre, $descripcion, $precio, $imagen, $nombre); 
    } else {
        $stmt->bind_param('ssds', $nombre, $descripcion, $precio, $nombre);
    }    
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Producto modificado con éxito.";
    } else {
        echo "No se modificó ningún producto.";
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
        <form method="POST" action="modificarProducto.php" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre del producto" required>
            <textarea name="descripcion" placeholder="Descripción del producto"></textarea>
            <input type="number" name="precio" placeholder="Precio" step="0.01" required>
            <input type="file" name="imagen">
            <button type="submit">Modificar producto</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
