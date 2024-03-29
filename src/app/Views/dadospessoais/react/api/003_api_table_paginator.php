<div id="dadosPessoaisPaginator"></div>

<script type="text/babel">
    // Definição de estilo para o select
    const selectStyle = {
        width: '60px',
        padding: '0',
        fontSize: '12px',
    };

    // Componente para o ícone de editar
    const EditIcon = () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
        </svg>
    );
    // Componente para o ícone de lixeira
    const TrashIcon = () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
        </svg>
    );

    // Componente de Paginação
    const Pagination = ({ recordsPerPage, totalRecords, paginate }) => {
        const pageNumbers = [];
        for (let i = 1; i <= Math.ceil(totalRecords / recordsPerPage); i++) {
            pageNumbers.push(i);
        }
        return (
            <nav>
                <ul className='pagination'>
                    {pageNumbers.map(number => (
                        <li key={number} className='page-item'>
                            <a className="btn btn-outline-primary me-2" onClick={() => paginate(number)} href='#!'>
                                {number}
                            </a>
                        </li>
                    ))}
                </ul>
            </nav>
        );
    };

    // Estados para os dados e para a paginação
    const AppTableApiPaginator = () => {
        // Estados para os dados e para a paginação
        const [data, setData] = React.useState(null);

        // Estados e lógica de paginação existentes
        const [currentPage, setCurrentPage] = React.useState(1);
        const [recordsPerPage, setRecordsPerPage] = React.useState(5);

        // Chama a API quando o componente é montado
        React.useEffect(() => {
            fetch('http://localhost:4107/dadospessoais/api/exibir')
                .then(response => response.json())
                .then(dataReceived => setData(dataReceived))
                .catch(error => console.error('Error fetching data:', error));
        }, []);

        // Função para lidar com a mudança de registros por página
        const handleRecordsPerPageChange = (e) => {
            setRecordsPerPage(Number(e.target.value));
            setCurrentPage(1); // Retorna para a primeira página ao mudar a quantidade de registros
        };

        let currentRecords = [];
        let totalRecords = 0;
        if (data && Array.isArray(data.result)) { // Confirme se data.result é um array
            totalRecords = data.result.length;
            const indexOfLastRecord = currentPage * recordsPerPage;
            const indexOfFirstRecord = indexOfLastRecord - recordsPerPage;
            currentRecords = data.result.slice(indexOfFirstRecord, indexOfLastRecord);
        }

        const paginate = pageNumber => setCurrentPage(pageNumber);

        return (
            <div className="container mt-4">
                <h1>Paginator from API</h1>
                <h3>'http://localhost:4107/dadospessoais/api/exibir'</h3>
                <div>
                    <div className="d-flex justify-content-center">
                        # route GET /www/dadospessoais/endpoint/listar/api/paginator/(:any)
                    </div>
                    <div className="d-flex justify-content-center">
                        https://github.com/git-GMHammes/php81/blob/main/src/app/Views/dadospessoais/react/api/003_api_table_paginator.php
                    </div>
                </div>
                {data && data.result && (
                    <div>
                        {/* Outros elementos e lógica do componente */}
                        <div className="d-flex justify-content-start mb-3">
                            <select
                                className="form-select form-select-sm"
                                style={selectStyle}
                                id="recordsPerPage"
                                value={recordsPerPage}
                                onChange={handleRecordsPerPageChange}
                            >
                                {[5, 10, 20, 30, 40, 50].map(number => (
                                    <option key={number} value={number}>
                                        {number}
                                    </option>
                                ))}
                            </select> &nbsp;
                            <label htmlFor="recordsPerPage">Linhas</label>
                        </div>

                        {/* Componente de Paginação */}
                        <Pagination
                            recordsPerPage={recordsPerPage}
                            totalRecords={totalRecords}
                            paginate={paginate}
                        />

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
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                {currentRecords.map(item => (
                                    <tr key={item.id}>
                                        <td>
                                            <a className="btn btn-outline-primary" href="#" role="button">
                                                <EditIcon />
                                            </a>
                                        </td>
                                        <td>{item.id}</td>
                                        <td>{item.full_name}</td>
                                        <td>{item.telephone}</td>
                                        <td>{item.mail}</td>
                                        <td>{item.birth_date}</td>
                                        <td>{item.address_code}</td>
                                        <td>{item.address_complement}</td>
                                        <td>
                                            <a className="btn btn-outline-danger" href="#" role="button">
                                                <TrashIcon />
                                            </a>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>

                        {/* Componente de Paginação */}
                        <Pagination
                            recordsPerPage={recordsPerPage}
                            totalRecords={totalRecords}
                            paginate={paginate}
                        />
                    </div>
                )}
            </div>
        );
    }
    // Monta o componente no DOM
    const reactAppElement = document.getElementById('dadosPessoaisPaginator');
    ReactDOM.render(<AppTableApiPaginator />, reactAppElement);
</script>