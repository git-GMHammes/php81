<?php
$result = (isset($result)) ? ($result) : (array());
?>
<!DOCTYPE html>
<html lang="en">
<!-- src\app\Views\dadospessoais\react\calendar\main.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Responsivo</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- React e ReactDOM CDN -->
    <script src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <!-- Babel CDN -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
</head>

<body>
    <header>
        <div class="mt-4 mb-4 ms-4 me-4">
            <h1>PROES - Protótipo de Cadastro e Registro</h1>
        </div>
    </header>
    <main>
        <?php if ($loadView !== array()) : ?>
            <?php foreach ($loadView as $getView) : ?>
                <?php
                echo view($getView);
                ?>
            <?php endforeach ?>
        <?php else : ?>
            <h1>Não foi passado nenhma view!</h1>
        <?php endif ?>
    </main>
    <footer>
        <?php include_once('react/calendar.php'); ?>
    </footer>
</body>

</html>