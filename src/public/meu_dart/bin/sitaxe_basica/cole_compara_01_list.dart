void main() {
  List<List<String>> usuarios = [
    ['joao123', 'João Silva'],
    ['maria456', 'Maria Clara'],
    ['ana789', 'Ana Costa']
  ];

  // Acessar um usuário pelo seu username requer um loop
  String nomeUsuario = '';
  for (var usuario in usuarios) {
    if (usuario[0] == 'maria456') {
      nomeUsuario = usuario[1];
      break;
    }
  }
  print('Nome do usuário: $nomeUsuario'); // Saída: Maria Clara

  // Adicionar um novo usuário é simples
  usuarios.add(['carlos123', 'Carlos Rocha']);

  // Remover um usuário requer mais código
  usuarios.removeWhere((usuario) => usuario[0] == 'ana789');
  print(
      usuarios); // Saída: [['joao123', 'João Silva'], ['maria456', 'Maria Clara'], ['carlos123', 'Carlos Rocha']]
}
