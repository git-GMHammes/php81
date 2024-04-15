import 'dart:io';

Future<void> readFile(String filePath) async {
  try {
    var file = File(filePath);

    // Informando o usuário que a leitura do arquivo está em progresso
    print('Aguarde, lendo o arquivo...');

    // Usando await para esperar pela operação de leitura completar
    String contents = await file.readAsString();

    // Adicionando um delay de 3 segundos para simular demora
    await Future.delayed(Duration(seconds: 2));

    print('Conteúdo do arquivo:');
    print(contents);
  } catch (e) {
    // Captura de erros em caso de problemas na leitura do arquivo
    print('Ocorreu um erro ao ler o arquivo: $e');
  }
}

void main() async {
  // Especifique o caminho do arquivo
  String filePath = 'caminho_para_o_arquivo.txt';

  // Chamada da função readFile
  await readFile(filePath);
}
