import 'package:flutter/material.dart';

class ModelsPage extends StatelessWidget {
  const ModelsPage({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Models'),
      ),
      body: const Padding(
        padding: EdgeInsets.all(16.0),
        child: Text(
          'Aqui ficarão as classes que representam os dados a serem manipulados. No seu caso, as informações pessoais que serão recuperadas da API PHP.\n\n'
          'Responsabilidade: Definir a estrutura dos dados que sua aplicação Flutter irá utilizar. Por exemplo, se sua API retorna informações de usuários, você terá um modelo User com campos como id, name, email, etc.',
          textAlign: TextAlign.justify,
          style: TextStyle(fontSize: 16),
        ),
      ),
    );
  }
}
