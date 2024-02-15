<div class="card mt-2 mb-2 ms-2 me-2" id="a_calendario">
    <div class="card-header">
        <h5 class="card-title">Calendário</h5>
    </div>
    <div class="card-body">
        <?= view('calendar/calendar')?>
    </div>
    <div class="card-footer text-right">
        <div class="text-end"><?php myDateSystem('PROES');?></div>
    </div>
</div>