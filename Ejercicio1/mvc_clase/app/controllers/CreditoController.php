<?php
require_once "models/CreditoModel.php";

class CreditoController {

    public function formulario() {
        require "views/FormularioView.php";
    }

    public function simular() {
        $nombre = $_POST['nombre'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $dui = $_POST['dui'] ?? '';
        $capital = $_POST['capital'] ?? '';
        $tasa = $_POST['tasa'] ?? '';
        $plazo = $_POST['plazo'] ?? '';

        $errores = [];

        // Validaciones
        if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
            $errores[] = "Nombre inválido.";
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Correo inválido.";
        }

        if (!preg_match("/^\d{8}-\d$/", $dui)) {
            $errores[] = "DUI inválido. Formato esperado: ########-#";
        }

        if (!is_numeric($capital) || $capital <= 0) {
            $errores[] = "Capital inválido.";
        }

        if (!is_numeric($tasa) || $tasa <= 0) {
            $errores[] = "Tasa inválida.";
        }

        if (!is_numeric($plazo) || $plazo <= 0) {
            $errores[] = "Plazo inválido.";
        }

        if (!empty($errores)) {
            require "views/error.php";
            return;
        }

        $credito = new Credito($capital, $tasa, $plazo);
        $cuota = $credito->calcularCuota();
        $tabla = $credito->generarAmortizacion();

        require "views/resultado.php";
    }
}
