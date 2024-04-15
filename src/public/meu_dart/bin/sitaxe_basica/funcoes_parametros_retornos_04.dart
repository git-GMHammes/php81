void main() {
  String verificarValor(Map<String, dynamic> mapa, String chave) {
    // Verifica se a chave existe no mapa
    bool encontrado = mapa.containsKey(chave);

    // Retorna uma mensagem baseada na presença da chave
    if (encontrado) {
      return 'Valor encontrado: ${mapa[chave]}';
    } else {
      return 'Valor não encontrado';
    }
  }

// Exemplo de como usar a função
  Map<String, dynamic> usuario = {
    'nome': 'João',
    'idade': 30,
    'email': 'joao@example.com'
  };
  String resultado1 = verificarValor(usuario, 'nome');
  print(resultado1); // Imprime: Valor encontrado: João

  String resultado2 = verificarValor(usuario, 'profissao');
  print(resultado2); // Imprime: Valor não encontrado
}
