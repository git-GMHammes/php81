import 'package:flutter/material.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Estrutura do Projeto Flutter'),
      ),
      body: ListView(
        children: <Widget>[
          _buildItem(context, 'Models', 'Descrição de Models', '/models'),
          _buildItem(context, 'Services', 'Descrição de Services', '/services'),
          _buildItem(context, 'Views', 'Descrição de Views', '/views'),
          _buildItem(context, 'Controllers', 'Descrição de Contollers',
              '/controllers'),
          _buildItem(context, 'Widgets', 'Descrição de Widgets', '/widgets'),
        ],
      ),
    );
  }

  Widget _buildItem(
      BuildContext context, String title, String subtitle, String routeName) {
    return ListTile(
      title: Text(title),
      subtitle: Text(subtitle),
      onTap: () {
        Navigator.of(context).pushNamed(routeName);
      },
    );
  }
}
