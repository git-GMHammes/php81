import 'package:flutter/material.dart';

class ServicesPage extends StatelessWidget {
  const ServicesPage({super.key});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Services'),
      ),
      body: const Padding(
        padding: EdgeInsets.all(16.0),
        child: Text(
          'Esta pasta pode armazenar a lógica para comunicação com a API PHP (CodeIgniter). Aqui você fará as requisições HTTP para buscar e enviar dados para o servidor.\n\n'
          'Responsabilidade: Incluir classes que lidam com a recuperação de dados da API, envio de novos registros, e qualquer outra interação entre sua aplicação Flutter e o back-end. Isso abstrai a lógica de rede do resto do seu aplicativo.',
          textAlign: TextAlign.justify,
          style: TextStyle(fontSize: 16),
        ),
      ),
    );
  }
}
