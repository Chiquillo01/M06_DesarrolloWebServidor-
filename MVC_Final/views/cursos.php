<?php
class cursos
{
    // 
    public function menuCursos()
    {
        $html =
            '
        <style>
        /* CSS que hace referencia ha todas las páginas */
        body {
            font-size: "Times New Roman", Times, serif;
        
            padding: 0;
            margin: 0;
        
            background: linear-gradient(to bottom,
                    #a6bba5,
                    #fecea8,
                    #fd8c84,
                    #e75165,
                    #2f3a3f);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        /* CSS titulo */
        header {
            text-align: center;
        }

        .active {
            background-color: rgb(205, 196, 167);
            color: rgb(0, 0, 0);
            font-weight: bold;
        }
        
        h1 {
            background-color: rgb(0, 0, 0);
            padding: 10px;
            margin: 0;
            color: rgb(145, 163, 255);
        }
        
        /* CSS del cuerpo de la página*/
        .grid-container {
            height: auto;
            width: 900px;
        
            margin: 5px 0 0 200px;
        
            display: grid;
            grid-template-columns: auto auto;
        }
        
        .my-button {
            padding: 10px 20px;
        
            background-color: #4CAF50;
        
            color: white;
        
            border: none;
            border-radius: 5px;
        
            cursor: pointer;
        
            text-decoration: none;
            margin-left: 25%;
        }
        
        .my-button:hover {
            background-color: #45a049;
        }
        
        .my-button:active {
            background-color: #3e8e41;
        }
        </style>
        
        <body>

        <h1>CURSOS</h1>
        <div grid-container>
            <h3>Añade Cursos</h3>
            <form method="POST" action="index.php">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" required><br><br>
                <label for="ano">Año:</label>
                <input type="text" name="ano" id="ano" required><br><br>
                <input type="submit" value="enviar" name="agregarCurso">
            </form>
        </div>
        <br><br>
        <div grid-container>
            <h3>Muestra todos los cursos</h3>
            <form method="GET" action="index.php">
                <input type="submit" value="mostrar" name="mostrarCursos">
            </form>
        </div>
        <br><br>
        <div grid-container>
            <h3>Elimina un curso</h3>
            <form method="POST" action="index.php">
                <label for="nameE">Nombre del cuso a eliminar:</label><br>
                <input type="text" name="nameE" id="nameE" required><br><br>
                <input type="submit" value="eliminar" name="eliminarCursos">
            </form>
        </div>
        </body>
        
        </html>';

        echo $html;
    }

    // Función para mostrar los cursos
    public function mostrarTablaCursos($datos)
    {
        if (mysqli_num_rows($datos) > 0) {
            echo '<h1>Todos los cursos</h1>';
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Año</th>";
            echo "</tr>";
            // Bucle que se repite tantas veces como resultados haya
            while ($row = mysqli_fetch_array($datos)) {
                echo "<tr>";
                // Muestra los resultados
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['año'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Si no hay resultados, muestra que no hay resultados
            echo 'No hay datos';
        }

    }
}
