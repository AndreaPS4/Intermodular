<?php include("bd.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimichurri Cómics</title>
    <link rel="stylesheet" href="css/informe.css">
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
    <?php
        // Consulta SQL
        $sql = "SELECT * FROM cantidadproductos";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Cantidad de Productos en la Base de Datos</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Cantidad de Productos</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["Mangas"] . "</td>
                        <td>" . $row["numero_productos"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM cantidadproductosordenado";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Cantidad de Productos en la Base de Datos (Ordenado)</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Cantidad de Productos</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["numero_productos"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM mediaprecio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Precio Promedio por Categoría</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Precio promedio</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["precio_promedio"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM preciomin20";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Precio Mínimo Superior a 20 euros</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["precio"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM preciopromedio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Precio Promedio por Producto</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Número de Productos</th>
                        <th>Precio promedio</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["Mangas"] . "</td>
                        <td>" . $row["numero_productos"] . "</td>
                        <td>" . $row["precio_promedio"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM preciosuperior";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Categorías con unu precio medio superior a 20 euros</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Número de Productos</th>
                        <th>Precio promedio</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["numero_productos"] . "</td>
                        <td>" . $row["precio_promedio"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM productomascaro";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Producto Más Caro por Categoría</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Producto Más Caro</th>
                        <th>Precio</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["producto_mas_caro"] . "</td>
                        <td>" . $row["precio"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
        $sql = "SELECT * FROM sumaprecio";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h3>Suma del Precio de los Productos</h3>
                <table border='1'>
                    <tr>
                        <th>Categoría</th>
                        <th>Suma de los Precios</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["suma_precios"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No hay datos en la vista.";
        }
    ?>
    <footer>
        <p>&copy; 2025 Chimichurri Comics. Todos los derechos reservados.</p>
    </footer>
    </body>
</html>