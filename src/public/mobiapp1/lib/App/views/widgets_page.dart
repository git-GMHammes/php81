import 'package:flutter/material.dart';

class WidgetsPages extends StatelessWidget {
  const WidgetsPages({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Widgets'),
      ),
      body: const Padding(
        padding: EdgeInsets.all(16.0),
        child: Text(
          'Esta pasta é opcional, mas recomendada para armazenar widgets personalizados que podem ser reutilizados em várias partes da sua aplicação.\n\n'
          'Responsabilidade: Armazenar componentes da UI customizados que você cria para serem utilizados em múltiplas Views, como botões personalizados, cards, barras de navegação, etc.',
          textAlign: TextAlign.justify,
          style: TextStyle(fontSize: 16),
        ),
      ),
    );
  }
}
