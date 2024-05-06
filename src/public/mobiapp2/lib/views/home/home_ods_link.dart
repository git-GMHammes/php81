import 'package:flutter/material.dart';

class HomeOdsLink extends StatelessWidget {
  const HomeOdsLink({super.key});

  @override
  Widget build(BuildContext context) {
    return Wrap(
      spacing: 5.0,
      runSpacing: 5.0,
      children: List.generate(17, (index) => _buildInkWell(context, index + 1)),
    );
  }

  Widget _buildInkWell(BuildContext context, int index) {
    String indexFormatted = index.toString().padLeft(3, '0');

    return InkWell(
      onTap: () {
        // Navigator.pushNamed(context, '/ods001');
        Navigator.pushNamed(context, '/ods$indexFormatted');
      },
      child: Container(
        width: 63,
        height: 63,
        margin: const EdgeInsets.only(bottom: 1.0, right: 1.0),
        child: Image.asset('assets/images/ods/ods$indexFormatted.png', fit: BoxFit.contain),
      ),
    );
  }
}
