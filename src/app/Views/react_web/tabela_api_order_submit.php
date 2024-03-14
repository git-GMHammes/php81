<?php
$in_php = array(
    "title" => "Lista de Pessoas V (Recebe dados da API - Autosave)",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat massa id felis dapibus, ac malesuada ipsum venenatis. Pellentesque vitae dui dui. Curabitur sollicitudin metus elementum vulputate blandit. Donec in varius diam. Vestibulum a est quis lacus pretium viverra eu id est. Vivamus efficitur tempus est, sed consectetur justo pellentesque sit amet. Sed vehicula consectetur augue, vel commodo leo pulvinar volutpat. Etiam sagittis non ligula bibendum tincidunt. Nunc sed tellus id arcu interdum dapibus vel sed enim. Ut dictum accumsan viverra. Donec cursus libero ut neque mattis, eu pellentesque lorem pharetra. Nam pharetra iaculis est, quis porta mi iaculis at. Fusce dui felis, pharetra eget massa vel, aliquam vulputate tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quam quam, dictum sed risus quis, euismod tincidunt erat. Mauris pellentesque erat risus.",
    "keywords" => "Ordenar",
    "body" => "ordenar",
    "url_api" => base_url() . "dadospessoais/api/listar",
    "url_post" => base_url() . "meureact/api/ordenar",
    "css" => array(),
    "js" => array()
);
?>
<div class="tabela_api_order_submit" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">
    function AppTabelaAPIOrderSubmit() {
        // Estado para armazenar dados recebidos da API
        const [dadosRecebidosAPI, setDadosPessoais] = React.useState([]);

        // Estados para armazenar informações passadas pelo PHP
        const [title, setTitle] = React.useState('');
        const [urlPost, setUrlPost] = React.useState('');

        // Componente para exibir um ícone de movimento (não relacionado diretamente à ordenação, UI apenas)
        const MoveIcon = () => (
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10M.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8" />
            </svg>
        );
        // Seleciona o elemento que contém os dados passados pelo PHP
        React.useEffect(() => {
            const appElement = document.querySelector('.tabela_api_order_submit');
            // Extrai e decodifica os dados passados pelo PHP
            const dataResult = appElement.getAttribute('data-inphp');
            const data = JSON.parse(dataResult);
            // Define os dados extraídos nos estados correspondentes
            setTitle(data.title);
            setUrlPost(data.url_post);

            // Captura de dados da API / A URL da API é passada pelo PHP
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

        // Lógica de ordenação
        const onDragStart = (e, index) => {
            // Armazena o índice do item arrastado
            e.dataTransfer.setData("dragIndex", index.toString());
        };
        const onDrop = (e, dropIndex) => {
            e.preventDefault();
            const dragIndex = Number(e.dataTransfer.getData("dragIndex"));
            let newDadosRecebidosAPI = [...dadosRecebidosAPI];
            const draggedItem = newDadosRecebidosAPI.splice(dragIndex, 1)[0];
            newDadosRecebidosAPI.splice(dropIndex, 0, draggedItem);
            setDadosPessoais(newDadosRecebidosAPI);

            // Preparar dados para envio
            const postData = new FormData(); // Usando FormData para simular o envio de formulário
            newDadosRecebidosAPI.forEach((item, index) => {
                postData.append('order[]', index + 1);
                postData.append('id[]', item.id);
            });

            // Enviar dados reordenados automaticamente
            fetch(urlPost, {
                method: 'POST',
                body: postData, // FormData será enviado como 'multipart/form-data'
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    // Tratativa de sucesso
                })
                .catch((error) => {
                    console.error('Error:', error);
                    // Tratativa de erro
                });
        };

        // Necessário para permitir o drop
        const onDragOver = (e) => {
            e.preventDefault(); // Necessário para permitir o drop
        };

        // Renderização do componente com a tabela e lógica de ordenação aplicada
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
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">CEP</th>
                                <th scope="col">Complemento</th>
                            </tr>
                        </thead>
                        <tbody>
                            {dadosRecebidosAPI.map((dados_api, index) => (
                                <tr
                                    // Chave única para cada linha, necessária para otimizações do React
                                    key={dados_api.id}
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
                                        <div className="col-md-4">
                                            <input
                                                type="hidden"
                                                className="form-control"
                                                id={"ordem" + dados_api.id}
                                                name="order[]"
                                                style={{ width: '90px' }}
                                                value={index + 1}
                                                readOnly
                                            />
                                            <input
                                                type="hidden"
                                                name="id[]"
                                                value={dados_api.id}
                                            />
                                        </div>
                                    </th>
                                    <td>{dados_api.nome}</td>
                                    <td>{dados_api.telefone}</td>
                                    <td>{dados_api.email}</td>
                                    <td>{dados_api.end_cep}</td>
                                    <td>{dados_api.end_complemento}</td>
                                </tr>
                            ))}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>
                                    {/*<button className="btn btn-outline-primary" type="submit">Enviar</button>*/}
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
    ReactDOM.render(<AppTabelaAPIOrderSubmit />, document.querySelector('.tabela_api_order_submit'));
</script>