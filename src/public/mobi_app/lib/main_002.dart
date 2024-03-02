// Importação do pacote material design que fornece widgets que seguem as diretrizes de material design do Google.
import 'package:flutter/material.dart';

// Função principal que é o ponto de entrada para todos os aplicativos Flutter.
void main() {
  runApp(const MyApp()); // Chama a função runApp com a instância do seu aplicativo, que é um widget.
}

// MyApp é um widget sem estado que representa o aplicativo em si.
class MyApp extends StatelessWidget {
  // Construtor constante que aceita uma chave opcional.
  const MyApp({super.key});
  @override
  // Método que constrói o widget. Contexto é um identificador para o local do widget na árvore de widgets.
  Widget build(BuildContext context) {
    // MaterialApp é um widget de nível superior que envolve vários widgets que são comumente necessários para aplicativos material design.
    return MaterialApp(
      title: 'Flutter Demo', // Título do aplicativo, usado na tarefa do switcher e por acessibilidade.
      theme: ThemeData(
        // ThemeData define as cores e estilos visuais do aplicativo.
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple), // Esquema de cores baseado na cor deepPurple.
        useMaterial3: true, // Ativa recursos do Material Design 3.
      ),
      home: const MyHomePage(title: 'Flutter Demo Home Page'), // Define a tela inicial do aplicativo.
    );
  }
}

// MyHomePage é um widget com estado que representa a página inicial do seu aplicativo.
class MyHomePage extends StatefulWidget {
  // Construtor constante que aceita uma chave opcional e um título requerido.
  const MyHomePage({super.key, required this.title});
  final String title; // Título para ser usado na barra de aplicativos.

  @override
  // Método que cria o estado para o widget.
  State<MyHomePage> createState() => _MyHomePageState();
}

// _MyHomePageState é a classe que contém o estado para o widget MyHomePage.
class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0; // Variável de estado que mantém a contagem de quantas vezes o botão foi pressionado.

  void _incrementCounter() {
    // Método que incrementa o contador.
    setState(() {
      _counter++; // Atualiza a variável _counter.
    }); // setState notifica o framework que o estado mudou e o widget deve ser reconstruído.
  }

  @override
  // Método que constrói o widget com o estado atual.
  Widget build(BuildContext context) {
    // Scaffold é um layout para a maioria dos materiais de design dos widgets, que provê uma estrutura básica.
    return Scaffold(
      appBar: AppBar(
        // AppBar é uma barra de aplicativos material design.
        backgroundColor: Theme.of(context).colorScheme.inversePrimary, // Define a cor de fundo da AppBar.
        title: Text(widget.title), // Exibe o título na AppBar.
      ),
      body: Center(
        // Centraliza os widgets filho.
        child: Column(
          // Column é um widget de layout para posicionar filhos verticalmente.
          mainAxisAlignment: MainAxisAlignment.center, // Alinha os filhos ao centro no eixo principal (vertical).
          children: <Widget>[
            const Text(
              'You have pushed the button this many times:', // Texto estático.
            ),
            Text(
              '$_counter', // Texto que exibe o valor atual do contador.
              style: Theme.of(context).textTheme.headlineMedium, // Estilo do texto, obtido do tema atual.
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        // Botão de ação flutuante que, quando pressionado, chama _incrementCounter.
        onPressed: _incrementCounter,
        tooltip: 'Increment', // Texto de dica que explica o que o botão faz.
        child: const Icon(Icons.add), // Ícone de adição exibido dentro do botão.
      ),
    );
  }
}
