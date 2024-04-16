import 'package:flutter/material.dart';

class ViewmodelsPage extends StatelessWidget {
  const ViewmodelsPage({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Models Views'),
      ),
      body: const Padding(
        padding: EdgeInsets.all(16.0),
        child: Text(
          'Os Controllers servirão como intermediários entre os Models e as Views. Eles contêm a lógica de negócios para manipular os dados que serão exibidos nas Views.\n\n'
          'Responsabilidade: Lidar com a lógica de negócios e estados da UI, como validação de formulários, conversão de dados, e chamadas para os serviços que interagem com a API. O ViewModel solicita dados ao Service e transforma esses dados de uma forma que seja fácil de exibir na View.',
          textAlign: TextAlign.justify,
        ),
      ),
    );
  }
}
