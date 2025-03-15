<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimichurri Cómics</title>
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
    </header>
    <main>
        <section class="hero">
            <h1>Bienvenidos a Chimichurri Cómics</h1>
            <p>Échandole picante a tus aventuras desde 2025</p>
        </section>
        <section class="novedades">
            <h2>Novedades</h2>
            <div class="carousel-container">
                <button class="carousel-btn prev">❮</button>
                <div class="carousel">
                    <div class="carousel-track">
                    <?php
                            // Consulta SQL
                            $sql = "SELECT imagen, nombre, precio FROM productos ORDER BY id DESC LIMIT 8";
                            $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="libro">';
                            echo '<img src="' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
                            echo '<h3>' . $row["nombre"] . '</h3>';
                            echo '<p>' . number_format($row["precio"], 2) . '€</p>';
                            echo '<button class="add-to-cart" onclick="window.location.href=\'carrito.html\'">Agregar al carrito</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No hay productos disponibles.</p>";
                    }
            ?>
        </div>
    </div>
    <button class="carousel-btn next">❯</button>
                    </div>
                </div>
                <button class="carousel-btn next">❯</button>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
</body>
</html>