// Classe base para operações
abstract class Operation {
  String execute();
}

// Implementação concreta para soma
class Addition implements Operation {
  final int a, b;
  Addition(this.a, this.b);

  @override
  String execute() => 'Resultado da soma: ${a + b}';
}

// Implementação concreta para divisão
class Division implements Operation {
  final int a, b;
  Division(this.a, this.b);

  @override
  String execute() {
    if (b == 0) throw Exception("Divisão por zero não permitida.");
    return 'Resultado da divisão: ${a / b}';
  }
}

void main() {
  Map<String, Operation> operations = {
    'add': Addition(10, 5),
    'div':
        Division(10, 0) // Aqui colocamos uma divisão por zero intencionalmente
  };

  // Execução polimórfica das operações com tratamento de exceções
  operations.forEach((key, operation) {
    try {
      print(operation.execute());
    } catch (e) {
      print('Erro ao executar $key: $e');
    }
  });
}
