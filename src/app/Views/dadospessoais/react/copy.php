<div id="reactApp" data-result='<?php echo json_encode($result); ?>'></div>

<script type="text/babel">
    function App({ data }) {
        console.log('Passou na função');
        return (
            <div className="container mt-4">
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Idade</th>
                            <th>CEP</th>
                            <th>Endereço</th>
                            <th>Criado em</th>
                            <th>Atualizado em</th>
                            <th>Deletado em</th>
                        </tr>
                    </thead>
                    <tbody>
                        {data.map((item, index) => (
                            <tr key={index}>
                                <td>{item.id}</td>
                                <td>{item.nome}</td>
                                <td>{item.telefone}</td>
                                <td>{item.email}</td>
                                <td>{item.idade}</td>
                                <td>{item.end_cep}</td>
                                <td>{item.end_complemento}</td>
                                <td>{item.created_at}</td>
                                <td>{item.updated_at}</td>
                                <td>{item.deleted_at || 'N/A'}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }

    const reactAppElement = document.getElementById('reactApp');
    const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

    ReactDOM.render(<App data={dataResult} />, reactAppElement);
</script>
