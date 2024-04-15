class Carro {
  // Atributos (características do carro)
  String nome;
  String cor;
  int ano;
  double kmRodados;

  // Construtor (método especial para criar objetos)
  Carro({
    required this.nome,
    required this.cor,
    required this.ano,
    this.kmRodados = 0.0, // Valor padrão para kmRodados
  });

  // Métodos (comportamentos do carro)
  void dirigir(double distancia) {
    kmRodados += distancia;
    print('$nome percorreu $distancia km!');
  }

  void mostrarDetalhes() {
    print('Nome: $nome');
    print('Cor: $cor');
    print('Ano: $ano');
    print('Km rodados: $kmRodados');
  }
}
