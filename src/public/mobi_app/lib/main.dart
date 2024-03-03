import 'dart:async';

import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';

void main() => runApp(const GustavoApp());

class GustavoApp extends StatefulWidget {
  const GustavoApp({super.key});

  @override
  State<GustavoApp> createState() => _GustavoAppState();
}

class _GustavoAppState extends State<GustavoApp> {
  String _location = 'Buscando localização...';
  Timer? _timer;

  @override
  void initState() {
    super.initState();
    _getLocation();
    _timer = Timer.periodic(const Duration(seconds: 10), (timer) {
      _getLocation();
    });
  }

  Future<void> _getLocation() async {
    bool serviceEnabled;
    LocationPermission permission;

    serviceEnabled = await Geolocator.isLocationServiceEnabled();
    if (!serviceEnabled) {
      setState(() {
        _location = 'Serviços de localização desabilitados.';
      });
      return;
    }

    permission = await Geolocator.checkPermission();
    if (permission == LocationPermission.denied) {
      permission = await Geolocator.requestPermission();
      if (permission == LocationPermission.denied) {
        setState(() {
          _location = 'Permissão de localização negada.';
        });
        return;
      }
    }
    
    if (permission == LocationPermission.deniedForever) {
      setState(() {
        _location = 'Permissão de localização negada permanentemente.';
      });
      return;
    } 

    final position = await Geolocator.getCurrentPosition();
    setState(() {
      _location = 'Lat: ${position.latitude}, Long: ${position.longitude}';
    });
  }

  @override
  void dispose() {
    _timer?.cancel();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        body: Center(
          child: Text(_location),
        ),
      ),
    );
  }
}
