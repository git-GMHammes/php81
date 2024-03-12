<?php
$in_php = array(
    "title" => "Lista de Pessoas IV",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat massa id felis dapibus, ac malesuada ipsum venenatis. Pellentesque vitae dui dui. Curabitur sollicitudin metus elementum vulputate blandit. Donec in varius diam. Vestibulum a est quis lacus pretium viverra eu id est. Vivamus efficitur tempus est, sed consectetur justo pellentesque sit amet. Sed vehicula consectetur augue, vel commodo leo pulvinar volutpat. Etiam sagittis non ligula bibendum tincidunt. Nunc sed tellus id arcu interdum dapibus vel sed enim. Ut dictum accumsan viverra. Donec cursus libero ut neque mattis, eu pellentesque lorem pharetra. Nam pharetra iaculis est, quis porta mi iaculis at. Fusce dui felis, pharetra eget massa vel, aliquam vulputate tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quam quam, dictum sed risus quis, euismod tincidunt erat. Mauris pellentesque erat risus.",
    "keywords" => "Ordenar",
    "body" => "ordenar",
    "url_api" => base_url() . "dadospessoais/api/listar",
    "url_post" => base_url() . "meureact/api/ordenar",
    "css" => array(),
    "js" => array()
);
?>
<div class="app_tabela_api_order" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">
    function AppTabelaAPIOrder() {
        // Informações da API dos dados pessoais
        const [dadosPessoais, setDadosPessoais] = React.useState([]);
        // Informações do PHP
        const [title, setTitle] = React.useState('');
        const [urlPost, setUrlPost] = React.useState('');
        // Icone para arrastar
        const MoveIcon = () => (
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10M.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8" />
            </svg>
        );

        React.useEffect(() => {
            const appElement = document.querySelector('.app_tabela_api_order');
            // Informações do PHP
            const dataResult = appElement.getAttribute('data-inphp');
            const data = JSON.parse(dataResult);
            setTitle(data.title);
            setUrlPost(data.url_post);

            fetch(data.url_api)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(apiData => setDadosPessoais(apiData.result))
                .catch(error => console.error('Error fetching data:', error));
        }, []);

        // Informações para arrastar o index
        const onDragStart = (e, index) => {
            e.dataTransfer.setData("dragIndex", index.toString());
        };
        const onDrop = (e, dropIndex) => {
            e.preventDefault(); // Para permitir o drop.
            const dragIndex = Number(e.dataTransfer.getData("dragIndex"));
            // Obter uma cópia do estado atual para evitar a mutação direta.
            let newDadosPessoais = [...dadosPessoais];
            // Remover o item arrastado da lista e guardá-lo em uma variável.
            const draggedItem = newDadosPessoais.splice(dragIndex, 1)[0];
            // Inserir o item arrastado na nova posição.
            newDadosPessoais.splice(dropIndex, 0, draggedItem);
            // Atualizar o estado com a nova lista reordenada.
            setDadosPessoais(newDadosPessoais);
        };


        const onDragOver = (e) => {
            e.preventDefault(); // Necessário para permitir o drop
        };

        return (
            <div className="container">
                <form className="was-validated" action={urlPost} method="post">
                    <h2 className="mt-4 mb-4">{title}</h2>
                    <table className="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div className="d-flex justify-content-center" style={{ width: '90px' }}>
                                        #
                                    </div>
                                </th>
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
                                <tr
                                    // Chave única para cada linha, necessária para otimizações do React
                                    key={pessoa.id}
                                    // Torna a linha arrastável
                                    draggable="true"
                                    // Define a função a ser chamada quando o arraste é iniciado
                                    onDragStart={(e) => onDragStart(e, index)}
                                    // Define a função a ser chamada quando um item é solto sobre esta linha
                                    onDrop={(e) => onDrop(e, index)}
                                    // Define a função a ser chamada quando um item está sendo arrastado sobre esta linha
                                    onDragOver={onDragOver}
                                >
                                    <th scope="row">
                                        <div className="d-flex justify-content-center align-middle">
                                            <span className="align-middle">
                                                <MoveIcon />
                                            </span> &emsp;
                                            {index + 1}
                                        </div>
                                    </th>
                                    <td>{pessoa.id}</td>
                                    <td>
                                        <div className="col-md-4">
                                            <input
                                                type="text"
                                                className="form-control"
                                                id={"ordem" + pessoa.id}
                                                name="order[]"
                                                style={{ width: '90px' }}
                                                value={index + 1}
                                                readOnly
                                            />
                                            <input
                                                type="hidden"
                                                name="id[]"
                                                value={pessoa.id}
                                            />
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
                                <th>
                                    <button className="btn btn-outline-primary" type="submit">Enviar</button>
                                </th>
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
        {/*  */ }
    }
    ReactDOM.render(<AppTabelaAPIOrder />, document.querySelector('.app_tabela_api_order'));
</script>