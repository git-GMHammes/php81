<script type="text/babel">
    // Componente para o ícone de editar
    const EditIcon = () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            // [SVG do ícone de editar]
        </svg>
    );

    // Componente para o ícone de lixeira
    const TrashIcon = () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            // [SVG do ícone de lixeira]
        </svg>
    );

    // Componente principal da tabela
    const App_table_api_table = () => {
        // Estado para armazenar os dados da API
        const [data, setData] = React.useState(null);
        // Estado para o filtro
        const [filter, setFilter] = React.useState("");

        // Efeito colateral para carregar dados da API
        React.useEffect(() => {
            fetch('http://localhost:4107/dadospessoais/api/exibir')
                .then(response => response.json())
                .then(data => setData(data))
                .catch(error => console.error('Error fetching data:', error));
        }, []);

        // Função para lidar com a mudança no campo de entrada do filtro
        const handleFilterChange = (e) => {
            setFilter(e.target.value);
        };

        // Filtrando os dados com base no valor do filtro
        const filteredData = data ? data.result.filter(item => {
            return Object.values(item).join(" ").toLowerCase().includes(filter.toLowerCase());
        }) : [];

        // Renderização do componente
        return (
            <div className="container mt-4">
                <h1>Table from API</h1>
                <h3>'http://localhost:4107/dadospessoais/api/exibir'</h3>

                {/* Campo de entrada para o filtro */}
                <input 
                    type="text" 
                    className="form-control mb-3" 
                    placeholder="Digite para filtrar..." 
                    value={filter} 
                    onChange={handleFilterChange}
                />

                {/* Tabela */}
                {filteredData && (
                    <table className="table table-hover">
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
                            {filteredData.map(item => (
                                <tr key={item.id}>
                                    <td><a className="btn btn-outline-primary" href="#" role="button"><EditIcon /></a></td>
                                    <td>{item.id}</td>
                                    <td>{item.nome}</td>
                                    <td>{item.telefone}</td>
                                    <td>{item.email}</td>
                                    <td>{item.idade}</td>
                                    <td>{item.end_cep}</td>
                                    <td>{item.end_complemento}</td>
                                    <td><a className="btn btn-outline-danger" href="#" role="button"><TrashIcon /></a></td>
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
