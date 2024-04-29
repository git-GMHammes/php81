import 'package:flutter/material.dart';

void main() {
  runApp(const TextContainer());
}

class TextContainer extends StatelessWidget {
  const TextContainer({super.key});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Teste Container e Text'),
          centerTitle: false,
        ),
        body: SingleChildScrollView(
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: <Widget>[
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Container(
                    width: 100.0,
                    height: 100.0,
                    color: Colors.blue,
                  ),
                  const SizedBox(width: 10),
                  const Expanded(
                    child: Text(
                      'Este é um exemplo de texto justificado em Flutter. Justificar o texto faz com que ele se alinhe igualmente às margens esquerda e direita, criando um visual uniforme.',
                      softWrap: true, // Quebra de linha automática
                      overflow: TextOverflow
                          .clip, // Prevenindo o texto de sobrepor outros elementos
                      style: TextStyle(fontSize: 16),
                      textAlign: TextAlign.justify,
                    ),
                  ),
                  const SizedBox(width: 10),
                ],
              ),
              // Adicionado para evitar overflow
              Column(mainAxisSize: MainAxisSize.min, children: [
                const Text(
                  'Este é um exemplo de texto em Flutter que deve ser quebrado em várias linhas para evitar overflow. Este texto é um pouco longo para estar na mesma linha do container.',
                  softWrap: true, // Quebra de linha automática
                  overflow: TextOverflow
                      .clip, // Prevenindo o texto de sobrepor outros elementos
                  style: TextStyle(fontSize: 16),
                ),
                const SizedBox(height: 10),
                const Text(
                  'Este é um exemplo de texto em Flutter que deve ser quebrado em várias linhas para evitar overflow. Este texto é um pouco longo para estar na mesma linha do container.',
                  softWrap: true, // Quebra de linha automática
                  overflow: TextOverflow
                      .clip, // Prevenindo o texto de sobrepor outros elementos
                  style: TextStyle(fontSize: 16),
                ),
                const SizedBox(height: 10),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Container(
                      width: 100.0,
                      height: 100.0,
                      color: const Color.fromARGB(255, 178, 45, 45),
                    ),
                    const SizedBox(width: 10),
                    Container(
                      width: 100.0,
                      height: 100.0,
                      color: const Color.fromARGB(255, 37, 198, 37),
                    ),
                  ],
                ),
                const SizedBox(height: 40),
              ]),
            ],
          ),
        ),
      ),
    );
  }
}
