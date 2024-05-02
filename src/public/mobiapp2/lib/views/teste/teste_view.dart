import 'package:flutter/material.dart';

void main() {
  runApp(const TesteView());
}

class TesteView extends StatelessWidget {
  const TesteView({super.key});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Pagina de TesteView de Navegação'),
          centerTitle: false,
        ),
        body: Center(
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
                    Text('Ir para Home'),
                  ],
                ),
              ),
              const SizedBox(height: 20),
              const Padding(
                padding: EdgeInsets.all(20.0),
                child: Text(
                  'Este é um exemplo de texto justificado em Flutter. Justificar o texto faz com que ele se alinhe igualmente às margens esquerda e direita, criando um visual uniforme.',
                  softWrap: true, // Quebra de linha automática
                  overflow: TextOverflow
                      .clip, // Prevenindo o texto de sobrepor outros elementos
                  textAlign: TextAlign.justify,
                  style: TextStyle(fontSize: 16),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
