<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Incluindo React e ReactDOM via CDN -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <!-- Incluindo Babel para interpretar JSX -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <title>Teste React</title>
</head>

<body>
    <header>
        <h1>Cabeçalho do Site</h1>
    </header>

    <main>
        <?php
        myPrint($metadata, 'src\app\Views\react\template\main.php', true);
        ?>
        <?= view('react/react_recebe_api');?>
    </main>

    <footer>
        <p>Rodapé do Site</p>
    </footer>

</body>

</html>