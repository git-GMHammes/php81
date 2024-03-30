import 'package:flutter/material.dart';

void main_001() => runApp(const SimpleApp());

class SimpleApp extends StatelessWidget {
  const SimpleApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: Center(
          child: Text('Olá, Flutter!'),
        ),
      ),
    );
  }
}
