import 'package:flutter/material.dart';
import 'package:mobiapp2/views/documentacao/estrutura_view.dart';
import 'package:mobiapp2/views/teste/teste_view.dart';
import 'package:mobiapp2/views/home/home_view.dart';
import 'package:mobiapp2/views/home/ods_view.dart';
import 'package:mobiapp2/views/ods/ods01_view.dart';

Route<dynamic> generateRoute(RouteSettings settings) {
  switch (settings.name) {
    case '/home':
      return MaterialPageRoute(builder: (_) => HomeView());
    case '/estrutura':
      return MaterialPageRoute(builder: (_) => const EstrutraView());
    case '/ods':
      return MaterialPageRoute(builder: (_) => OdsView());
    case '/ods001':
      return MaterialPageRoute(builder: (_) => const Ods001View());
    case '/teste':
      return MaterialPageRoute(builder: (_) => const TesteView());
    default:
      return MaterialPageRoute(
          builder: (_) => Scaffold(
                body: Center(
                  child: Text('No route defined for ${settings.name}'),
                ),
              ));
  }
}
