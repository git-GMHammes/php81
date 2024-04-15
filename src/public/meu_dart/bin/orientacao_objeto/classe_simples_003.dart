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

void main() {
  // Criando um carro
  Carro meuCarro = Carro(nome: 'Fiesta', cor: 'Preto', ano: 2011);

  // Acessando atributos
  print('Nome do carro: ${meuCarro.nome}');

  // Chamando métodos
  meuCarro.dirigir(10.0); // Dirigindo por 10 km
  meuCarro.dirigir(20.0); // Dirigindo por 20 km
  meuCarro.dirigir(30.0); // Dirigindo por 30 km
  meuCarro.mostrarDetalhes(); // Exibindo detalhes do carro
}
