<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções de Callback</title>
</head>

<body>
    <script>
        // Função que recebe um callback
        function getUserData(callback) {
            var user = {
                name: "João",
                age: 30
            };
            callback(user); // Chamando o callback com os dados do usuário
        }

        // Função callback para exibir os dados do usuário
        function displayUserData(user) {
            console.log("Nome:", user.name);
            console.log("Idade:", user.age);
        }

        // Chamando a função com o callback
        getUserData(displayUserData);
    </script>
</body>

</html>