import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'dart:developer' as developer;

void log(String message, {dynamic error}) {
  developer.log(message, name: 'meu_app_flutter', error: error);
}

void main_003() => runApp(const MainAppData());

class MainAppData extends StatelessWidget {
  const MainAppData({super.key});

  Future<Map<String, dynamic>> fetchData() async {
    final response = await http
        .get(Uri.parse('http://192.168.0.113:4107/dadospessoais/api/exibir'));

    developer.log('Status Code: ${response.statusCode}', name: 'API');
    developer.log('Response Body: ${response.body}', name: 'API');

    if (response.statusCode == 200) {
      try {
        return json.decode(response.body);
      } on FormatException catch (e) {
        developer.log('The API did not return a JSON.', error: e, name: 'API');

        return {};
      }
    } else {
      throw Exception(
          'Failed to load data with status code: ${response.statusCode}');
    }
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Dados da API'),
        ),
        body: Center(
          child: FutureBuilder<Map<String, dynamic>>(
            future: fetchData(),
            builder: (context, snapshot) {
              if (snapshot.connectionState == ConnectionState.waiting) {
                return const CircularProgressIndicator();
              } else if (snapshot.hasError) {
                return Text('Error: ${snapshot.error}');
              } else if (snapshot.hasData) {
                String prettyJson =
                    const JsonEncoder.withIndent('  ').convert(snapshot.data);

                return SingleChildScrollView(
                  child: SelectableText(
                    prettyJson,
                    style: const TextStyle(
                      fontFamily: 'SourceCodePro',
                      fontSize: 14.0,
                    ),
                  ),
                );
              } else {
                return const Text('Nenhum dado disponível');
              }
            },
          ),
        ),
      ),
    );
  }
}
