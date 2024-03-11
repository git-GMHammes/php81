<?php
$in_php = array(
    "title" => "Lista de Usuários II",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat massa id felis dapibus, ac malesuada ipsum venenatis. Pellentesque vitae dui dui. Curabitur sollicitudin metus elementum vulputate blandit. Donec in varius diam. Vestibulum a est quis lacus pretium viverra eu id est. Vivamus efficitur tempus est, sed consectetur justo pellentesque sit amet. Sed vehicula consectetur augue, vel commodo leo pulvinar volutpat. Etiam sagittis non ligula bibendum tincidunt. Nunc sed tellus id arcu interdum dapibus vel sed enim. Ut dictum accumsan viverra. Donec cursus libero ut neque mattis, eu pellentesque lorem pharetra. Nam pharetra iaculis est, quis porta mi iaculis at. Fusce dui felis, pharetra eget massa vel, aliquam vulputate tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quam quam, dictum sed risus quis, euismod tincidunt erat. Mauris pellentesque erat risus.",
    "keywords" => "Ordenar",
    "body" => "ordenar",
    "url" => base_url() . "/dadospessoais/api/listar",
    "css" => array(),
    "js" => array()
);
?>
<div class="app_tabela_indice" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">
    function AppTabelaIndice() {
        const appOrderElement = document.querySelector('.app_tabela_indice');
        const dataResult = appOrderElement.getAttribute('data-inphp');
        const data = JSON.parse(dataResult);
        const users = [
            { id: 3, firstName: 'Gustavo', lastName: 'Otto', handle: '@mdo' },
            { id: 1, firstName: 'Antonio', lastName: 'Thornton', handle: '@fat' },
            { id: 2, firstName: 'Maria', lastName: 'the Bird', handle: '@twitter' }
        ];
        return (
            <div className="container">
                <h2 className="mt-4 mb-4">{data.title}</h2>
                <table className="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.map((user, index) => (
                            <tr key={user.id}>
                                <th scope="row">{index + 1}</th>
                                <td>{user.id}</td>
                                <td>{user.firstName}</td>
                                <td>{user.lastName}</td>
                                <td>{user.handle}</td>
                            </tr>
                        ))}
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        );
    }
    ReactDOM.render(<AppTabelaIndice />, document.querySelector('.app_tabela_indice'));
</script>