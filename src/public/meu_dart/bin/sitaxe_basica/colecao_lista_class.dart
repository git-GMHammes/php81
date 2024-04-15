void main() {
  // Lista de produtos com nome, preço e descrição
  List<Product> products = [
    Product(
        name: "Camisa", price: 29.90, description: "Camisa verde de algodão"),
    Product(
        name: "Calça", price: 59.90, description: "Calça jeans azul escura"),
    Product(name: "Tênis", price: 199.90, description: "Tênis esportivo preto"),
  ];

  // Acessando um produto específico por índice
  // Imprime "Calça"
  print(products[1].name);

  // Adicionando um novo produto à lista
  products.add(Product(
      name: "Boné", price: 35.00, description: "Boné de baseball cinza"));

  // Imprime "35.0"
  print(products[3].price);
}

class Product {
  String name;
  double price;
  String description;

  Product({required this.name, required this.price, required this.description});
}
