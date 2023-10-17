<?php
class alumnos
{
    // 
    public function menuAlumnos()
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
            
            <h1>ALUMNOS</h1>
            <div grid-container>
                <h3>Añade alumnos</h3>
                <form method="POST" action="index.php">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" required><br><br>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" required><br><br>
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" id="dni" maxlength="10" required><br><br>
                    <label for="dni">Curso:</label>
                    <input type="text" name="curso" id="curso" required><br><br>
                    <input type="submit" value="Enviar" name="agregarAlumno">
                </form>
            </div>
            <br><br>
            <div grid-container>
                <h3>Muestra todos los alumnos</h3>
                <form method="GET" action="index.php">
                    <input type="submit" value="mostrar" name="mostrarAlumnos">
                </form>
            </div>
        </body>
        
        </html>';

        echo $html;
    }

   // Función para mostrar los alumnos
    public function mostrarTablaAlumnos($datos)
    {
        if (mysqli_num_rows($datos) > 0) {
            echo '<h1>Todos los alumnos</h1>';
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>DNI</th>";
            echo "<th>Curso</th>";
            echo "</tr>";
            // Para sacar a todos los alumnos
            while ($row = mysqli_fetch_array($datos)) {
                echo "<tr>";
                // Muestra los resultados
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido'] . "</td>";
                echo "<td>" . $row['dni'] . "</td>";
                echo "<td>" . $row['curso'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo 'No hay datos';
        }
    }
}
