import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatefulWidget {
  @override
  _MyAppState createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  bool _showMessage = false; // Estado para controlar a visibilidade da mensagem

  void _toggleMessage() {
    setState(() {
      _showMessage = !_showMessage; // Alterna o estado da visibilidade da mensagem
    });
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        body: Center(
          child: Column(
            mainAxisSize: MainAxisSize.min, // Faz com que a coluna ocupe o espaço mínimo necessário
            children: <Widget>[
              if (_showMessage) // Se o estado _showMessage for verdadeiro, mostra o texto
                const Text(
                  'Olá Mundo',
                  style: TextStyle(fontSize: 24),
                ),
              ElevatedButton(
                onPressed: _toggleMessage, // Chama _toggleMessage quando o botão é pressionado
                child: const Text('Mostrar Mensagem'),
              ),
              ElevatedButton(
                onPressed: _toggleMessage, // Chama _toggleMessage quando o botão é pressionado
                child: const Text('Outra mensagem'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
