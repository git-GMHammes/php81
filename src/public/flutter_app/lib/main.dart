import 'package:flutter/material.dart';
import 'package:web_socket_channel/web_socket_channel.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  final WebSocketChannel channel = WebSocketChannel.connect(
    Uri.parse('ws://127.0.0.1:4109'),
  );

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('WebSocket Test'),
        ),
        body: WebSocketTest(channel: channel),
      ),
    );
  }
}

class WebSocketTest extends StatefulWidget {
  final WebSocketChannel channel;

  const WebSocketTest({Key? key, required this.channel}) : super(key: key);

  @override
  WebSocketTestState createState() => WebSocketTestState();
}

class WebSocketTestState extends State<WebSocketTest> {
  bool isConnected = false;

  @override
  void initState() {
    super.initState();
    widget.channel.stream.listen(
      (_) {
        if (mounted) setState(() => isConnected = true);
      },
      onDone: () {
        if (mounted) setState(() => isConnected = false);
      },
      onError: (_) {
        if (mounted) setState(() => isConnected = false);
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Column(
        children: [
          Container(
            height: 20.0, // Height set to 20 pixels, approximately 5mm.
            color: isConnected ? Colors.green : Colors.red,
          ),
          // ... other widgets, if needed
        ],
      ),
    );
  }

  @override
  void dispose() {
    widget.channel.sink.close();
    super.dispose();
  }
}
