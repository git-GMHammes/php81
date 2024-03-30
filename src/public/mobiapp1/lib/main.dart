import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'dart:developer' as developer;

void log(String message, {dynamic error}) {
  developer.log(message, name: 'meu_app_flutter', error: error);
}

void main() => runApp(const MainAppData());

class MainAppData extends StatelessWidget {
  const MainAppData({super.key});

  // Função para buscar os dados da API
  Future<Map<String, dynamic>> fetchData() async {
    final response = await http
        .get(Uri.parse('http://10.0.2.2:4107/dadospessoais/api/exibir'));

    // Use a função de log em vez de print para a depuração
    developer.log('Status Code: ${response.statusCode}', name: 'API');
    developer.log('Response Body: ${response.body}', name: 'API');

    if (response.statusCode == 200) {
      try {
        // Tentativa de decodificar a resposta como JSON
        return json.decode(response.body);
      } on FormatException catch (e) {
        // Se houver um FormatException, usa o método de log
        developer.log('The API did not return a JSON.', error: e, name: 'API');
        // Pode retornar um mapa vazio ou tratar de acordo
        return {};
      }
    } else {
      // Se o servidor não retornar uma resposta OK, lança um erro
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
          // Aqui está o FutureBuilder atualizado
          child: FutureBuilder<Map<String, dynamic>>(
            future: fetchData(), // a Future<Map<String, dynamic>> ou null
            builder: (context, snapshot) {
              if (snapshot.connectionState == ConnectionState.waiting) {
                // Enquanto espera pelos dados, mostra um indicador de carregamento
                return const CircularProgressIndicator();
              } else if (snapshot.hasError) {
                // Se ocorrer um erro ao buscar os dados, mostra uma mensagem de erro
                return Text('Error: ${snapshot.error}');
              } else if (snapshot.hasData) {
                // Quando os dados forem recebidos com sucesso, renderiza-os aqui
                // Aqui você pode personalizar a exibição dos dados
                return Text('Dados recebidos: ${snapshot.data.toString()}');
              } else {
                // Se não houver dados, mostra uma mensagem indicando isso
                return const Text('Nenhum dado disponível');
              }
            },
          ),
        ),
      ),
    );
  }
}
