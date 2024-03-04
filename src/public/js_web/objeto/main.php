<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulação de Objetos</title>
</head>

<body>
    <script>
        // Criando um objeto representando um estudante
        let student = {
            name: "João",
            age: 20,
            grades: {
                math: 90,
                science: 85,
                history: 95
            }
        };

        // Adicionando uma nova propriedade ao objeto estudante
        student.location = "São Paulo";

        // Exibindo o objeto estudante antes e depois da modificação
        console.log("Objeto Estudante Original:", student);

        // Removendo a propriedade "age" do objeto estudante
        delete student.age;

        // Exibindo o objeto estudante após a remoção da propriedade "age"
        console.log("Objeto Estudante após Remoção da Idade:", student);
    </script>
</body>

</html>