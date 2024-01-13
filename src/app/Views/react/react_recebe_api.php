<!-- Um div com o ID "app", que será o ponto de montagem para o nosso componente React -->
<div id="app"></div>

<script type="text/babel">
    // Definição do componente funcional App
    const App = () => {
        // Uso do hook useState para criar o estado 'data'
        // Utilização do hook useState para criar a variável de estado 'data' e a função 'setData' para atualizá-la
        const [data, setData] = React.useState(null);

        // Uso do hook useEffect para lidar com efeitos colaterais (neste caso, chamada de API)
        // Utilização do hook useEffect para realizar efeitos colaterais; neste caso, para buscar dados da API

        React.useEffect(() => {
            // Fazendo uma chamada fetch para a API
            fetch('https://www.intranet.degase.proderj.rj.gov.br/react/tabela/api')
                .then(response => response.json()) // Processando a resposta para JSON
                .then(data => setData(data)) // Atualizando o estado 'data' com os dados da resposta
                .catch(error => console.error('Error fetching data:', error)); // Capturando erros, se houver
        }, []); // Array vazio indica que este efeito será executado apenas na montagem do componente
        // O array vazio como segundo argumento significa que este efeito roda apenas uma vez, após a montagem do componente

        // Renderiza um texto de carregamento enquanto os dados não são recebidos
        // Renderização condicional: se 'data' é nulo, mostra um parágrafo indicando que está carregando
        if (!data) return <p>Loading...</p>;

        // Renderização do componente com os dados recebidos
        return (
            <div>
                {/* 
                // A tag <pre> é usada para exibir texto pré-formatado. Dentro dela, os dados são 
                // convertidos para uma string JSON e formatados para fácil leitura. 
                // JSON.stringify(data, null, 2) converte o objeto 'data' para uma string JSON, 
                // com um espaçamento de 2 caracteres para formatação. Isso torna a saída JSON 
                // legível no navegador.
                */}
                <h1>Data from API</h1>
                <pre>{JSON.stringify(data, null, 2)}</pre> {/* Exibindo os dados formatados em JSON */}
            </div>
        );
    };

    // Renderiza o componente App no elemento com id 'app'
    // Renderiza o componente App dentro do elemento do DOM com o ID 'app
    ReactDOM.render(<App />, document.getElementById('app'));
</script>