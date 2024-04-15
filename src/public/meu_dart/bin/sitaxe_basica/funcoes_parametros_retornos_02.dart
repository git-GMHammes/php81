void main() {
  Map<String, dynamic> obterUsuario() {
    return {'nome': 'João', 'idade': 30, 'email': 'joao@example.com'};
  }

  var usuario = obterUsuario();
  print(usuario); // Imprime: {nome: João, idade: 30, email: joao@example.com}

  Set<int> numerosUnicos() {
    return {1, 2, 3, 4, 5};
  }

  var numeros = numerosUnicos();
  print(numeros); // Imprime: {1, 2, 3, 4, 5}

  List<String> obterFrutas() {
    return ['Maçã', 'Banana', 'Laranja'];
  }

  var frutas = obterFrutas();
  print(frutas); // Imprime: [Maçã, Banana, Laranja]
}
