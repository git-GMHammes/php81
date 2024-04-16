import 'app/views/viewmodels_page.dart';
import 'package:flutter/material.dart';
import 'app/views/websocket_page.dart';
import 'app/views/services_page.dart';
import 'app/views/widgets_page.dart';
import 'app/views/models_page.dart';
import 'app/views/views_page.dart';
import 'app/views/home_page.dart';
// Importe os arquivos das outras páginas aqui

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const HomePage(),
      routes: {
        '/viewmodels': (context) => const ViewmodelsPage(),
        '/websocket': (context) => const WebSocketPage(),
        '/services': (context) => const ServicesPage(),
        '/widgets': (context) => const WidgetsPages(),
        '/models': (context) => const ModelsPage(),
        '/views': (context) => const ViewsPage(),
        // Continue definindo as rotas para as outras seções aqui
      },
    );
  }
}
