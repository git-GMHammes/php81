// Classe base
class Animal {
  String nome;
  int idade;

  Animal(this.nome, this.idade);

  void comer() {
    print('$nome está comendo.');
  }

  void dormir() {
    print('$nome está dormindo.');
  }
}

// Classe derivada
class Cachorro extends Animal {
  String raca;

  Cachorro(String nome, int idade, this.raca) : super(nome, idade);

  void latir() {
    print('$nome está latindo.');
  }

  @override
  void comer() {
    super.comer(); // Chamando o método da classe base
    print('$nome também gosta de comer ração de cachorro.');
  }
}

void main() {
  var meuCachorro = Cachorro('Rex', 5, 'Labrador');
  meuCachorro.comer();
  meuCachorro.dormir();
  meuCachorro.latir();
}
