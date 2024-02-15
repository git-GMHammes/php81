<div class="card mt-2 mb-2 ms-2 me-2">
    <div class="card-header">
        <h5 class="card-title">Lista de Candidatos</h5>
    </div>
    <div class="card-body">
        <?php for ($i = 1; $i < 10; $i++) : ?>
            <?= $i ?>) Candidato <?= $i ?>; <br>
        <?php endfor ?>
    </div>
    <div class="card-footer text-right">
        <div class="text-end"><?php myDateSystem('PROES'); ?></div>
    </div>
</div>