import 'package:flutter/material.dart';
import 'package:web_socket_channel/web_socket_channel.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  final WebSocketChannel channel = WebSocketChannel.connect(
    Uri.parse('ws://189.126.105.136:4109'),
  );

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: PreferredSize(
          preferredSize: Size.fromHeight(120),
          child: AppBar(
            elevation: 0,
            backgroundColor: Colors.transparent,
            flexibleSpace: SafeArea(
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: <Widget>[
                  Image.asset(
                    'assets/proderj_title.jpg',
                    height: 80,
                    fit: BoxFit.fitHeight,
                  ),
                  SizedBox(height: 8),
                  // Texto "Fala PRODERJ"
                  Text(
                    'Fala PRODERJ',
                    style: TextStyle(
                      fontSize: 20,
                    ),
                  ),
                ],
              ),
            ),
          ),
        ),
        body: _WebSocketDemo(channel: channel),
      ),
    );
  }
}

class _WebSocketDemo extends StatefulWidget {
  final WebSocketChannel channel;

  const _WebSocketDemo({Key? key, required this.channel}) : super(key: key);

  @override
  _WebSocketDemoState createState() => _WebSocketDemoState();
}

class _WebSocketDemoState extends State<_WebSocketDemo> {
  final TextEditingController _controller = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: <Widget>[
        Expanded(
          child: StreamBuilder(
            stream: widget.channel.stream,
            builder: (context, snapshot) {
              return Text(snapshot.hasData ? '${snapshot.data}' : '');
            },
          ),
        ),
        TextField(
          controller: _controller,
          decoration: const InputDecoration(filled: true, labelText: 'Envie sua mensagem'),
          onSubmitted: _sendMessage,
        ),
      ],
    );
  }

  void _sendMessage(String text) {
    if (text.isNotEmpty) {
      widget.channel.sink.add(text);
      _controller.clear();
    }
  }

  @override
  void dispose() {
    widget.channel.sink.close();
    super.dispose();
  }
}