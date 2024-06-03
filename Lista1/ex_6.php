<?php

class Contador {
    private $contador = 0;

    public function __construct($contador) {
        $this->contador = $contador;
    }

    function getContador() {
        return $this->contador;
    }
    function zerarContador() {
        $this->contador = 0;
    }

    function incrementarContador() {
        $this->contador++;
    }

}

$contador = new Contador(0);

echo "Início do Contador: " . $contador->getContador() . "\n";

$contador->incrementarContador();
echo "Contador incrementado: " . $contador->getContador() . "\n";

$contador->zerarContador();
echo "Contador zerado: " . $contador->getContador() . "\n";
