// Definindo a classe
class Pessoa {
  String nome;
  int idade;

  // Construtor da classe
  Pessoa(this.nome, this.idade);

  // Método da classe
  void mostrarIdade() {
    print('A idade de $nome é $idade anos.');
  }
}

void main() {
  // Criando um objeto da classe Pessoa
  Pessoa pessoa1 = Pessoa('João', 25);

  // Acessando o método do objeto
  pessoa1.mostrarIdade();
}
