abstract class SuperClasseMapa {
  // Função para buscar valor no mapa
  dynamic buscarValor(String chave) {
    // Implementação da busca no mapa (a ser definida na subclasse)
    throw Exception('Método buscarValor não implementado.');
  }
}

class ClasseFilha extends SuperClasseMapa {
  // Mapa a ser utilizado
  final Map<String, String> mapa = {};

  // Sobrescrevendo a função buscarValor
  @override
  dynamic buscarValor(String chave) {
    // Verificando se a chave existe no mapa
    if (mapa.containsKey(chave)) {
      // Retornando o valor associado à chave
      return mapa[chave];
    } else {
      // Retornando um valor padrão caso a chave não exista
      return 'Chave não encontrada.';
    }
  }
}

void main() {
  // Criando uma instância da classe filha
  ClasseFilha classeFilha = ClasseFilha();

  // Adicionando elementos ao mapa
  classeFilha.mapa['chave1'] = 'valor1';
  classeFilha.mapa['chave2'] = 'valor2';

  // Buscando valores utilizando a função herdada
  String valor1 = classeFilha.buscarValor('chave1');
  String valor2 = classeFilha.buscarValor('chave3');

  // Imprimindo os valores
  print('Valor da chave1: $valor1'); // Valor da chave1: valor1
  print('Valor da chave3: $valor2'); // Valor da chave3: Chave não encontrada.
}
