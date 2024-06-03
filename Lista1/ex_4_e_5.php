<?php

    class Pessoa {
        private string $nome;
        private string $endereco;
        private string $email;
        private string $telefone;

        function __construct(string $nome, string $endereco, string $email, string $telefone) {
            $this->nome = $nome;
            $this->endereco = $endereco;
            $this->email = $email;
            $this->telefone = $telefone;
        }
        function getNome(): string {
            return $this->nome;
        }
        function setNome($nome) {
            $this->nome = $nome;
        }
        function getEndereco(): string {
            return $this->endereco;
        }
        function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
        function getEmail(): string {
            return $this->email;
        }
        function setEmail($email) {
            $this->email = $email;
        }
        function getTelefone(): string {
            return $this->telefone;
        }
        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
    }

    class Livro {
        private string $nome;
        private string $autor;
        private int $numPaginas;
        private ?Pessoa $pessoa;
        function __construct(string $nome, string $autor, int $numPaginas) {
            $this->nome = $nome;
            $this->autor = $autor;
            $this->numPaginas = $numPaginas;
            $this->pessoa = null;
        }

        public function getNome(): string {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function getAutor(): string {
            return $this->autor;
        }
        public function setAutor($autor) {
            $this->autor = $autor;
        }
        public function getNumPaginas(): int {
            return $this->numPaginas;
        }
        public function setNumPaginas($numPaginas) {
            $this->numPaginas = $numPaginas;
        }
        public function getPessoa(): Pessoa {
            return $this->pessoa;
        }
        public function setPessoa($pessoa) {
            $this->pessoa = $pessoa;
        }
        function alugar(Pessoa $pessoa) {
            if ($this->pessoa == null) {
                $this->pessoa = $pessoa;
                echo "Livro alugado com sucesso!\n"; 
            } else {
                echo "Esse livro já está alugado\n";
            }
        }
        function devolverLivro(Pessoa $pessoa) {
            if ($this->pessoa != null) {
                $this->pessoa = null;
                echo "Livro devolvido com sucesso!\n"; 
            } else {
                echo "Não foi possível realizar a devolução!\nTente novamente!\n";
            }
        }
    }

    $pessoa1 = new Pessoa("Maria", "Rua das Maçãs", "maria@gmail.com", "(00) 00000-0000");
    $pessoa2 = new Pessoa("Emanuelli", "Rua dos Morangos", "manu@gmail.com", "(11) 11111-1111");
    $pessoa3 = new Pessoa("Ane", "Rua das Flores", "ane@gmail.com", "(22) 22222-2222");
    $pessoa4 = new Pessoa("Moacir", "Rua das Melancias", "moaca@gmail.com", "(33) 33333-3333");

    $livro1 = new Livro("Poeira em Alto Mar", "autor1", 324);
    $livro2 = new Livro("As longas tranças do careca", "autor2", 287);
    $livro3 = new Livro("Lenha na Fogueira", "autor3", 189);
    $livro4 = new Livro("Risos no Asfalto", "autor4", 430);

    $livro1->alugar($pessoa1);
    $livro1->alugar($pessoa2);
    $livro1->devolverLivro($pessoa1);
    $livro1->alugar($pessoa2);
