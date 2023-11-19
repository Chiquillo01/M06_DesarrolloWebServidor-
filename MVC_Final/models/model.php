<?php
//Llamada a la vista y a la bbdd
require_once("views/view.php");
require_once("views/alumnos.php");
require_once("views/cursos.php");
require_once("db/db.php");

class Model
{
    // Variables
    private $view;
    private $alu;
    private $cur;
    private $db;

    // Inicializamos
    public function constructor()
    {
        $this->view = new view();
        $this->cur = new cursos();
        $this->alu = new alumnos();
        $this->db = new database();
    }

    public function getDatabase()
    {
        return $this->db->conectarBD();
    }

    // Muestra el menu
    public function mostrarMenu()
    {
        $this->view->mostrarMenu();
    }

    // Muestra el menu de cursos
    public function menuCursos()
    {
        $this->cur->menuCursos();
    }

    // Muestra el menu de alumnos
    public function menuAlumnos()
    {
        $this->alu->menuAlumnos();
    }

    // Muestra los cursos
    public function mostrarCursos($query)
    {
        $this->cur->mostrarTablaCursos($query);
    }

    // Muestra los alumnos
    public function mostrarAlumnos($query)
    {
        $this->alu->mostrarTablaAlumnos($query);
    }

}
