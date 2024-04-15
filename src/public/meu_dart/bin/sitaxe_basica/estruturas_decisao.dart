void main() {
  int number = 5;

// Estrutura if-else
  if (number > 0) {
    print("Número é positivo");
  } else if (number == 0) {
    print("Número é zero");
  } else {
    print("Número é negativo");
  }

// Estrutura switch-case
  switch (number) {
    case 0:
      print("Zero");
      break;
    case 1:
      print("Um");
      break;
    default:
      print("Número não é zero nem um");
  }

// Operador ternário
  String message = (number > 10) ? ("Maior que dez") : ("Menor ou igual a dez");
  print(message);
}
