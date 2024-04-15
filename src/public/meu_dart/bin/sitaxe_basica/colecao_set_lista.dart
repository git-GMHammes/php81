void main() {
  // Criando um conjunto de nomes
  Set<String> nomes = {'João', 'Maria', 'Ana', 'Pedro', 'Lucas'};

  // Tentando adicionar nomes duplicados
  nomes.add('Maria');
  nomes.add('Ana');

  // Criando outro conjunto de nomes
  Set<String> outrosNomes = {'Julia', 'Ana', 'Carlos', 'Lucas', 'Maria'};

  // Mostrando o conjunto resultante
  print('Conjunto Original: $nomes'); // Saída: {João, Maria, Ana, Pedro, Lucas}
  print(
      'Novo Conjunto: $outrosNomes'); // Saída: {Julia, Ana, Carlos, Lucas, Maria}

  // União de conjuntos
  Set<String> uniao = nomes.union(outrosNomes);
  print(
      'União: $uniao'); // Saída: {João, Maria, Ana, Pedro, Lucas, Julia, Carlos}

  // Interseção de conjuntos
  Set<String> intersecao = nomes.intersection(outrosNomes);
  print('Interseção: $intersecao'); // Saída: {Maria, Ana, Lucas}

  // Diferença entre conjuntos
  Set<String> diferenca = nomes.difference(outrosNomes);
  print('Diferença (nomes - outrosNomes): $diferenca'); // Saída: {João, Pedro}
}

  