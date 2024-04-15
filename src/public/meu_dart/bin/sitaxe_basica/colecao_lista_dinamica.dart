void main() {
  List<int> numeros = [];   // Lista dinâmica vazia
  numeros.add(1);           // Adicionando elementos
  numeros.add(2);
  numeros.add(3);
  print(numeros);           // Saída: [1, 2, 3]

  numeros.removeAt(1);      // Removendo o elemento na posição 1 (o número 2)
  print(numeros);           // Saída: [1, 3]
}
