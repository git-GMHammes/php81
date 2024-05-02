import 'package:flutter/material.dart';

class HomeView extends StatelessWidget {
  const HomeView({super.key});

  @override
  Widget build(BuildContext context) {
    // Este contexto é válido para navegação porque HomeView é chamado por uma rota definida no MaterialApp.
    return Scaffold(
      appBar: AppBar(
        title: const Text('Home (Página Principal)'),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            TextButton(
              onPressed: () {
                Navigator.pushNamed(context, '/estrutura');
              },
              child: const Row(
                mainAxisSize: MainAxisSize.min,
                children: <Widget>[
                  Icon(Icons.settings),
                  SizedBox(width: 8),
                  Text('Estrutura de Pastas'),
                ],
              ),
            ),
            InkWell(
              onTap: () {
                Navigator.pushNamed(context, '/estrutura');
              },
              child: Image.asset('assets/images/ods/allods.jpg'),
            ),
            Wrap(
              // Usar Wrap para uma gestão flexível do layout de múltiplas imagens
              spacing: 8.0, // Espaço horizontal entre as imagens
              runSpacing: 8.0, // Espaço vertical entre as linhas de imagens
              children: <Widget>[
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods001.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
                InkWell(
                  onTap: () {
                    Navigator.pushNamed(context, '/estrutura');
                  },
                  child: Container(
                    width: 55,
                    height: 55,
                    margin: const EdgeInsets.only(bottom: 0.5, right: 0.5),
                    child: Image.asset('assets/images/ods/ods002.png',
                        fit: BoxFit.contain),
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
