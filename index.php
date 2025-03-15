<!DOCTYPE html>
<html lang="en">
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const track = document.querySelector(".carousel-track");
            const prevBtn = document.querySelector(".prev");
            const nextBtn = document.querySelector(".next");
            let index = 0;
            const totalItems = track.children.length;
            const visibleItems = 3;
            
            function moveCarousel(direction) {
                if (direction === "next") {
                    index = (index + 1) % Math.max(totalItems - visibleItems + 1, 1);
                } else {
                    index = (index - 1 + Math.max(totalItems - visibleItems + 1, 1)) % Math.max(totalItems - visibleItems + 1, 1);
                }
                track.style.transform = `translateX(-${index * (100 / visibleItems)}%)`;
            }

            nextBtn.addEventListener("click", () => moveCarousel("next"));
            prevBtn.addEventListener("click", () => moveCarousel("prev"));
        });
    </script>
</body>
</html>