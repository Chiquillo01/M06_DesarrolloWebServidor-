<?php
// Llamada al modelo
require_once('models/model.php');

class cursos {
    private $model;
    private $con;

    public function __construct() {
        $this->model = new Model();
        $this->con = $this->model->getDatabase();
    }

    // Muestra el formulario correspondiente
    public function menuCursos() {
        $this->model->menuCursos();
    }

    // Función para agregar los cursos a la bd
    public function agregarCursos() {
        // Selecciona los campos del formulario
        $nombre = $_POST['name'];
        $year = $_POST['year'];
    }

    // Función para comprobar si un curso ya ha sido creado
    public function comprobarCurso($curso) {

        // Cuenta los rows que existen con el mismo nombre que se le pasa por parametro
        $sql = 'SELECT COUNT(*) FROM cursos WHERE nombre = ' . $curso . '';
        $rows = mysqli_query($this->con, $sql);
        $row = mysqli_fetch_assoc($rows);

        // Retorna las filas contadas
         return $row['COUNT(*)'];
    }

    // Función para mostrar los cursos
    public function mostrarCursos() {
        // Hace un select de todos los cursos para mostrarlos
        $sql = 'SELECT * FROM cursos';
        $query = mysqli_query($this->con, $sql);

        // Y las pasa al modelo para mostrarlos
        $this->model->mostrarCursos($query);
    }

    // Función para eliminar los cursos
    public function eliminarCursos() {

        $nombre = $_POST['nameDelete'];

        // Comprueba si el curso existe
        $existe = $this->comprobarCurso($nombre);
        if ($existe != 0) {
            // Elimina los alumnos
            $sql = 'DELETE FROM alumnos WHERE curso = "' . $nombre .'"';
            $query1 = mysqli_query($this->con, $sql);

            // Elimina el curso
            $sql = 'DELETE FROM cursos WHERE nombre = "' . $nombre .'"';
            $query2 = mysqli_query($this->con, $sql);

        }
    }
}
