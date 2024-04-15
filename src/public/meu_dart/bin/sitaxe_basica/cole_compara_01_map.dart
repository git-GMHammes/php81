void main() {
  Map<String, String> usuarios = {
    'joao123': 'João Silva',
    'maria456': 'Maria Clara',
    'ana789': 'Ana Costa'
  };

  // Acessar um usuário pelo seu username
  String nomeUsuario = usuarios['maria456'];
  print('Nome do usuário: $nomeUsuario'); // Saída: Maria Clara

  // Adicionar um novo usuário
  usuarios['carlos123'] = 'Carlos Rocha';

  // Remover um usuário
  usuarios.remove('ana789');
  print(
      usuarios); // Saída: {'joao123': 'João Silva', 'maria456': 'Maria Clara', 'carlos123': 'Carlos Rocha'}
}

