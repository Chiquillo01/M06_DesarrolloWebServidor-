<?php
// llama a los controladores
require_once("controllers/cursos.php");
require_once("controllers/alumnos.php");

// crear variables con las estructuras especificas de cada uno
$cursos = new cursos();
$alumnos = new alumnos();

if (isset($_POST['agregarCurso'])) {
    $cursos->agregarCursos();
} elseif (isset($_GET['verCursos'])) {
    $cursos->mostrarCursos();
} elseif (isset($_POST['agregarAlumno'])) {
    $alumnos->agregarAlumnos();
} elseif (isset($_GET['verAlumnos'])) {
    $alumnos->mostrarAlumnos();
} elseif (isset($_POST['eliminarCursos'])) {
    $cursos->eliminarCursos();

    // por defecto
} else {
    $cursos->mostrarMenu();
}
