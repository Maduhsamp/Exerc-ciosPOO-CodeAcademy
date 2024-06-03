class Pessoa {
    constructor(nome, diaNascimento, mesNascimento, anoNascimento) {
      this.nome = nome;
      this.diaNascimento = diaNascimento;
      this.mesNascimento = mesNascimento;
      this.anoNascimento = anoNascimento;
      this.idade = 0; 
    }
  
    calculaIdade(diaAtual, mesAtual, anoAtual) {
      let idade = anoAtual - this.anoNascimento;
      if (mesAtual < this.mesNascimento || (mesAtual === this.mesNascimento && diaAtual < this.diaNascimento)) {
        idade--; 
      }
      this.idade = idade;
    }

    informaIdade() {
      return this.idade;
    }
  
    informaNome() {
      return this.nome;
    }
  
    ajustaDataDeNascimento(diaNascimento, mesNascimento, anoNascimento) {
      this.diaNascimento = diaNascimento;
      this.mesNascimento = mesNascimento;
      this.anoNascimento = anoNascimento;
    }
  }
  
  const pessoa1 = new Pessoa('João', 15, 6, 1990);
  const pessoa2 = new Pessoa('Maria', 10, 3, 1985);
  
  const diaAtual = 28;
  const mesAtual = 5;
  const anoAtual = 2024;
  
  pessoa1.calculaIdade(diaAtual, mesAtual, anoAtual);
  pessoa2.calculaIdade(diaAtual, mesAtual, anoAtual);
  
  console.log(`${pessoa1.informaNome()} tem ${pessoa1.informaIdade()} anos.`);
  console.log(`${pessoa2.informaNome()} tem ${pessoa2.informaIdade()} anos.`);
  