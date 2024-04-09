// Importações de pacotes necessários para construir o aplicativo.
import 'package:flutter/material.dart'; // UI framework
import 'dart:convert'; // Para codificação e decodificação de JSON
import 'package:http/http.dart' as http; // Para fazer solicitações HTTP
import 'dart:developer' as developer; // Para funções avançadas de log

// Função log personalizada que utiliza o 'developer.log' para melhores práticas de log.
void log(String message, {dynamic error}) {
  developer.log(message, name: 'meu_app_flutter', error: error);
}

// Ponto de entrada principal do aplicativo.
void main_004() => runApp(const MainAppData());

// A classe MainAppData define a estrutura principal do aplicativo.
class MainAppData extends StatelessWidget {
  // Construtor constante para garantir imutabilidade onde possível.
  const MainAppData({super.key});

  // Função assíncrona que recupera dados de uma API.
  Future<Map<String, dynamic>> fetchData() async {
    // Fazendo uma solicitação GET para a API e esperando pela resposta.
    final response = await http
        .get(Uri.parse('http://192.168.0.113:4107/dadospessoais/api/exibir'));

    // Registrando o status code e a resposta do corpo para depuração.
    developer.log('Status Code: ${response.statusCode}', name: 'API');
    developer.log('Response Body: ${response.body}', name: 'API');

    // Verificação de status code 200 OK para processar a resposta.
    if (response.statusCode == 200) {
      try {
        // Decodificando o corpo da resposta de JSON para um Mapa do Dart.
        return json.decode(response.body);
      } on FormatException catch (e) {
        // Log de erro se o corpo da resposta não for JSON válido.
        developer.log('The API did not return a JSON.', error: e, name: 'API');
        // Retorna um mapa vazio em caso de erro.
        return {};
      }
    } else {
      // Lança uma exceção se o status code não for 200.
      throw Exception(
          'Failed to load data with status code: ${response.statusCode}');
    }
  }

  // Método build que constrói a interface do usuário.
  @override
  Widget build(BuildContext context) {
    // MaterialApp é o widget raiz para um aplicativo Flutter.
    return MaterialApp(
      home: Scaffold(
        // AppBar para mostrar um título na parte superior.
        appBar: AppBar(
          title: const Text('Dados da API'),
        ),
        // Center para centralizar o conteúdo do corpo.
        body: Center(
          // FutureBuilder que lida com a chamada assíncrona e reconstrução do widget.
          child: FutureBuilder<Map<String, dynamic>>(
            // Chamada da função fetchData como uma Future para o FutureBuilder.
            future: fetchData(),
            // Construindo widgets com base no estado da Future.
            builder: (context, snapshot) {
              // Se esperando por dados, mostra um indicador de progresso.
              if (snapshot.connectionState == ConnectionState.waiting) {
                return const CircularProgressIndicator();
                // Se a Future completou com erro, mostra o erro.
              } else if (snapshot.hasError) {
                return Text('Error: ${snapshot.error}');
                // Se a Future completou com dados, processa e exibe os dados.
              } else if (snapshot.hasData) {
                // Convertendo dados para um JSON bonito e formatado.
                String prettyJson =
                    const JsonEncoder.withIndent('  ').convert(snapshot.data);
                // Permite rolagem e seleção de texto.
                return SingleChildScrollView(
                  child: SelectableText(
                    prettyJson,
                    // Aplica uma fonte de largura fixa para melhor legibilidade do JSON.
                    style: const TextStyle(
                      fontFamily: 'SourceCodePro',
                      fontSize: 14.0,
                    ),
                  ),
                );
                // Se não houver dados, mostra uma mensagem indicando isso.
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
