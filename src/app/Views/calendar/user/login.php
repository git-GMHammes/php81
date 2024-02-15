<?php
// myPrint($metadata['getURI'], 'src\app\Views\calendar\user\login.php', true);
$login_uri = (isset($metadata['getURI'])) ? ($metadata['getURI']) : (array());
switch ($login_uri) {
    case in_array('login', $login_uri):
        $menu_user = FALSE;
        break;
    case in_array('token', $login_uri):
        $menu_user = FALSE;
        break;
    case in_array('busca', $login_uri):
        $menu_user = FALSE;
        break;
    case in_array('recupera', $login_uri):
        $menu_user = FALSE;
        break;
    default:
        $menu_user = TRUE;
        break;
}
?>
<div class="card mt-2 mb-2 ms-2 me-2">
    <div class="card-header">
        <h5 class="card-title">Usuário/Acesso</h5>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item" id="a_login">
                <a class="<?= (in_array('login', $login_uri) || $menu_user) ? ('nav-link active') : ('nav-link'); ?>" href="<?= base_url() . 'calendar/endpoint/principal/login#a_login'; ?>">Login</a>
            </li>
            <li class="nav-item" id="a_token">
                <a class="<?= (in_array('token', $login_uri)) ? ('nav-link active') : ('nav-link'); ?>" href="<?= base_url() . 'calendar/endpoint/principal/token#a_token'; ?>">Token</a>
            </li>
            <li class="nav-item" id="a_cadastro">
                <a class="<?= (in_array('busca', $login_uri)) ? ('nav-link active') : ('nav-link'); ?>" href="<?= base_url() . 'calendar/endpoint/principal/busca#a_busca'; ?>">Busca</a>
            </li>
            <li class="nav-item" id="a_recupera">
                <a class="<?= (in_array('recupera', $login_uri)) ? ('nav-link active') : ('nav-link'); ?>" href="<?= base_url() . 'calendar/endpoint/principal/recupera#a_recupera'; ?>">Recupera</a>
            </li>
            <?php if (false) : ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (in_array('login', $login_uri) || $menu_user) : ?>
            <div>
                <?= form_open_multipart('calendar/user/api/login', 'class="was-validated"'); ?>
                <div class="mb-3">
                    <label for="cpf" class="form-label">cpf</label>
                    <input type="number" class="form-control" id="cpf" placeholder="00011122233" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="receber" class="form-label">Como deseja receber o Token?</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="recebe_whatsapp" name="shape" required>
                        <label class="form-check-label" for="recebe_whatsapp">Whatsapp</label>
                    </div>
                    <div class="form-check mb-3">
                        <input type="radio" class="form-check-input" id="recebe_mail" name="shape" required>
                        <label class="form-check-label" for="recebe_mail">E-mail</label>
                        <div class="invalid-feedback">Escolha um canal de envio</div>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary" type="submit">Enviar</button>
                </div>
                <?= form_close("&nbsp;"); ?>
            </div>
        <?php endif; ?>
        <?php if (in_array('token', $login_uri)) : ?>
            <div>
                <?= form_open_multipart('calendar/user/api/confirma/token', 'class="was-validated"'); ?>
                <div class="mb-3">
                    <label for="tonen" class="form-label">Token</label>
                    <input type="number" class="form-control" id="tonen" placeholder="123456" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary" type="submit">Enviar</button>
                </div>
                <?= form_close("&nbsp;"); ?>
            </div>
        <?php endif; ?>
        <?php if (in_array('busca', $login_uri)) : ?>
            <div>
                <?= form_open_multipart('calendar/user/api/busca/cadastro', 'class="was-validated"'); ?>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="number" class="form-control" id="cpf" placeholder="00011122233" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary" type="submit">Enviar</button>
                </div>
                <?= form_close("&nbsp;"); ?>
            </div>
        <?php endif; ?>
        <?php if (in_array('recupera', $login_uri)) : ?>
            <div>
                <?= form_open_multipart('calendar/user/api/recupera/acesso', 'class="was-validated"'); ?>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="number" class="form-control" id="cpf" placeholder="00011122233" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="celular" placeholder="21000001111" required>
                    <div class="invalid-feedback">
                        Somente números, 2 digitos para DDD e 9 digitos para o número, sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">E-mail</label>
                    <input type="mail" class="form-control" id="mail" placeholder="login@server.com" required>
                    <div class="invalid-feedback">
                        O E-mail deve possuir ao menos: um login, um "@" e um Servidor.
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary" type="submit">Enviar</button>
                </div>
                <?= form_close("&nbsp;"); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-footer text-right">
        <div class="text-end"><?php myDateSystem('PROES'); ?></div>
    </div>
</div>