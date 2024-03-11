<?php
$in_php = array(
    "title" => "Lista de Pessoas III",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat massa id felis dapibus, ac malesuada ipsum venenatis. Pellentesque vitae dui dui. Curabitur sollicitudin metus elementum vulputate blandit. Donec in varius diam. Vestibulum a est quis lacus pretium viverra eu id est. Vivamus efficitur tempus est, sed consectetur justo pellentesque sit amet. Sed vehicula consectetur augue, vel commodo leo pulvinar volutpat. Etiam sagittis non ligula bibendum tincidunt. Nunc sed tellus id arcu interdum dapibus vel sed enim. Ut dictum accumsan viverra. Donec cursus libero ut neque mattis, eu pellentesque lorem pharetra. Nam pharetra iaculis est, quis porta mi iaculis at. Fusce dui felis, pharetra eget massa vel, aliquam vulputate tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quam quam, dictum sed risus quis, euismod tincidunt erat. Mauris pellentesque erat risus.",
    "keywords" => "Ordenar",
    "body" => "ordenar",
    "url_api" => base_url() . "/dadospessoais/api/listar",
    "css" => array(),
    "js" => array()
);
?>
<div class="app_tabela_api" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">
    function AppTabelaAPI() {
        const [dadosPessoais, setDadosPessoais] = React.useState([]);
        const [title, setTitle] = React.useState(''); // Estado adicionado para o título

        React.useEffect(() => {
            const appElement = document.querySelector('.app_tabela_api');
            const dataResult = appElement.getAttribute('data-inphp');
            const data = JSON.parse(dataResult);
            setTitle(data.title); // Atualizando o estado do título

            fetch(data.url_api)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(apiData => setDadosPessoais(apiData.result))
                .catch(error => console.error('Error fetching data:', error));
        }, []); // As dependências do useEffect continuam vazias, o que significa que o efeito será executado uma vez, na montagem do componente.

        return (
            <div className="container">
                <form className="was-validated">
                    <h2 className="mt-4 mb-4">{title}</h2> {/* Usando o estado do título */}
                    <table className="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Order</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">CEP</th>
                                <th scope="col">Complemento</th>
                            </tr>
                        </thead>
                        <tbody>
                            {dadosPessoais.map((pessoa, index) => (
                                <tr key={pessoa.id}>
                                    <th scope="row">{index + 1}</th>
                                    <td>{pessoa.id}</td>
                                    <td>
                                        <div classname="col-md-4" style={{ width: 100 }}>
                                            <div>
                                                <label htmlfor="validationDefault01" classname="form-label">Ordem</label>
                                                <input type="text" classname="form-control" id="ordem" defaultValue={pessoa.order} required />
                                            </div>
                                        </div>
                                    </td>
                                    <td>{pessoa.nome}</td>
                                    <td>{pessoa.telefone}</td>
                                    <td>{pessoa.email}</td>
                                    <td>{pessoa.end_cep}</td>
                                    <td>{pessoa.end_complemento}</td>
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
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        );
    }
    ReactDOM.render(<AppTabelaAPI />, document.querySelector('.app_tabela_api'));
</script>
<div style="width:100px">teste</div>