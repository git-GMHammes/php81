import 'package:flutter/material.dart';
import 'package:mobiapp2/views/home/home_ods_link.dart';
import 'package:mobiapp2/widgets/text_pattern.dart';

class HomeView extends StatelessWidget {
  const HomeView({super.key});

  @override
  Widget build(BuildContext context) {
    // Este contexto é válido para navegação porque HomeView é chamado por uma rota definida no MaterialApp.
    return Scaffold(
      appBar: AppBar(
        title: const Text('Home (Página Principal)'),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            TextButton(
              onPressed: () {
                Navigator.pushNamed(context, '/estrutura');
              },
              child: const Row(
                mainAxisSize: MainAxisSize.min,
                children: <Widget>[
                  Icon(Icons.settings),
                  SizedBox(width: 8),
                  Text(
                    'Estrutura de Pastas',
                  ),
                ],
              ),
            ),
            Container(
              padding: const EdgeInsets.all(5.0),
              child: Wrap(
                spacing: 5.0,
                runSpacing: 5.0,
                children: <Widget>[
                  Container(
                    padding: const EdgeInsets.all(5.0),
                    child: const HomeOdsLink(),
                  ),
                ],
              ),
            ),
            const SizedBox(height: 40),
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(10),
              margin: const EdgeInsets.all(10),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment
                    .center, // Alinha os filhos ao centro no eixo cruzado
                children: <Widget>[
                  Text('Definição de ODS',
                      softWrap: true,
                      overflow: TextOverflow.clip,
                      textAlign: TextAlign.center,
                      // style: TextPattern.bodyText1,
                      style: TextPattern.subtitle2,
                  ),
                  Text(
                    'Objetivos de Desenvolvimento Sustentável',
                    softWrap: true,
                    overflow: TextOverflow.clip,
                    textAlign: TextAlign.center,
                    style: TextPattern.subtitle2,
                  ),
                  const SizedBox(height: 40),
                  Text(
                    'Os Objetivos de Desenvolvimento Sustentável (ODS) são uma iniciativa global adotada pela Assembleia Geral das Nações Unidas em 2015, como parte de uma agenda mais ampla conhecida como Agenda 2030. Essa agenda inclui 17 objetivos específicos que visam abordar uma ampla gama de questões sociais, econômicas e ambientais que afetam a qualidade de vida das pessoas ao redor do mundo.',
                    softWrap: true,
                    overflow: TextOverflow.clip,
                    textAlign: TextAlign.justify,
                    style: TextPattern.bodyText1,
                  ),
                  const SizedBox(height: 20),
                  Text(
                    'Os ODS foram criados para suceder os Objetivos de Desenvolvimento do Milênio (ODM), expandindo os esforços para incluir mais áreas e integrando de maneira mais profunda a sustentabilidade em todos os aspectos do desenvolvimento. Estes objetivos cobrem áreas como pobreza, fome, saúde, educação, igualdade de gênero, água limpa e saneamento, energia, trabalho digno, crescimento econômico, indústria, infraestrutura, redução das desigualdades, cidades sustentáveis, consumo responsável, mudança climática, vida na água, vida terrestre, paz, justiça e parcerias para alcançar os objetivos.',
                    softWrap: true,
                    overflow: TextOverflow.clip,
                    textAlign: TextAlign.justify,
                    style: TextPattern.bodyText1,
                  ),
                  const SizedBox(height: 20),
                  Text(
                    'A intenção dos ODS é fornecer um roteiro para os países na promoção do bem-estar humano enquanto protegem o planeta. Esses objetivos são interligados, significando que o progresso em um pode influenciar e reforçar o progresso em outros, e são planejados para serem alcançados até o ano de 2030. Eles incentivam uma abordagem colaborativa, na qual tanto os governos quanto o setor privado e a sociedade civil têm papéis vitais a desempenhar.',
                    softWrap: true,
                    overflow: TextOverflow.clip,
                    textAlign: TextAlign.justify,
                    style: TextPattern.bodyText1,
                  ),
                  const SizedBox(height: 20),
                ],
              ),
            ),
            InkWell(
              onTap: () {
                Navigator.pushNamed(context, '/ods');
              },
              child: Image.asset('assets/images/ods/allods.jpg'),
            ), //
          ],
        ),
      ),
    );
  }
}
