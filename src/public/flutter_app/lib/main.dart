import 'package:flutter/material.dart';
import 'package:web_socket_channel/io.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'WebSocket Test',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: WebSocketTestPage(),
    );
  }
}

class WebSocketTestPage extends StatefulWidget {
  @override
  _WebSocketTestPageState createState() => _WebSocketTestPageState();
}

class _WebSocketTestPageState extends State<WebSocketTestPage> {
  late IOWebSocketChannel channel;
  bool isConnected = false;

  @override
  void initState() {
    super.initState();
    // Use the correct IP and port for your WebSocket server.
    channel = IOWebSocketChannel.connect('ws://10.146.84.151:4109');
    channel.stream.listen(
      (message) {
        setState(() {
          isConnected = true; // Update the connection status
        });
        // Process the incoming messages
        print(message);
      },
      onDone: () {
        setState(() {
          isConnected = false; // Update the connection status
        });
      },
      onError: (error) {
        setState(() {
          isConnected = false; // Update the connection status
        });
        print(error.toString());
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('WebSocket Test'),
      ),
      body: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: <Widget>[
          // Status bar indicator
          Container(
            height: 20.0,
            color: isConnected ? Colors.green : Colors.red,
          ),
          // Add more widgets for your app below
        ],
      ),
    );
  }

  @override
  void dispose() {
    channel.sink.close();
    super.dispose();
  }
}
