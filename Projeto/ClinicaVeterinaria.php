<?php

class Humano {
    protected string $nome;
    protected int $idade;
    protected string $endereco;
    protected string $contato;

    function __construct(string $nome, int $idade, string $endereco, string $contato) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->endereco = $endereco;
        $this->contato = $contato;
    }

    function getNome(): string {
        return $this->nome;
    }

    function setNome(string $nome): void {
        $this->nome = $nome;
    }

    function getIdade(): int {
        return $this->idade;
    }

    function setIdade(int $idade): void {
        $this->idade = $idade;
    }

    function getEndereco(): string {
        return $this->endereco;
    }

    function setEndereco(string $endereco): void {
        $this->endereco = $endereco;
    }

    function getContato(): string {
        return $this->contato;
    }

    function setContato(string $contato): void {
        $this->contato = $contato;
    }
}

class Animal {
    protected string $nome;
    protected string $raca;
    protected int $qtdPatas;
    protected string $cor;
    protected float $peso;
    protected float $tamanho;
    protected Humano $dono;

    function __construct(string $nome, string $raca, int $qtdPatas, string $cor, float $peso, float $tamanho, Humano $dono) {
        $this->nome = $nome;
        $this->raca = $raca;
        $this->qtdPatas = $qtdPatas;
        $this->cor = $cor;
        $this->peso = $peso;
        $this->tamanho = $tamanho;
        $this->dono = $dono;
    }

    function getNome(): string {
        return $this->nome;
    }

    function setNome(string $nome): void {
        $this->nome = $nome;
    }

    function getRaca(): string {
        return $this->raca;
    }

    function setRaca(string $raca): void {
        $this->raca = $raca;
    }

    function getQtdPatas(): int {
        return $this->qtdPatas;
    }

    function setQtdPatas(int $qtdPatas): void {
        $this->qtdPatas = $qtdPatas;
    }

    function getCor(): string {
        return $this->cor;
    }

    function setCor(string $cor): void {
        $this->cor = $cor;
    }

    function getPeso(): float {
        return $this->peso;
    }

    function setPeso(float $peso): void {
        $this->peso = $peso;
    }

    function getTamanho(): float {
        return $this->tamanho;
    }

    function setTamanho(float $tamanho): void {
        $this->tamanho = $tamanho;
    }

    function getDono(): Humano {
        return $this->dono;
    }

    function setDono(Humano $dono): void {
        $this->dono = $dono;
    }

    function falar() {
        return "Som genérico";
    }
}

class Cachorro extends Animal {
    function falar() {
        return "Au Au";
    }
}

class Gato extends Animal {
    function falar() {
        return "Miau";
    }
}

class Grilo extends Animal {
    function falar() {
        return "Cri cri";
    }
}

class Funcionario extends Humano {
    protected float $salario;

    function __construct(string $nome, int $idade, string $endereco, string $contato, float $salario) {
        parent::__construct($nome, $idade, $endereco, $contato);
        $this->salario = $salario;
    }

    function getSalario(): float {
        return $this->salario;
    }

    function setSalario(float $salario): void {
        $this->salario = $salario;
    }
}

class Balconista extends Funcionario {
    function __construct(string $nome, int $idade, string $endereco, string $contato, float $salario) {
        parent::__construct($nome, $idade, $endereco, $contato, $salario);
    }
}

class Veterinario extends Funcionario {
    function __construct(string $nome, int $idade, string $endereco, string $contato, float $salario) {
        parent::__construct($nome, $idade, $endereco, $contato, $salario);
    }
}

class Vendedor extends Funcionario {
    function __construct(string $nome, int $idade, string $endereco, string $contato, float $salario) {
        parent::__construct($nome, $idade, $endereco, $contato, $salario);
    }
}

class Produto {
    private string $nome;
    private float $preco;

    function __construct(string $nome, float $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    function getNome(): string {
        return $this->nome;
    }

    function setNome(string $nome): void {
        $this->nome = $nome;
    }

    function getPreco(): float {
        return $this->preco;
    }

    function setPreco(float $preco): void {
        $this->preco = $preco;
    }
}

class Venda {
    private Humano $comprador;
    private array $produtos = [];

    function __construct(Humano $comprador) {
        $this->comprador = $comprador;
    }

    function getComprador(): Humano {
        return $this->comprador;
    }

    function setComprador(Humano $comprador): void {
        $this->comprador = $comprador;
    }

    function getProdutos(): array {
        return $this->produtos;
    }

    function adicionarProduto(Produto $produto): void {
        $this->produtos[] = $produto;
    }

    function calcularTotal(): float {
        $total = 0;
        foreach ($this->produtos as $produto) {
            $total += $produto->getPreco();
        }
        return $total;
    }
}

$dono = new Humano("João Silva", 35, "Rua das Flores, 123", "(99) 99999-9999");

$cachorro = new Cachorro("Rex", "Labrador", 4, "Amarelo", 30.0, 0.8, $dono);
$gato = new Gato("Mimi", "Persa", 4, "Branco", 5.0, 0.3, $dono);
$grilo = new Grilo("Chico", "Grilo", 2, "Verde", 0.01, 0.02, $dono);

$balconista = new Balconista("Maria", 28, "Rua das Árvores, 456", "(88) 98888-8888", 1500.0);
$veterinario = new Veterinario("Dr. Pedro", 40, "Avenida Central, 789", "(77) 97777-7777", 4500.0);
$vendedor = new Vendedor("Lucas", 22, "Praça dos Pinheiros, 101", "(66) 96666-6666", 2000.0);

$produto1 = new Produto("Ração", 50.0);
$produto2 = new Produto("Coleira", 30.0);
$produto3 = new Produto("Brinquedo", 20.0);

$venda = new Venda($dono);
$venda->adicionarProduto($produto1);
$venda->adicionarProduto($produto2);
$venda->adicionarProduto($produto3);

echo "Animal: " . $cachorro->getNome() . " - Fala: " . $cachorro->falar() . "\n";
echo "Animal: " . $gato->getNome() . " - Fala: " . $gato->falar() . "\n";
echo "Animal: " . $grilo->getNome() . " - Fala: " . $grilo->falar() . "\n";

echo "Comprador: " . $venda->getComprador()->getNome() . "\n";
echo "Produtos Comprados:\n";

foreach ($venda->getProdutos() as $produto) {
    echo "- " . $produto->getNome() . " - R$" . $produto->getPreco() . "\n";
}

echo "Total da Venda: R$" . $venda->calcularTotal() . "\n";