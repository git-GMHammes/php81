import 'package:flutter/material.dart';
import 'package:web_socket_channel/web_socket_channel.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: WebSocketTest(),
    );
  }
}

class WebSocketTest extends StatefulWidget {
  @override
  _WebSocketTestState createState() => _WebSocketTestState();
}

class _WebSocketTestState extends State<WebSocketTest> {
  WebSocketChannel? channel;
  Color connectionColor = Colors.red;
  String connectionMessage = "Falha ao conectar ao websocket";

  @override
  void initState() {
    super.initState();
    _connect();
  }

  void _connect() {
    try {
      channel = WebSocketChannel.connect(
        Uri.parse('ws://10.146.84.151:4109'),
        // Uri.parse('ws://10.0.2.2:4109'),
      );
      channel!.stream.listen(
        (message) {
          setState(() {
            connectionColor = Colors.green;
            connectionMessage = "Conexão websocket realizada com sucesso";
          });
        },
        onDone: () {
          // called when the connection is closed
          setState(() {
            connectionColor = Colors.red;
            connectionMessage = "Falha ao conectar ao websocket";
          });
        },
        onError: (error) {
          print(error.toString());
          // called when there is an error
          setState(() {
            connectionColor = Colors.red;
            connectionMessage = "Falha ao conectar ao websocket";
          });
        },
      );
    } catch (e) {
      setState(() {
        connectionColor = Colors.red;
        connectionMessage = "Falha ao conectar ao websocket";
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('WebSocket Test'),
      ),
      body: Container(
        color: connectionColor,
        child: Center(
          child: Text(connectionMessage),
        ),
      ),
    );
  }

  @override
  void dispose() {
    channel?.sink.close();
    super.dispose();
  }
}
