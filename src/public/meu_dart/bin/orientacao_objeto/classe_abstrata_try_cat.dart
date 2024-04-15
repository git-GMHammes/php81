// Classe abstrata para operações matemáticas
abstract class MathOperation {
  double operate(double a, double b);
}

// Implementação concreta para a divisão
class DivisionOperation extends MathOperation {
  @override
  double operate(double a, double b) {
    if (b == 0) {
      // Lança uma exceção se o divisor for zero
      throw DivisionByZeroException('Você não pode dicidir por zero');
    }
    return a / b;
  }
}

void main() {
  MathOperation divOp = DivisionOperation();

  try {
    // Tenta fazer uma divisão válida
    double result1 = divOp.operate(10, 2);
    print('10 / 2 = $result1');

    // Tenta fazer uma divisão por zero
    double result2 = divOp.operate(10, 0);
    print('10 / 0 = $result2');
  } catch (e) {
    // Captura e trata a exceção lançada
    print('Ocorreu um Erro: $e');
  }
}

// Definição personalizada de exceção para divisão por zero
class DivisionByZeroException implements Exception {
  String message;
  DivisionByZeroException(this.message);

  @override
  String toString() => 'DivisionByZeroException: $message';
}
