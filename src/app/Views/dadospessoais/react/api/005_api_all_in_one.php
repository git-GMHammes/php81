<div id="ReactResultAllInOne"></div>
<script type="text/babel">
    // Componente React para exibir dados de uma API em uma tabela
    const AppApiAllInOn = () => {
        // State para armazenar os dados recebidos da API
        const [data, setData] = React.useState(null);

        // useEffect é usado para fazer a chamada da API quando o componente é montado
        React.useEffect(() => {
            // Fazendo a chamada da API
            fetch('http://localhost:4107/dadospessoais/api/exibir')
                // Converte a resposta em JSON    
                .then(response => response.json())
                // Armazena apenas a parte 'result' do JSON no state
                .then(data => setData(data.result))
                // Captura erros, se houver
                .catch(error => console.error('Error fetching data:', error));
        }, []); // Array de dependências vazio significa que isso roda apenas na montagem do componente

        // Função para renderizar o cabeçalho da tabela
        const renderTableHeader = () => {
            // Verifica se os dados estão disponíveis
            if (!data || data.length === 0) {
                return null;
            }

            // Cria uma linha de cabeçalho com as chaves do primeiro objeto do array 'data'
            return (
                <tr>
                    {Object.keys(data[0]).map(key => (
                        // Cria um cabeçalho de tabela para cada chave
                        <th key={key}>{key}</th>
                    ))}
                </tr>
            );
        };

        // Função para renderizar as linhas da tabela
        const renderTableRows = () => {
            // Mapeia cada item do array 'data' para uma linha de tabela
            return data.map((item, index) => (
                <tr key={index}>
                    {Object.keys(item).map(key => (
                        // Cria uma célula de tabela para cada valor
                        <td key={`${index}-${key}`}>{item[key]}</td>
                    ))}
                </tr>
            ));
        };

        // Renderização do componente
        return (
            <div className="container mt-4">
                <h1>Data from API</h1>
                <h2>(Exibe todos os rotulos e dados de uma API em uma tabela)</h2>
                <h3>'http://localhost:4107/dadospessoais/endpoint/listar/api/all_in_one'</h3>
                <div>
                    <div className="d-flex justify-content-center">
                        # route GET /www/dadospessoais/endpoint/listar/api/all_in_one/(:any)
                    </div>
                    <div className="d-flex justify-content-center">
                        https://github.com/git-GMHammes/php81/blob/main/src/app/Views/dadospessoais/react/api/005_api_all_in_one.php
                    </div>
                </div>
                <table>
                    <thead>
                        {/* Renderiza o cabeçalho da tabela */}
                        {renderTableHeader()}
                    </thead>
                    <tbody>
                        {/* Renderiza as linhas da tabela ou mostra 'Loading...' */}
                        {data ? renderTableRows() : <tr><td>Loading...</td></tr>}
                    </tbody>
                </table>
            </div>
        );
    };

    // Renderiza o componente AppApiAllInOn no elemento com ID 'ReactResultAllInOne'
    ReactDOM.render(<AppApiAllInOn />, document.getElementById('ReactResultAllInOne'));
</script>