import 'package:flutter/material.dart';
 import 'package:mobiapp2/widgets/text_pattern.dart';

void main() {
  runApp(Ods001View());
}

class Ods001View extends StatelessWidget {
  Ods001View({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Erradicação da pobreza'),
          centerTitle: false,
        ),
        body: SingleChildScrollView(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              TextButton(
                onPressed: () {
                  Navigator.pushNamed(context, '/home');
                },
                child: const Row(
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    Icon(Icons.home),
                    SizedBox(width: 8),
                    Text('Retornar à Home'),
                  ],
                ),
              ),
              Center(
                child: Image.asset('assets/images/ods/ods001.png'),
              ),
              Padding(
                padding: const EdgeInsets.all(20.0),
                child: Text(
                  'Objetivo 1. Acabar com a pobreza em todas as suas formas, em todos os lugares',
                  softWrap: true,
                  overflow: TextOverflow.clip,
                  textAlign: TextAlign.center,
                  style: TextPattern.subtitle2,
                ),
              ),
              Wrap(
                children: <Widget>[
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.1 Até 2030, erradicar a pobreza extrema para todas as pessoas em todos os lugares, atualmente medida como pessoas vivendo com menos de US\$ 1,90 por dia',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.2 Até 2030, reduzir pelo menos à metade a proporção de homens, mulheres e crianças, de todas as idades, que vivem na pobreza, em todas as suas dimensões, de acordo com as definições nacionais',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.3 Implementar, em nível nacional, medidas e sistemas de proteção social adequados, para todos, incluindo pisos, e até 2030 atingir a cobertura substancial dos pobres e vulneráveis',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.4 Até 2030, garantir que todos os homens e mulheres, particularmente os pobres e vulneráveis, tenham direitos iguais aos recursos econômicos, bem como o acesso a serviços básicos, propriedade e controle sobre a terra e outras formas de propriedade, herança, recursos naturais, novas tecnologias apropriadas e serviços financeiros, incluindo microfinanças',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.5 Até 2030, construir a resiliência dos pobres e daqueles em situação de vulnerabilidade, e reduzir a exposição e vulnerabilidade destes a eventos extremos relacionados com o clima e outros choques e desastres econômicos, sociais e ambientais',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.a Garantir uma mobilização significativa de recursos a partir de uma variedade de fontes, inclusive por meio do reforço da cooperação para o desenvolvimento, para proporcionar meios adequados e previsíveis para que os países em desenvolvimento, em particular os países menos desenvolvidos, implemen',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      '1.b Criar marcos políticos sólidos em níveis nacional, regional e internacional, com base em estratégias de desenvolvimento a favor dos pobres e sensíveis a gênero, para apoiar investimentos acelerados nas ações de erradicação da pobreza',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.justify,
                      style: TextPattern.bodyText1,
                    ),
                  ),
                  TextButton(
                onPressed: () {
                  Navigator.pushNamed(context, '/home');
                },
                child: const Row(
                  mainAxisSize: MainAxisSize.min,
                  children: <Widget>[
                    Icon(Icons.arrow_back_sharp),
                    SizedBox(width: 8),
                    Text('Retornar à Home'),
                  ],
                ),
              ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}
