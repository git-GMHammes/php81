// Importa a biblioteca Material Design do Flutter.
import 'package:flutter/material.dart';

// Função principal que inicia o aplicativo Flutter.
void main() => runApp(const GustavoApp());

// Define a classe GustavoApp, que é um widget sem estado.
class GustavoApp extends StatelessWidget {
  // Construtor da classe GustavoApp. `super.key` permite que widgets identifiquem
  // de forma única este widget dentro da árvore de widgets.
  const GustavoApp({super.key});

  // Sobrescreve o método build para desenhar a interface do widget.
  @override
  Widget build(BuildContext context) {
    // Retorna o MaterialApp, o ponto de partida para uma aplicação Material Design.
    return const MaterialApp(
      // Define o widget inicial para a aplicação usando Scaffold, que oferece
      // uma estrutura básica para a tela, incluindo AppBar, Drawer, BottomNavigationBar, etc.
      home: Scaffold(
        // Define o corpo do Scaffold. Center é um widget que centraliza seu filho.
        body: Center(
          // Cria um widget Text, que exibe a string 'Gustavo'.
          child: Text('Gustavo'),
        ),
      ),
    );
  }
}