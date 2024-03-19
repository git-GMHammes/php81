<!DOCTYPE html>
<html lang="pt-BR">
<!-- app/Views/template/main.php -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title><?= isset($metadata['page_title']) ? ($metadata['page_title']) : (' DEGASE '); ?></title>
</head>

<body>
    <header>
        <!-- Acessibilidade -->
        <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>
        <!-- <h1>Template Principal</h1> -->
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
        <!-- React e ReactDOM via CDN -->
        <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
        <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

        <!-- Babel via CDN -->
        <script src="https://unpkg.com/@babel/standalone@7.12.10/babel.min.js"></script>

        <!-- CKEditor via CDN -->
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <!-- Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <!-- <p>&copy; 2023 PRODERJ. Todos os direitos reservados.</p> -->
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
            new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
    </footer>
</body>

</html>

