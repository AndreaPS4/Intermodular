<?php include("bd.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de búsqueda</title>
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
                    <li><a href="index.php">Incio</a></li>
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
        <section class="resultados">
            <h2>Productos encontrados</h2>
            <div class="productos">
                <?php
                if (isset($_GET['query'])) {
                    $query = trim($_GET['query']);
                    if (!empty($query)) {
                        $query = $conn->real_escape_string($query);

                        $sql = "SELECT imagen, nombre, precio FROM productos WHERE nombre LIKE '%$query%'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="producto">';
                                echo '<img src="' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
                                echo '<h3>' . $row["nombre"] . '</h3>';
                                echo '<p>' . number_format($row["precio"], 2) . '€</p>';
                                echo '<button class="add-to-cart" onclick="window.location.href=\'carrito.html\'">Agregar al carrito</button>';
                                echo '</div>';
                            }
                        } else {
                            echo "<p>No se encontraron productos.</p>";
                        }
                    } else {
                        echo "<p>No ingresaste ninguna búsqueda.</p>";
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Función para agregar un producto al carrito
        function addToCart(title, price, imgSrc) {
            let cart = JSON.parse(localStorage.getItem("cart")) || []; // Obtener carrito actual

            // Agregar nuevo producto
            cart.push({ title, price, imgSrc });
            localStorage.setItem("cart", JSON.stringify(cart));

            alert("Producto agregado al carrito");
        }

        document.querySelectorAll(".add-to-cart").forEach(button => {
            button.addEventListener("click", function () {
                const libro = this.closest(".libro");
                const title = libro.querySelector("h3").innerText;
                const price = libro.querySelector("p").innerText;
                const imgSrc = libro.querySelector("img").src;

                addToCart(title, price, imgSrc);
            });
        });
        });
    </script>
</body>
</html>
