<div>
    <?= form_open_multipart('calendar/user/api/login', 'class="was-validated"'); ?>
    <div class="col-md-4">
        <label for="cpf" class="form-label">cpf</label>
        <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <?= form_close("&nbsp;"); ?>
</div>
<div>
    <?= form_open_multipart('calendar/user/api/confirma/token', 'class="was-validated"'); ?>

    <?= form_close("&nbsp;"); ?>
</div>
<div>
    <?= form_open_multipart('calendar/user/api/busca/cadastro', 'class="was-validated"'); ?>

    <?= form_close("&nbsp;"); ?>
</div>
<div>
    <?= form_open_multipart('calendar/user/api/recupera/acesso', 'class="was-validated"'); ?>

    <?= form_close("&nbsp;"); ?>
</div>