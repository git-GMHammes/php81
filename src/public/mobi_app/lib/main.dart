import 'package:flutter/material.dart';

void main() => runApp(const GustavoApp());

class GustavoApp extends StatelessWidget {
  const GustavoApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: Center(
          child: Text('Gustavo'),
        ),
      ),
    );
  }
}
