<!DOCTYPE html>
<html lang="pt-BR">
<!-- app/Views/template/main.php -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="<?php // base_url() . "assets/leaflet/leaflet.js"; 
                        ?>"></script> -->
    <!-- dataTables -->
    <!-- <link rel="stylesheet" href="<?php // base_url() . "assets/dataTables/jquery.dataTables.min.css" 
                                        ?>" /> -->
    <!-- <script src="<?php // base_url() . "assets/dataTables/jquery.dataTables.min.js" 
                        ?>"></script> -->
    <!-- <link rel="stylesheet" href="<?php // base_url() . "assets/dataTables/dataTables.bootstrap5.min.css" 
                                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/dataTables/dataTables.bootstrap5.min.js" 
                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/dataTables/buttons.bootstrap5.min.js" 
                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/dataTables/dataTables.buttons.min.js" 
                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/dataTables/dataTables.select.min.js" 
                        ?>"></script> -->
    <!-- JQuery 3.6.0 Offline -->
    <!-- <script src="<?php // base_url() . 'assets/jquery/jquery-3.6.2.min.js' 
                        ?>"></script> -->
    <!-- Calendário Offline -->
    <!-- <script src="<?php // base_url() . "assets/fullcalendar/jquery-3.6.0.min.js"; 
                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/fullcalendar/moment.min.js"; 
                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/fullcalendar/fullcalendar.min.js"; 
                        ?>"></script> -->
    <!-- <script src="<?php // base_url() . "assets/fullcalendar/pt-br.js"; 
                        ?>"></script> -->
    <!-- <link rel="stylesheet" href="<?php // base_url() . "assets/fullcalendar/fullcalendar.min.css" 
                                        ?>" /> -->
    <!-- Reservado FrontEnd -->
    <!-- <link rel="stylesheet" href="<?php // base_url() . "assets/css/style.css" 
                                        ?>" /> -->
    <!-- <script src="<?php // base_url().'ajaxptbr'; 
                        ?>"></script> -->
    <!-- <link href="https://use.fontawesome.com/62e43a72a9.css" media="all" rel="stylesheet"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">? -->
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <!--  -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <!-- Personalização FrontEnd -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/reset.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/style.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/react_style.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/react_carrossel.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/css/adm.css'; ?>">
    <script defer="" src="<?= base_url() . 'assets/js/sliderIndex.js'; ?>"></script>
    <script defer="" src="<?= base_url() . 'assets/js/js.js'; ?>"></script>

    <!-- Fontes e Ícones -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

    <!-- React -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Ícones FontAwesome -->
    <script src="https://use.fontawesome.com/62e43a72a9.js"></script>

    <!-- Scripts Personalizados -->
    <script defer="" src="<?= base_url() . 'assets/js/sliderIndex.js'; ?>"></script>
    <script defer="" src="<?= base_url() . 'assets/js/js.js'; ?>"></script>
    
    <!-- Acessibilidade -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    
    <title><?= isset($page_title) ? ($page_title) : (' DEGASE '); ?></title>
</head>

<body>
   
    <header>
        <!-- <h1>Template Principal</h1> -->
        <?php (DEBUG_MY_PRINT) ? (myPrint('src\app\Views\meet\template\main.php', 'Line: 14', true)) : (NULL); ?>
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
        <!-- <p>&copy; 2023 PRODERJ. Todos os direitos reservados.</p> -->
        <?php
        include_once('script/util/abrir_popup.php');
        include_once('script/util/timer.php');
        include_once('script/react_comunicado.php');
        include_once('script/react_carrossel.php');
        ?>
    </footer>
</body>

</html>