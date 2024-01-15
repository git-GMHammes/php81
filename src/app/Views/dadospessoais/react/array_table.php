<div id="dados_pessoais" data-result='<?php echo json_encode($result); ?>'></div>

<script type="text/babel">
    function AppTabele_dados_pessoais({ data }) {
        console.log('Passou na função');
        return (
            <div className="container mt-4">
                <table className="table table-hover">
                    <thead>
                        <tr>
                            <th>Editar</th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Idade</th>
                            <th>CEP</th>
                            <th>Endereço</th>
                            <th>Criado Em</th>
                            <th>Atualizado Em</th>
                            <th>Deletado Em</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        {data.map((item, index)=>(
                            <tr key={item}>
                                <td>
                                    <a className="btn btn-outline-primary" href="#" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </a>
                                </td>
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
                                <td>
                                    <a className="btn btn-outline-primary" href="#" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }

    const reactAppElement = document.getElementById('dados_pessoais');
    const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

    ReactDOM.render(<AppTabele_dados_pessoais data={dataResult} />, reactAppElement);
</script>