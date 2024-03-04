<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulação de Arrays</title>
</head>
<body>
    <script>
        // Criando um array com alguns números
        let numbers = [1, 2, 3, 4, 5];

        // Usando o método map() para dobrar cada número no array
        let doubledNumbers = numbers.map(num => num * 2);

        // Exibindo o array original e o array com os números dobrados
        console.log("Array Original:", numbers);
        console.log("Array com Números Dobrados:", doubledNumbers);
    </script>
</body>
</html>
