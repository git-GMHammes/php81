import 'package:flutter/material.dart';

void main() {
  runApp(const EstrutraView());
}

class EstrutraView extends StatelessWidget {
  const EstrutraView({super.key});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Estrutura do Código'),
          centerTitle: false,
        ),
        body: SingleChildScrollView(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              TextButton(
                onPressed: () {
                  Navigator.pushNamed(context, '/home');
                },
                child: const Row(
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    Icon(Icons.home),
                    SizedBox(width: 8),
                    Text('Retornar à Home'),
                  ],
                ),
              ),
              const Padding(
                padding: EdgeInsets.all(20.0),
                child: Text(
                  'Estrutura aqui:',
                  style: TextStyle(fontSize: 15),
                ),
              ),
              const Padding(
                padding: EdgeInsets.all(20.0),
                child: SelectableText(
                  'assets/\n'
                  '  |-- /images\n'
                  '  |   |-- /colecao1\n'
                  '  |   |   |-- img01.jpg \n'
                  '  |   |-- /colecao2\n'
                  '  |   |   |-- img02.jpg \n'
                  '  |   |-- /ods\n'
                  '  |   |   |-- allods.jpg \n'
                  '  |   |   |-- ods001.png \n'
                  '  |   |   |-- ods002.png \n'
                  '  |   |   |-- ods003.png \n'
                  '  |   |   |-- ods004.png \n'
                  '  |   |   |-- ods005.png \n'
                  '  |   |   |-- ods006.png \n'
                  '  |   |   |-- ods007.png \n'
                  '  |   |   |-- ods008.png \n'
                  '  |   |   |-- ods009.png \n'
                  '  |   |   |-- ods010.png \n'
                  '  |   |   |-- ods011.png \n'
                  '  |   |   |-- ods012.png \n'
                  '  |   |   |-- ods013.png \n'
                  '  |   |   |-- ods014.png \n'
                  '  |   |   |-- ods015.png \n'
                  '  |   |   |-- ods016.png \n'
                  '  |   |-- flutter_002.png \n'
                  '  |-- flutter_001.jpg \n'
                  'lib/\n'
                  '  |-- /models\n'
                  '  |   |-- model.dart\n'
                  '  |   |-- user.dart\n'
                  '  |-- /services\n'
                  '  |   |-- api_service.dart\n'
                  '  |   |-- authentication_service.dart\n'
                  '  |-- /utils\n'
                  '  |   |-- constants.dart\n'
                  '  |   |-- router.dart\n'
                  '  |-- /viewmodels\n'
                  '  |   |-- /home\n'
                  '  |   |   |-- home_viewmodel.dart\n'
                  '  |   |-- /login\n'
                  '  |   |   |-- login_viewmodel.dart\n'
                  '  |   |-- /settings\n'
                  '  |   |   |-- settings_viewmodel.dart\n'
                  '  |-- /views\n'
                  '  |   |-- /home\n'
                  '  |   |   |-- home_view.dart\n'
                  '  |   |   |-- ods_view.dart\n'
                  '  |   |-- /login\n'
                  '  |   |   |-- login_view.dart\n'
                  '  |   |-- /settings\n'
                  '  |   |   |-- settings_view.dart\n'
                  '  |-- /widgets\n'
                  '  |   |-- head_widgets.dart\n'
                  '  |   |-- nav_widgets.dart\n'
                  'main.dart',
                  style: TextStyle(fontFamily: 'Courier', fontSize: 12),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
