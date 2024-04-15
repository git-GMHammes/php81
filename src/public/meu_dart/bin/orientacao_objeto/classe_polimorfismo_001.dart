// Classe base Animal
class Animal {
  // Método emitirSom na classe base
  void emitirSom() {
    print("Este animal faz um som.");
  }
}

// Classe Cachorro que herda de Animal
class Cachorro extends Animal {
  // Sobrescrevendo o método emitirSom
  @override
  void emitirSom() {
    print("Au au!");
  }
}

// Classe Gato que herda de Animal
class Gato extends Animal {
  // Sobrescrevendo o método emitirSom
  @override
  void emitirSom() {
    print("Miau!");
  }
}

// Função principal para executar o código
void main() {
  // Instanciando objetos das classes
  Animal meuAnimal = Animal();
  Animal meuCachorro = Cachorro();
  Animal meuGato = Gato();

  // Chamando o método emitirSom de cada objeto
  meuAnimal.emitirSom();    // Saída: Este animal faz um som.
  meuCachorro.emitirSom();  // Saída: Au au!
  meuGato.emitirSom();      // Saída: Miau!
}
