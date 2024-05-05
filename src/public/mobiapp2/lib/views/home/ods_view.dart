import 'package:flutter/material.dart';

void main() {
  runApp(OdsView());
}

class OdsView extends StatelessWidget {
  OdsView({super.key});

  final _styles = <String, TextStyle>{
    'headline1': const TextStyle(fontSize: 26, fontWeight: FontWeight.bold),
    'bodyText1': const TextStyle(fontSize: 16, fontWeight: FontWeight.normal),
    'bodyText2': TextStyle(fontSize: 14, color: Colors.grey[600]),
    'subtitle1': const TextStyle(
        fontSize: 10, fontWeight: FontWeight.bold, color: Colors.black),
    'subtitle2': const TextStyle(
        fontSize: 20,
        fontWeight: FontWeight.w500,
        color: Color.fromARGB(221, 146, 132, 132)),
    // Adicione outros estilos conforme necessário
  };

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Simplificando'),
          centerTitle: false,
        ),
        body: SingleChildScrollView(
          child: Column(
            mainAxisSize: MainAxisSize.min,
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
              InkWell(
                onTap: () {
                  Navigator.pushNamed(context, '/home');
                },
                child: Image.asset('assets/images/ods/allods.jpg'),
              ),
              Container(
                width: double.infinity,
                padding: const EdgeInsets.all(10),
                margin: const EdgeInsets.all(10),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      'Imagine que o mundo é como uma grande escola e todos nós somos alunos tentando fazer do nosso ambiente um lugar melhor. Os Objetivos de Desenvolvimento Sustentável, ou ODS, são como uma lista de deveres de casa que todos os países precisam fazer para ajudar nosso planeta a ficar saudável e feliz. São 17 tarefas muito importantes, como garantir que todas as pessoas tenham comida e água limpa, que as florestas e os oceanos sejam cuidados, que todos tenham acesso à escola e que ninguém seja tratado de forma injusta.',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: _styles['bodyText1'],
                    ),
                    const SizedBox(height: 40),
                    Text(
                      'Essas tarefas são muito importantes porque, se as fizermos bem, no futuro, viveremos em um mundo onde todos possam ter uma vida boa sem estragar nosso lar, a Terra. Então, mesmo sendo criança, você também pode ajudar, como aprender sobre reciclagem, economizar água, e ser gentil com os outros. Tudo isso faz parte de trabalharmos juntos para completar nossa "lição de casa" global até 2030!',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: _styles['bodyText1'],
                    ),
                    // const SizedBox(height: 10),
                  ],
                ),
              ),
              TextButton(
                onPressed: () {
                  Navigator.pushNamed(context, '/home');
                },
                child: const Row(
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    Icon(Icons.arrow_back_sharp),
                    SizedBox(width: 8),
                    Text('Retornar à Home'),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
