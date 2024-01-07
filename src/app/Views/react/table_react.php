<?php
function showTable()
{
    $ind = 1;
    for ($i = 0; $i < 100; $i++) {
?>
        <tr>
            <td>Informação <?= $ind++; ?></td>
            <td>Informação <?= $ind++; ?></td>
            <td>Informação <?= $ind++; ?></td>
        </tr>
<?php
    }
}
?>

<table className="table table-striped table-hover">
    <thead>
        <tr>
            <th>Coluna 1</th>
            <th>Coluna 2</th>
            <th>Coluna 3</th>
        </tr>
    </thead>
    <tbody>
        <?= showTable(); ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Rodapé da Tabela</td>
        </tr>
    </tfoot>
</table>

<div id="table_react">

</div>
<script type="text/babel">
    function Tabela() {
    }
    ReactDOM.render(<Tabela />, document.getElementById('table_react'));
</script>