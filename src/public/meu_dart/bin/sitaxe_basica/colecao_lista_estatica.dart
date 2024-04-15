void main() {
  List<int> numeros = List.filled(3, 0);  // Lista estática com tamanho 3, preenchida com zeros
  print(numeros); // Saída: [0, 0, 0]

  numeros[0] = 10;                        // Alterando elementos
  numeros[1] = 20;
  numeros[2] = 30;
  print(numeros);                         // Saída: [10, 20, 30]
  
  // numeros.add(40); // Isso causaria um erro, pois não é possível adicionar mais elementos
}
