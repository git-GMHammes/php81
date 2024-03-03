import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';

void main() => runApp(const GustavoApp());

class GustavoApp extends StatelessWidget {
  const GustavoApp({super.key});

  @override
Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: WebView(
          initialUrl: 'https://intranet.degase.rj.gov.br/intranet/principal/endpoint/exibir',
          javascriptMode: JavascriptMode.unrestricted,
        ),
      ),
    );
  }
}
