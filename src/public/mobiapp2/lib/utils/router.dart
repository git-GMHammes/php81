import 'package:flutter/material.dart';
import 'package:mobiapp2/views/documentacao/estrutura_view.dart';
import 'package:mobiapp2/views/teste/teste_view.dart';
import 'package:mobiapp2/views/home/home_view.dart';
// Importando um arquivo utilizando o caminho absoluto
// import 'package:my_app/viewmodels/...';
// import 'package:my_app/services/...';
// import 'package:my_app/widgets/...';
// import 'package:my_app/models/...';
// import 'package:my_app/utils/...';

Route<dynamic> generateRoute(RouteSettings settings) {
  switch (settings.name) {
    case '/home':
      return MaterialPageRoute(builder: (_) => const HomeView());
    case '/estrutura':
      return MaterialPageRoute(builder: (_) => const EstrutraView());
    case '/teste':
      return MaterialPageRoute(builder: (_) => const TesteView());
//    case '/login':
//      return MaterialPageRoute(builder: (_) => LoginView());
//    case '/settings':
//      return MaterialPageRoute(builder: (_) => SettingsView());
    default:
      return MaterialPageRoute(
          builder: (_) => Scaffold(
                body: Center(
                  child: Text('No route defined for ${settings.name}'),
                ),
              ));
  }
}
