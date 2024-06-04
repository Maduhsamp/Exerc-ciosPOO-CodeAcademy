<?php

class Objeto {
    protected float $largura;
    protected float $altura;

    function __construct(float $largura, float $altura) {
        $this->largura = $largura;
        $this->altura = $altura;
    }

    function getLargura(): float {
        return $this->largura;
    }

    function setLargura(float $largura): void {
        $this->largura = $largura;
    }

    function getAltura(): float {
        return $this->altura;
    }

    function setAltura(float $altura): void {
        $this->altura = $altura;
    }

    function calcularArea(): float {
        return 0;
    }
}

class Triangulo extends Objeto {
    private string $tipo;

    function __construct(float $largura, float $altura, string $tipo) {
        parent::__construct($largura, $altura);
        $this->tipo = $tipo;
    }

    function getTipo(): string {
        return $this->tipo;
    }

    function setTipo(string $tipo): void {
        $this->tipo = $tipo;
    }

    function calcularArea(): float {
        return ($this->largura * $this->altura) / 2;
    }
}

class Retangulo extends Objeto {

    function __construct(float $largura, float $altura) {
        parent::__construct($largura, $altura);
    }

    function calcularArea(): float {
        return $this->largura * $this->altura;
    }

    function ehQuadrado(): bool {
        return $this->largura === $this->altura;
    }
}

$triangulo = new Triangulo(5, 10, 'Isósceles');
echo "Área do Triângulo: " . $triangulo->calcularArea() . "\n";

$retangulo = new Retangulo(4, 4);
echo "Área do Retângulo: " . $retangulo->calcularArea() . "\n";
echo "É quadrado? " . ($retangulo->ehQuadrado() ? 'Sim' : 'Não') . "\n";