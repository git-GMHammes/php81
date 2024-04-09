import 'package:flutter/material.dart';

class ViewsPage extends StatelessWidget {
  const ViewsPage({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Views'),
      ),
      body: const Padding(
        padding: EdgeInsets.all(16.0),
        child: Text(
          'Contém os widgets que são responsáveis pela apresentação dos dados. Aqui ficarão as telas da sua aplicação, como a lista de dados pessoais e os formulários para exibição e envio de dados.\n\n'
          'Responsabilidade: Construir a interface com o usuário (UI) com base nos modelos de dados fornecidos pelos ViewModels. Aqui, você define como os dados serão exibidos e interage com o usuário.',
          textAlign: TextAlign.justify,
        ),
      ),
    );
  }
}
