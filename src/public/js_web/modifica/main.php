<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulação do DOM</title>
</head>

<body>

    <!-- Criando um parágrafo com um ID -->
    <p id="demo">Este é um parágrafo.</p>
    

    <!-- Script JavaScript -->
    <script>
        // Selecionando o parágrafo pelo ID
        var paragraph = document.getElementById('demo');

        // Modificando o conteúdo do parágrafo
        paragraph.innerHTML = 'Este parágrafo foi modificado com JavaScript!';
    </script>

</body>

</html>