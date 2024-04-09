import 'package:flutter/material.dart';
import 'app/views/home_page.dart';
import 'app/views/models_page.dart';
import 'app/views/services_page.dart';
import 'app/views/views_page.dart';
import 'app/views/controllers_page.dart';
import 'app/views/widgets_page.dart';
import 'app/views/websocket_page.dart';
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
        '/models': (context) => const ModelsPage(),
        '/services': (context) => const ServicesPage(),
        '/views': (context) => const ViewsPage(),
        '/controllers': (context) => const ControllersPage(),
        '/widgets': (context) => const WidgetsPages(),
        '/websocket': (context) => const WebSocketPage(),
        // Continue definindo as rotas para as outras seções aqui
      },
    );
  }
}
