// Super Classe
class SuperClasse {
  Map<String, dynamic> mapa = {'chave': 'valor'};

  buscar(String chave) {
    return mapa[chave];
  }
}

// Classe Filha
class ClasseFilha extends SuperClasse {
  @override
  Map<String, dynamic> mapa = {'novaChave': 'novoValor'};

  ClasseFilha() {
    print(buscar('novaChave')); // Usa a função de busca da Super Classe
  }
}

void main() {
  ClasseFilha();
}
