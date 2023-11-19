<?php
// Llama al modelo y al controlador de cursos
require_once('models/model.php');
require_once('cursos.php');

class alumnos
{
    private $model;
    private $con;
    private $curso_controller;

    // Inicializa las variables/clases que se usarán más adelante
    public function __construct()
    {
        $this->model = new Model();
        $this->curso_controller = new cursos();
        $this->con = $this->model->getDatabase();
    }

    // Muestra el formulario correspondiente
    public function menuAlumnos()
    {
        $this->model->menuAlumnos();
    }

    // Funcion que agrega los alumnos
    public function agregarAlumnos()
    {
        // Selecciona los campos del formulario
        $nombre = $_POST['name'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $curso = $_POST['curso'];

        // Comprueba si esta el curso introducido
        $existe = $this->curso_controller->comprobarCurso($curso);

        // Si es verdadero
        if ($existe != 0) {

            // Hace el insert
            $sql = 'INSERT INTO alumnos VALUES ("' . $nombre . '", "' . $apellido . '", "' . $dni . '","' . $curso . '")';
            $query = mysqli_query($this->con, $sql);
        }
    }

    // Función para mostrar los alumnos
    public function mostrarAlumnos()
    {

        $sql = 'SELECT * FROM alumnos';
        $query = mysqli_query($this->con, $sql);
        $this->model->mostrarAlumnos($query);
    }
}
