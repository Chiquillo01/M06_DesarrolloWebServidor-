<?php
class view
{
    // Menú de la página y HTML principal
    public function mostrarMenu()
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
            
            /* CSS del menu de navegación */
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: rgb(58, 58, 58);
            }
            
            li {
                float: left;
            }
            
            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            
            li a:hover:not(.active) {
                background-color: rgb(0, 0, 0);
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

            /* CSS de los botones */
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
            <!-- Menu de todas las páginas -->
            <header>
                <h1>Menu Principal</h1>
                <nav>
                    <ul>
                        <li><a class="active" href="menu.php">Inicio</a></li>
                    </ul>
                </nav>
            </header>
        
            <br>

            <div class="grid-container">
                <div><a href="alumnos.php" class="my-button">Opciones de alumnos</a></div>
                <div><a href="cursos.php" class="my-button">Opciones de cursos</a></div>
            </div>
        </body>
        
        </html>';

        echo $html;
    }

}
