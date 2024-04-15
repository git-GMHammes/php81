void main() {
  List<String> frutas = ['Maçã', 'Banana', 'Uva'];
  List<String> nomes = ['João', 'Maria', 'Ana'];
  List<int> numeros = [1, 3, 5];

  // Adicionando elementos repetidos
  frutas.add('Banana'); // 'Banana' será adicionada à lista
  nomes.add('João'); // 'João' será adicionada à lista
  numeros.add(9); // 9 foi adicionado a lista

  // Removendo elementos
  frutas.remove('Banana'); // Remove a primeira ocorrência de 'Banana'
  nomes.remove('Maria'); // Remove 'Maria'
  numeros.remove(3);

  // Buscando elementos
  bool possuiUva = frutas.contains('Uva');
  bool possuiPedro = nomes.contains('Pedro');
  bool possuiValor = numeros.contains(3);

  print('Contém Uva? $possuiUva');
  print('Contém Pedro? $possuiPedro');
  print('Contém 3? $possuiValor');
}
