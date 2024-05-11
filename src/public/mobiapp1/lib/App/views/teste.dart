import 'package:flutter/material.dart';
import 'package:permission_handler/permission_handler.dart';
import 'package:url_launcher/url_launcher.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  void requestPermissionAndOpenLink() async {
    var status = await Permission.location.request();
    if (status.isGranted) {
      print("Permissão de localização concedida.");
      _launchURL();
    } else if (status.isDenied) {
      print("Permissão de localização negada.");
    }
  }

  void _launchURL() async {
    print("Botão pressionado");
    final Uri url = Uri.parse('https://www.example.com');
    if (await canLaunchUrl(url)) {
      await launchUrl(url);
    } else {
      throw 'Could not launch $url';
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Home Page'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Icon(
              Icons.home,
              size: 64.0,
              color: Theme.of(context).primaryColor,
            ),
            const SizedBox(height: 20),
            ElevatedButton(
              onPressed: _launchURL,
              child: const Text('Abrir Link Diretamente'),
            ),
            const SizedBox(height: 20),
            Expanded(
              child: Padding(
                padding: const EdgeInsets.all(16.0),
                child: ListView(
                  children: <Widget>[
                    _buildItem(context, 'ViewModels', 'Descrição de ViewModels',
                        '/viewmodels'),
                    _buildItem(context, 'WebSocket', 'Descrição de WebSocket',
                        '/websocket'),
                    _buildItem(context, 'Services', 'Descrição de Services',
                        '/services'),
                    _buildItem(
                        context, 'Widgets', 'Descrição de Widgets', '/widgets'),
                    _buildItem(
                        context, 'Models', 'Descrição de Models', '/models'),
                    _buildItem(
                        context, 'Views', 'Descrição de Views', '/views'),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildItem(
      BuildContext context, String title, String description, String route) {
    return ListTile(
      title: Text(title),
      subtitle: Text(description),
      onTap: () {
        Navigator.of(context).pushNamed(route);
      },
    );
  }
}
