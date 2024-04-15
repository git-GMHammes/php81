void main() {
  
  void saudar() {
    print('Olá, tudo bem?');
  }

  saudar(); // Chamada da função

  void dizerOla(String nome) {
    print('Olá, $nome!');
  }

  dizerOla('Maria'); // Chamada da função com o argumento 'Maria'

  int dobrar(int numero) {
    return numero * 2;
  }

  var resultado = dobrar(4); // Chamada da função com o argumento 4
  print(resultado); // Imprime 8

  double areaRetangulo(double largura, double altura) {
    return largura * altura;
  }

  var area =
      areaRetangulo(5.0, 3.0); // Chamada da função com os argumentos 5.0 e 3.0
  print(area); // Imprime 15.0
}
