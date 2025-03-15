<?php
include("bd.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Producto no especificado.");
}

$id = intval($_GET['id']); 

$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Producto no encontrado.");
}

$producto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $producto['nombre']; ?> - Chimichurri Cómics</title>
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
        <div class="producto">
            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
            <div class="info">
                <h1><?php echo $producto['nombre']; ?></h1>
                <p><?php echo $producto['descripcion']; ?></p>
                <p><strong>Precio:</strong> <?php echo number_format($producto['precio'], 2); ?>€</p>
                <button class="add-to-cart" onclick="agregarAlCarrito()">Agregar al carrito</button>
            </div>    
        </div>
    </main>
    <script>
        function agregarAlCarrito() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push({
                title: "<?php echo $producto['nombre']; ?>",
                price: "<?php echo number_format($producto['precio'], 2); ?>€",
                imgSrc: "<?php echo $producto['imagen']; ?>"
            });
            localStorage.setItem("cart", JSON.stringify(cart));
            alert("Producto agregado al carrito");
        }
    </script>
</body>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
</html>