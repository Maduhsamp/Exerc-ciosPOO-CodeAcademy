<?php
    class Pessoa {
        public string $nome;
        function __construct($nome) {
            $this->nome = $nome;
        }
        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
    }
    class Universidade {
        private string $nomeUni;
        public function __construct($nomeUni) {
            $this->nomeUni = $nomeUni;
        }
        public function getNomeUni() {
            return $this->nomeUni;
        }
        public function setNomeUni($nomeUni) {
            $this->nomeUni = $nomeUni;
        }
    }

    $universidade1 = new Universidade(readline("Digite o nome da Universidade 1: "));
    $universidade2 = new Universidade(readline("Digite o nome da Universidade 2: "));
    $universidade3 = new Universidade(readline("Digite o nome da Universidade 3: "));

    $pessoa1 = new Pessoa(readline("Digite o nome da Pessoa 1: "));
    $pessoa2 = new Pessoa(readline("Digite o nome da Pessoa 2: "));
    $pessoa3 = new Pessoa(readline("Digite o nome da Pessoa 3: "));

    echo $pessoa1->getNome() . " trabalha na Universidade " . $universidade1->getNomeUni() . ".\n"
    . $pessoa2->getNome() . " trabalha na Universidade " . $universidade2->getNomeUni() . ".\n"
    . $pessoa3->getNome() . " trabalha na Universidade " . $universidade3->getNomeUni() . ".\n";