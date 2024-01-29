<!-- src\app\Views\dadospessoais\react\api\002_api_table.php -->
<div id="react_result_api_table"></div>

<script type="text/babel">
    // Componente para o ícone de editar
    const EditIcon = () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
        </svg>
    );
    // Componente para o ícone de lixeira
    const TrashIcon = () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
        </svg>
    );

    const App_table_api_table = () => {
        const [data, setData] = React.useState(null);
        React.useEffect(() => {
            fetch('http://localhost:4107/dadospessoais/api/listar')
                .then(response => response.json())
                .then(data => setData(data))
                .catch(error => console.error('Error fetching data:', error));
        }, []);

        return (
            <div className="container mt-4">
                <h1>Table from API</h1>
                <h3>'http://localhost:4107/dadospessoais/api/listar'</h3>
                {/*
                    {data && data.result && (...)}

                    Esta expressão é uma forma de condicionalmente renderizar algo no JSX, 
                    que é a sintaxe de marcação usada no React. Aqui está o que cada parte faz:

                    data &&: Esta parte verifica se data é "truthy". Em JavaScript, valores como null, 
                    undefined, 0, false, e strings vazias são considerados "falsy", enquanto outros valores 
                    são "truthy". Se data for null ou undefined (o que pode acontecer antes de os dados 
                    serem carregados), a expressão após o && não será avaliada e nada será renderizado.
                    data.result &&: Se data existir, esta parte verifica se data.result também é "truthy". 
                    Isso é útil para garantir que data.result não é null ou undefined antes de tentar 
                    acessar seus membros, o que poderia causar um erro.
                    (...): Se ambas as condições anteriores forem verdadeiras, o conteúdo dentro dos parênteses 
                    será renderizado. No seu caso, isso inclui a tabela HTML que é preenchida com os dados.
                    Portanto, essa expressão garante que a tabela só será renderizada se data e data.result 
                    estiverem disponíveis.
                */}

                {data && data.result && (
                    <table className="table table-hover">
                        {/* Cabeçalho e corpo da tabela */}
                        <thead>
                            <tr>
                                <th>Editar</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Idade</th>
                                <th>CEP</th>
                                <th>Endereço</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            {/*
                                {data.result.map(item => (...))}

                                Esta expressão é usada para iterar sobre um array e renderizar algo para cada item 
                                do array. É uma técnica comum em React para exibir listas de elementos. 
                                Vamos decompô-la:

                                data.result.map: map é um método de arrays em JavaScript. Ele percorre cada item 
                                do array, executa a função fornecida para cada item e retorna um novo array com 
                                os resultados.
                                item => (...): Esta é a função que é executada para cada item no array data.result. 
                                item representa o elemento atual do array durante a iteração.
                                (...): Dentro dos parênteses, você define o que deve ser retornado para cada item 
                                do array. No seu caso, é uma linha da tabela (<tr>...</tr>) que contém os dados desse item.
                                Então, para cada objeto em data.result, esta expressão cria uma nova linha na tabela, 
                                preenchendo as células com os dados desse objeto.
                            */}
                            {data.result.map(item => (
                                <tr key={item.id}>
                                    <td>
                                        <a className="btn btn-outline-primary" href="#" role="button">
                                            <EditIcon />
                                        </a>
                                    </td>
                                    <td>{item.id}</td>
                                    <td>{item.nome}</td>
                                    <td>{item.telefone}</td>
                                    <td>{item.email}</td>
                                    <td>{item.idade}</td>
                                    <td>{item.end_cep}</td>
                                    <td>{item.end_complemento}</td>
                                    <td>
                                        <a className="btn btn-outline-danger" href="#" role="button">
                                            <TrashIcon />
                                        </a>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                )}
            </div>
        );
    };
    ReactDOM.render(<App_table_api_table />, document.getElementById('react_result_api_table'));
</script>
