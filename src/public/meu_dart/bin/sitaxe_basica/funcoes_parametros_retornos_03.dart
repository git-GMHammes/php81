void main() {
  Map<String, dynamic> obterUsuario() {
    return {'nome': 'João', 'idade': 30, 'email': 'joao@example.com'};
  }

  String verificarUsuario(String chave) {
    Map<String, dynamic> usuario = obterUsuario();

    // Verifica se a chave existe no mapa
    bool encontrado = usuario.containsKey(chave);

    // Retorna uma mensagem baseada na presença da chave
    if (encontrado) {
      return 'Valor encontrado: ${usuario[chave]}';
    } else {
      return 'Valor não encontrado';
    }
  }

// Exemplo de chamada da função
  String resultado1 = verificarUsuario('nome');
  print(resultado1); // Imprime: Valor encontrado: João

  String resultado2 = verificarUsuario('profissao');
  print(resultado2); // Imprime: Valor não encontrado
}
