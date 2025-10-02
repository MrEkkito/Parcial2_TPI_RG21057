<?php
namespace app\controllers;

require_once __DIR__ . "/../models/DatosModel.php";
use app\models\DatosModel;

class DatosController {
    private $model;

    public function __construct() {
        $this->model = new DatosModel();
    }

        public function index() {
    // Verificar si se envió el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $this->model->insert($nombre, $email);
        // Redirigir para evitar reenvío de formulario
        header("Location: /mvc_clase/public/Datos");
        exit;
    }

    $estudiantes = $this->model->getAll();
    return $this->view('DatosView', [
        'title' => 'Estudiantes',
        'estudiantes' => $estudiantes
    ]);
    }

    public function delete($id) {
    $this->model->delete($id);
    // Redirigir para actualizar la lista
    header("Location: /mvc_clase/public/Datos");
    exit;
}


    public function view($vista, $data = []) {
        extract($data);
        if(file_exists("../app/views/$vista.php")) {
            ob_start();
            include "../app/views/$vista.php";
            return ob_get_clean();
        } else {
            echo "Vista no encontrada: $vista";
        }
    }

}
