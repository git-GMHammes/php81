void main() {
  // Criando um Map para armazenar contatos
  Map<String, String> contatos = {
    'Maria': '9999-7777',
    'João': '8888-6666',
    'Ana': '7777-5555'
  };

  // Acessando e imprimindo o número de telefone da Maria
  print('Telefone da Maria: ${contatos['Maria']}');

  // Alterando o número de telefone do João
  contatos['João'] = '3333-2222';

  // Adicionando um novo contato
  contatos['Carlos'] = '4444-1111';

  // Removendo um contato
  contatos.remove('Ana');

  // Imprimindo os contatos atualizados
  print('Lista de Contatos Atualizada: $contatos');
}
