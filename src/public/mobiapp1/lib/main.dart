import 'package:flutter/material.dart';
import 'views/home_page.dart';
import 'views/models_page.dart';
import 'views/services_page.dart';
import 'views/views_page.dart';
import 'views/controllers_page.dart';
import 'views/widgets_pages.dart';
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
        // Continue definindo as rotas para as outras seções aqui
      },
    );
  }
}
