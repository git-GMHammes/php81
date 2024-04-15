void main() {
  String? nomeNulo;
  String nomeVazio = '';

  String nome = nomeNulo ?? "Nome padrão";
  print(nome); // Saída: Nome padrão

  // ignore: unnecessary_null_comparison
  if (nomeVazio == null) {
    print("O nome é nulo");
  } else {
    print("O nome é $nomeVazio");
  }
// Saída: O nome é 
}
