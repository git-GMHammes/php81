void main() {
  List<Map<String, dynamic>> obterClientes() {
    return [
      {'nome': 'João', 'idade': 30, 'email': 'joao@example.com'},
      {'nome': 'Maria', 'idade': 28, 'email': 'maria@example.com'},
      {'nome': 'Carlos', 'idade': 35, 'email': 'carlos@example.com'}
    ];
  }

  String buscarDado(dynamic valor) {
    List<Map<String, dynamic>> clientes = obterClientes();

    for (var cliente in clientes) {
      for (var chave in cliente.keys) {
        if (valor.runtimeType == cliente[chave].runtimeType &&
            cliente[chave] == valor) {
          return 'Dado encontrado: ${chave} = $valor';
        }
      }
    }
    return 'Dado não encontrado';
  }

// Exemplo de chamadas da função
  String resultado1 = buscarDado('Maria');
  print(resultado1); // Pode imprimir: Dado encontrado: nome = Maria

  String resultado2 = buscarDado(35);
  print(resultado2); // Pode imprimir: Dado encontrado: idade = 35

  String resultado3 = buscarDado('joao@example.com');
  print(resultado3); // Pode imprimir: Dado encontrado: email = joao@example.com
}
