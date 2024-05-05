import 'package:flutter/material.dart';
import 'package:web_socket_channel/io.dart';
import 'package:web_socket_channel/web_socket_channel.dart';

class WebSocketPage extends StatefulWidget {
  const WebSocketPage({super.key});

  @override
  WebSocketPageState createState() => WebSocketPageState();
}

class WebSocketPageState extends State<WebSocketPage> {
  late WebSocketChannel channel;
  String connectionStatus = 'Aguardando teste...';
  Color statusColor = Colors.grey;

  void _testWebSocket() {
    try {
      channel = IOWebSocketChannel.connect('ws://10.146.84.151:4109');

      channel.stream.listen(
        (message) {
          // ignore: avoid_print
          print(
              'Mensagem recebida: $message'); // Confirme que esta linha é alcançada.
          setState(() {
            connectionStatus = 'Conectado';
            statusColor = Colors.green;
          });
        },
        onDone: () {
          setState(() {
            connectionStatus = 'Conexão fechada';
            statusColor = Colors.red;
          });
        },
        onError: (error) {
          // ignore: avoid_print
          print('Erro no WebSocket: $error');
          setState(() {
            connectionStatus = 'Erro na conexão';
            statusColor = Colors.red;
          });
        },
      );

      // Se você quer que o Flutter envie uma mensagem assim que conectar:
      channel.sink.add('Olá, servidor!'); // Envie uma mensagem para o servidor.
    } catch (e) {
      // ignore: avoid_print
      print('Exceção ao conectar ao WebSocket: $e');
      setState(() {
        connectionStatus = 'Exceção na conexão';
        statusColor = Colors.red;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('WebSocket Test'),
        bottom: PreferredSize(
          preferredSize: const Size.fromHeight(20.0),
          child: Container(
            color: statusColor,
            height: 20.0,
            child: Center(
              child: Text(
                connectionStatus,
                style: const TextStyle(
                  color: Colors.white,
                  fontSize: 14,
                ),
              ),
            ),
          ),
        ),
      ),
      body: Center(
        child: ElevatedButton(
          onPressed: _testWebSocket,
          child: const Text('Testar Conexão WebSocket'),
        ),
      ),
    );
  }

  @override
  void dispose() {
    channel.sink.close();
    super.dispose();
  }
}
