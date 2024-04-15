void main() {
  List<String> frutas = ['Manga', 'Banana', 'Maçã', 'Uva', 'Abacaxi'];
  List<int> numeros = [10, 1, 5, 3, 8];

  // Ordenando a lista de strings alfabeticamente
  frutas.sort();
  print(frutas);    // Saída: [Abacaxi, Banana, Maçã, Manga, Uva]

  // Ordenando a lista de inteiros em ordem crescente
  numeros.sort();
  print(numeros);   // Saída: [1, 3, 5, 8, 10]

  // Ordenando a lista de strings de forma decrescente
  frutas.sort((a, b) => b.compareTo(a));
  print(frutas);    // Saída: [Uva, Manga, Maçã, Banana, Abacaxi]

  // Ordenando a lista de inteiros de forma decrescente
  numeros.sort((a, b) => b.compareTo(a));
  print(numeros);   // Saída: [10, 8, 5, 3, 1]

}
  