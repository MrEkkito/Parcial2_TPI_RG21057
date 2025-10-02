<?php
namespace app\models;

class Credito {
    public $capital;
    public $tasa_anual;
    public $plazo;

    public function __construct($capital, $tasa_anual, $plazo) {
        $this->capital = $capital;
        $this->tasa_anual = $tasa_anual;
        $this->plazo = $plazo;
    }

    public function calcularCuota() {
        $i = ($this->tasa_anual / 100) / 12;
        $n = $this->plazo;
        $P = $this->capital;

        $cuota = $P * ($i * pow(1 + $i, $n)) / (pow(1 + $i, $n) - 1);
        return round($cuota, 2);
    }

    public function generarAmortizacion() {
        $cuota = $this->calcularCuota();
        $i = ($this->tasa_anual / 100) / 12;
        $n = $this->plazo;
        $saldo = $this->capital;

        $tabla = [];

        for ($mes = 1; $mes <= $n; $mes++) {
            $interes = $saldo * $i;
            $capital_abonado = $cuota - $interes;
            $saldo -= $capital_abonado;

            $tabla[] = [
                'mes' => $mes,
                'cuota' => round($cuota, 2),
                'interes' => round($interes, 2),
                'capital' => round($capital_abonado, 2),
                'saldo' => round(max($saldo, 0), 2)
            ];
        }

        return $tabla;
    }
}
