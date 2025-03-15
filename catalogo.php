<?php include("bd.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimichurri Cómics</title>
    <link rel="stylesheet" href="css/catalogo.css">
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
            <div id=results></div>
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
        <nav class="sidebar">
        <ul>
            <li><a href="catalogo.php?categoria=todos">Todos</a></li>
            <li><a href="catalogo.php?categoria=mangas">Mangas</a></li>
            <li><a href="catalogo.php?categoria=juegos">Juegos de Mesa</a></li>
            <li><a href="catalogo.php?categoria=comics">Cómics</a></li>
            <li><a href="catalogo.php?categoria=libros">Libros</a></li>
            <li><a href="catalogo.php?categoria=videojuegos">Videojuegos</a></li>
            <li><a href="catalogo.php?categoria=chimichurri">Chimichurri</a></li>
        </ul>
    </nav>
        <div class="libros">
        <?php
            $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';

            if ($categoria === 'mangas') {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        INNER JOIN mangas ON productos.id = mangas.id
                        ORDER BY productos.nombre";
            } elseif ($categoria === 'juegos') {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        INNER JOIN juegos_mesa ON productos.id = juegos_mesa.id
                        ORDER BY productos.nombre";
            } elseif ($categoria === 'comics') {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        INNER JOIN comics ON productos.id = comics.id
                        ORDER BY productos.nombre";
            } elseif ($categoria === 'libros') {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        INNER JOIN libros ON productos.id = libros.id
                        ORDER BY productos.nombre";
            } elseif ($categoria === 'videojuegos') {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        INNER JOIN videojuegos ON productos.id = videojuegos.id
                        ORDER BY productos.nombre"; 
            } elseif ($categoria === 'chimichurri') {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        INNER JOIN chimichurri ON productos.id = chimichurri.id
                        ORDER BY productos.nombre";                                   
            } else {
                $sql = "SELECT productos.id, productos.nombre, productos.imagen, productos.precio 
                        FROM productos 
                        ORDER BY productos.nombre";
            }             
            $result = $conn->query($sql);
            if (!$result) {
                die("Error en la consulta: " . $conn->error);
            }
            ?>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="libro">';
                    echo '<a href="producto.php?id=' .$row["id"] . '">';
                    echo '<img src="' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
                    echo '<h3>' . $row["nombre"] . '</h3>';
                    echo '</a>';
                    echo '<p>' . number_format($row["precio"], 2) . '€</p>';
                    echo '<button class="add-to-cart" onclick="window.location.href=\'carrito.html\'">Agregar al carrito</button>';
                    echo '</div>';
                    }   
            } else {
                echo "<p>No hay productos disponibles.</p>";
                    }         
        ?>
        </div>    
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