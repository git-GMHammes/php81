<div id="ReactResultAllInOne"></div>

<script type="text/babel">
    // Componente React para exibir dados de uma API em uma tabela
    const AppApiAllInOn = () => {
        // State para armazenar os dados recebidos da API
        const [data, setData] = React.useState(null);

        // useEffect é usado para fazer a chamada da API quando o componente é montado
        React.useEffect(() => {
            // Fazendo a chamada da API
            fetch('http://localhost:4107/dadospessoais/api/listar')
                .then(response => response.json()) // Converte a resposta em JSON
                .then(data => setData(data.result)) // Armazena apenas a parte 'result' do JSON no state
                .catch(error => console.error('Error fetching data:', error)); // Captura erros, se houver
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
                        <th key={key}>{key}</th> // Cria um cabeçalho de tabela para cada chave
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
                        <td key={`${index}-${key}`}>{item[key]}</td> // Cria uma célula de tabela para cada valor
                    ))}
                </tr>
            ));
        };

        // Renderização do componente
        return (
            <div className="container mt-4">
                <h1>Data from API</h1>
                <table>
                    <thead>
                        {renderTableHeader()} // Renderiza o cabeçalho da tabela
                    </thead>
                    <tbody>
                        {data ? renderTableRows() : <tr><td>Loading...</td></tr>} // Renderiza as linhas da tabela ou mostra 'Loading...'
                    </tbody>
                </table>
            </div>
        );
    };

    // Renderiza o componente AppApiAllInOn no elemento com ID 'ReactResultAllInOne'
    ReactDOM.render(<AppApiAllInOn />, document.getElementById('ReactResultAllInOne'));
</script>
