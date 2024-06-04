<?php 

class Funcionario {
    private int $id;
    private string $nome;
    private string $cargo;
    private float $salario;

    function __construct(int $id, string $nome, string $cargo, float $salario) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getCargo() {
        return $this->cargo;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function getSalario() {
        return $this->salario;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function calculaSalario() {
        return $this->salario;
    }
}

class Gerente extends Funcionario {
    private int $quantidadeDeColaboradores;
    private float $bonus;

    function __construct(int $id, string $nome, string $cargo, float $salario, int $quantidadeDeColaboradores, float $bonus) {
        parent::__construct($id, $nome, $cargo, $salario);
        $this->quantidadeDeColaboradores = $quantidadeDeColaboradores;
        $this->bonus = $bonus;
    }

    function getQtdColaboradores() {
        return $this->quantidadeDeColaboradores;
    }

    function setQtdColaboradores($quantidadeDeColaboradores) {
        $this->quantidadeDeColaboradores = $quantidadeDeColaboradores;
    }

    function getBonus() {
        return $this->bonus;
    }

    function setBonus($bonus) {
        $this->bonus = $bonus;
    }

    function calculaSalario() {
        return parent::getSalario() + $this->bonus;
    }
}

$funcionario1 = new Funcionario(1, "Maria", "Dev Front-end", 3500.00);
$funcionario2 = new Funcionario(2, "Matheus", "Enfermeiro", 2300.00);

$gerente1 = new Gerente(3, "João", "Gerente Comercial", 5700.00, 264, 1200.00);
$gerente2 = new Gerente(4, "Ana", "Gerente Administrativo", 3900.00, 180, 2000.00);

echo "Funcionário(a) " . $funcionario1->getNome() . " ganha " . $funcionario1->calculaSalario() . "\n";
echo "Gerente " . $gerente1->getNome() . " ganha " . $gerente1->calculaSalario() . "\n";
