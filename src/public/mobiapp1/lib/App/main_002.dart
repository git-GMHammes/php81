// Importa o pacote Flutter Material Design, que oferece uma ampla gama de widgets
// seguindo as diretrizes de design do Material Design.
import 'package:flutter/material.dart';

// O ponto de entrada para todos os aplicativos Flutter.
// A função main() é onde o programa começa a execução.
void main_002() => runApp(const SimpleApp());

// A classe SimpleApp estende StatelessWidget, que é a base para widgets que não armazenam estados mutáveis.
// StatelessWidget é uma classe que descreve parte da interface do usuário independente de qualquer estado.
class SimpleApp extends StatelessWidget {
  // Construtor constante da classe SimpleApp, com um parâmetro opcional key.
  // 'Key?' significa que a chave é opcional e pode ser nula.
  // 'super(key: key)' passa a chave para a classe base.
  const SimpleApp({super.key});
  // Método build que é chamado pelo framework para desenhar o widget na tela.
  // 'BuildContext context' é um handle para a localização de um widget na árvore de widgets.
  @override
  Widget build(BuildContext context) {
    // Use 'const' para criar uma instância constante de MaterialApp.
    // Isso significa que o MaterialApp e sua configuração não mudarão ao longo do tempo.
    return const MaterialApp(
      // Scaffold é a estrutura básica que fornece o layout padrão para a aplicação.
      // Adicionar 'const' significa que o layout básico (sem os elementos dinâmicos) não precisa ser reconstruído.
      home: Scaffold(
        // Center também é imutável, então pode ser constante.
        // Isso garante que a posição e configuração do Center não precisam ser reconstruídas.
        body: Center(
          // O widget Text é imutável com um texto estático, mportanto, também pode ser constante.
          child: Text('Olá, Flutter!'),
        ),
      ),
    );
  }
}
