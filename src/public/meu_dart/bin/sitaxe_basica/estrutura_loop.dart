void main() {
  int limite = 10;
  int num1 = 5;
  int num2 = 5;
  var numbers = [1, 2, 3, 4, 5];

  for (int i = 0; i < limite; i++) {
    print(i);
  }

  for (var number in numbers) {
    print(number);
  }

  while (num1 > 0) {
    print(num1);
    num1--;
  }

  do {
    print(num2);
    num2--;
  } while (num2 > 0);
}
