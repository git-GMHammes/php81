<?php
// myPrint($metadata['getURI'], 'src\app\Views\calendar\user\login.php', true);
$cadastro_uri = (isset($metadata['getURI'])) ? ($metadata['getURI']) : (array());
switch ($cadastro_uri) {
    case in_array('plantao', $cadastro_uri):
        $menu_cadastro = FALSE;
        break;
    case in_array('candidato', $cadastro_uri):
        $menu_cadastro = FALSE;
        break;
    default:
        $menu_cadastro = TRUE;
        break;
}
#
if (session()->get('token_csrf')) {
    $token_csrf = session()->get('token_csrf');
    // myPrint($apiSession, '', true);
} else {
    $token_csrf = NULL;
}
?>
<div class="card mt-2 mb-2 ms-2 me-2">
    <div class="card-header">
        <h5 class="card-title">Cadastro</h5>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item" id="a_plantao">
                <a class="<?= (in_array('plantao', $cadastro_uri) || $menu_cadastro) ? ('nav-link active') : ('nav-link'); ?>" href="<?= base_url() . 'calendar/endpoint/principal/plantao#a_plantao'; ?>">Plantão</a>
            </li>
            <li class="nav-item" id="a_candidato">
                <a class="<?= (in_array('candidato', $cadastro_uri)) ? ('nav-link active') : ('nav-link'); ?>" href="<?= base_url() . 'calendar/endpoint/principal/candidato#a_candidato'; ?>">Candidato</a>
            </li>
            <?php if (false) : ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (in_array('plantao', $cadastro_uri) || $menu_cadastro) : ?>
            <div>
                <?= form_open_multipart('calendar/calendario/api/plantao', 'class="was-validated"'); ?>
                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" class="form-control" id="data" name="data" placeholder="<?= date('Y-m-d'); ?>" required>
                    <div class="invalid-feedback">
                        <div class="row mt-0 g-2">
                            <!-- Coluna para a hora -->
                            <div class="col-6">
                                <select class="form-select" required id="hora" name="hora" aria-label="Selecione a hora">
                                    <option value="">Hora</option>
                                    <?php for ($i = 0; $i < 24; $i++) : ?>
                                        <option value="<?= str_pad($i, 2, "0", STR_PAD_LEFT); ?>">
                                            <?= str_pad($i, 2, "0", STR_PAD_LEFT); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <!-- Coluna para o minuto -->
                            <div class="col-6">
                                <select class="form-select" required id="minuto" name="minuto" aria-label="Selecione o minuto">
                                    <option value="">Minuto</option>
                                    <?php for ($i = 0; $i < 60; $i++) : ?>
                                        <option value="<?= str_pad($i, 2, "0", STR_PAD_LEFT); ?>">
                                            <?= str_pad($i, 2, "0", STR_PAD_LEFT); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        Selecione uma data e hora para o plantão.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="fullname" placeholder="Nome Completo" required>
                    <div class="invalid-feedback">
                        Digite o Nome Completo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="celular" name="cell_phone" placeholder="21000000000" required>
                    <div class="invalid-feedback">
                        Somente números, 2 digitos para DDD e 9 digitos para o número, sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">E-mail</label>
                    <input type="mail" class="form-control" id="mail" name="mail_server" placeholder="login@server.com" required>
                    <div class="invalid-feedback">
                        O E-mail deve possuir ao menos: um login, um "@" e um Servidor.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="token_csrf" value="<?= (isset($token_csrf)) ? ($token_csrf) : (NULL); ?>">
                    <button class="btn btn-outline-primary" type="submit">Enviar</button>
                </div>
                <?= form_close("&nbsp;"); ?>
            </div>
        <?php endif; ?>
        <?php if (in_array('candidato', $cadastro_uri)) : ?>
            <div>
                <?= form_open_multipart('calendar/usuario/api/criar', 'class="was-validated"'); ?>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="full_name" placeholder="Nome e Sobrenome" required>
                    <div class="invalid-feedback">
                        Somente letras sem pontos ou numeros.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="number" class="form-control" id="cpf" name="cpf" placeholder="00011122233" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email_server" name="email_server" placeholder="login@server.com" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="cell_phone" name="cell_phone" placeholder="21000001111" required>
                    <div class="invalid-feedback">
                        Somente números sem pontos ou letras.
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="token_csrf" value="<?= (isset($token_csrf)) ? ($token_csrf) : (NULL); ?>">
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