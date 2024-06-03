<?php

class Produto {
    private string $nome;
    private float $preco;
    private int $qtdEstoque;

    public function __construct(string $nome, float $preco, int $qtdEstoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->qtdEstoque = $qtdEstoque;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function getQtdEstoque(): int {
        return $this->qtdEstoque;
    }

    public function reduzirEstoque(int $quantidade): bool {
        if ($this->qtdEstoque >= $quantidade) {
            $this->qtdEstoque -= $quantidade;
            return true;
        }
        return false;
    }

    public function exibirProduto(): string {
        return "{$this->nome} - R$" . number_format($this->preco, 2, ',', '.') . " - Estoque: {$this->qtdEstoque}";
    }
}

class Pedido {
    private array $itens = [];

    public function adicionarProduto(Produto $produto, int $quantidade): bool {
        if ($produto->reduzirEstoque($quantidade)) {
            $this->itens[] = ['produto' => $produto, 'quantidade' => $quantidade];
            return true;
        }
        return false;
    }

    public function getItens(): array {
        return $this->itens;
    }

    public function calcularTotal(): float {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item['produto']->getPreco() * $item['quantidade'];
        }
        return $total;
    }

    public function exibirPedido(): string {
        $output = "Itens no Pedido:\n";
        foreach ($this->itens as $item) {
            $output .= "{$item['produto']->getNome()} - Quantidade: {$item['quantidade']}\n";
        }
        $output .= "Total: R$" . number_format($this->calcularTotal(), 2, ',', '.');
        return $output;
    }
}

class Pagamento {
    private string $formaPagamento;

    public function __construct(string $formaPagamento) {
        $this->formaPagamento = $formaPagamento;
    }

    public function getFormaPagamento(): string {
        return $this->formaPagamento;
    }

    public function setFormaPagamento(string $formaPagamento): void {
        $this->formaPagamento = $formaPagamento;
    }
}

function limparTerminal() {
    if (stripos(PHP_OS, 'WIN') === 0) {
        system('cls');
    } else {
        system('clear');
    }
}

$produtos = [
    1 => new Produto("Arroz", 7.00, 100),
    2 => new Produto("Sabonete", 2.75, 200),
    3 => new Produto("Saco de Lixo", 8.90, 50),
    4 => new Produto("Alcatra", 35.00, 30),
    5 => new Produto("Vinho", 44.00, 20),
    6 => new Produto("Gelo", 7.00, 100),
    7 => new Produto("Ração para Cachorro", 21.50, 40),
    8 => new Produto("Lâmpada", 6.32, 60),
    9 => new Produto("Amaciante de Roupas", 11.28, 80),
    10 => new Produto("Frigideira AntiAderente", 52.90, 15)
];

$pedido = new Pedido();

while (true) {
    limparTerminal();
    echo "Bem vindo(a) ao Mercado do Dev!\n";
    echo "Produtos Disponíveis:\n";
    foreach ($produtos as $key => $produto) {
        echo "$key - " . $produto->exibirProduto() . "\n";
    }
    echo "\n" . $pedido->exibirPedido() . "\n";

    $numeroProduto = (int)readline("Digite o número do produto que deseja comprar (ou 0 para finalizar): ");
    if ($numeroProduto === 0) {
        break;
    }

    if (!isset($produtos[$numeroProduto])) {
        echo "Produto inválido. Por favor, tente novamente.\n";
        readline("Pressione Enter para continuar...");
        continue;
    }

    $quantidade = (int)readline("Digite a quantidade que deseja comprar: ");

    if ($pedido->adicionarProduto($produtos[$numeroProduto], $quantidade)) {
        echo "Produto adicionado ao carrinho com sucesso!\n";
    } else {
        echo "Quantidade indisponível em estoque. Por favor, tente novamente.\n";
        readline("Pressione Enter para continuar...");
    }
}

while (true) {
    limparTerminal();
    echo "\n" . $pedido->exibirPedido() . "\n";
    echo "Formas de Pagamento que Aceitamos:\n 1 - Dinheiro\n 2 - Cheque\n 3 - Cartão\n";
    $formaPagamento = (int)readline("Digite a forma de pagamento: ");
    $formasPagamento = ['1' => 'Dinheiro', '2' => 'Cheque', '3' => 'Cartão'];

    if (isset($formasPagamento[$formaPagamento])) {
        $pagamento = new Pagamento($formasPagamento[$formaPagamento]);
        echo "Forma de pagamento escolhida: " . $pagamento->getFormaPagamento() . "\n";
        echo "Resumo do Pedido:\n" . $pedido->exibirPedido() . "\n";
        echo "\nCompra paga com sucesso!\nObrigado por comprar no Mercado do Dev!";
        break;
    } else {
        echo "Forma de pagamento inválida. Por favor, tente novamente.\n";
        readline("Pressione Enter para continuar...");
    }
}