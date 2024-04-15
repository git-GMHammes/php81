void main() {

  List<int> numbers = [1, 2, 3, 4, 5];

  List<int> squaredNumbers = numbers.map((n) => n * n).toList();
  print(squaredNumbers);  // Output: [1, 4, 9, 16, 25]

  List<int> evenNumbers = numbers.where((n) => n % 2 == 0).toList();
  print(evenNumbers);     // Output: [2, 4]

  int sum = numbers.reduce((a, b) => a + b);
  print(sum);             // Output: 15
}
