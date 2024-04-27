import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Exemplo de Alinhamento'),
        ),
        body: const Align(
          alignment: Alignment.topCenter,
                    child: Text(
                      'Este é um exemplo de texto justificado em Flutter. Justificar o texto faz com que ele se alinhe igualmente às margens esquerda e direita, criando um visual uniforme.',
                      textAlign: TextAlign.justify,
                      style: TextStyle(
                        color: Colors.deepOrange,
                        fontSize: 16,
                        backgroundColor: Colors.blueAccent
                        ),
                      
                    ),
          // color: Define a cor do texto.
          // fontSize: Especifica o tamanho do texto.
          // fontWeight: Ajusta o peso da fonte, como bold para negrito.
          // fontStyle: Permite escolher entre normal ou itálico.
          // decoration: Adiciona decorações como underline (sublinhado), overline (sobrelinha) ou lineThrough (tachado).
          // decorationColor: Define a cor da decoração.
          // decorationStyle: Define o estilo da linha da decoração (sólido, duplo, pontilhado, ponteado, ondulado).
          // letterSpacing: Controla o espaçamento entre os caracteres.
          // wordSpacing: Controla o espaçamento entre as palavras.
          // shadows: Lista de sombras para aplicar ao texto.
          // background: Define uma pintura para o fundo do texto.
            
        ),
      ),
    );
  }
}

// [1] - import 'package:flutter/material.dart';
// Esta linha importa o pacote material.dart, que contém a biblioteca de widgets 
// do Material Design e outras funcionalidades essenciais do Flutter. O Material 
// Design é um sistema de design desenvolvido pelo Google que oferece diretrizes 
// de UI/UX para aplicativos móveis e web.

// [2] - void main() { runApp(MyApp()); }
// |-- Esta é a função principal do aplicativo Flutter, onde a execução começa. 
// A função runApp() infla o widget dado e o anexa à tela. O widget passado para 
// runApp() torna-se a raiz da árvore de widgets.
// |-- MyApp() é geralmente uma classe que você define, que estende um widget, 
// muitas vezes um StatelessWidget ou StatefulWidget, dependendo se o estado é 
// gerenciado ou não.

// [3] - class MyApp extends StatelessWidget { ... }
// |-- MyApp é um widget personalizado, neste caso, um StatelessWidget. Widgets que 
// não requerem manutenção de estado interno geralmente herdam de StatelessWidget.
// |-- StatelessWidget é uma classe base para widgets que não requerem estados mutáveis.

// [4] - Método build(BuildContext context)
// |-- Cada widget StatelessWidget deve sobrescrever o método build, que descreve 
// como exibir o widget em termos de outros widgets de nível inferior. O método 
// build retorna um Widget e é chamado sempre que é necessário redesenhar a interface 
// (por exemplo, em mudanças de tamanho, orientação ou tema).
// MaterialApp(...)

// [5] - O MaterialApp é um widget conveniente que envolve vários widgets que são 
// comumente necessários para aplicações de material design. Ele é baseado no 
// WidgetsApp, que por sua vez inclui um Navigator para gerenciar uma pilha de 
// widgets com "telas" e também um Theme para compartilhar cores e estilos 
// tipográficos por todo o aplicativo.
  