<div id="react_result_api_id"></div>

<script type="text/babel">
    const App_table_api_id = () => {
        // useState: React.useState é uma função do React que permite que você adicione 
        // o estado React a componentes funcionais. Antes dos Hooks, o estado só podia ser usado 
        // em componentes de classe. useState é um dos vários Hooks disponíveis no React.

        // Inicializando o Estado: A função useState é chamada com um valor inicial para o estado. 
        // Neste caso, o estado inicial é null. Isso significa que a variável data será inicializada 
        // com o valor null.

        // Array Destructuring: O useState retorna um par de valores: o estado atual e uma função 
        // que permite atualizar esse estado. Este par é retornado como um array.

        // data: A primeira variável no array, data, é uma referência ao valor atual do estado. 
        // Inicialmente, data será null, mas esse valor pode mudar ao longo do ciclo de vida do componente.

        // setData: A segunda variável, setData, é uma função que você chama para atualizar 
        // o valor de data. Quando setData é chamada com um novo valor, o componente é re-renderizado, 
        // e data terá esse novo valor.

        const [data, setData] = React.useState(null);


        // Função de Efeito: () => {} é uma função que será executada após cada renderização do componente. 
        // No entanto, devido à forma como você configurou as dependências (explicarei em um momento), 
        // essa função será executada apenas uma vez neste caso. Atualmente, a função está vazia, 
        // o que significa que não há efeitos colaterais sendo realizados.

        // Array de Dependências: [] é o segundo argumento do useEffect. Este é um array de dependências. 
        // Quando você passa um array vazio, está instruindo o React a executar a função de efeito 
        // apenas uma vez, quando o componente é montado na DOM, e não em atualizações subsequentes do componente. 
        // Isso é similar ao comportamento do componentDidMount em componentes de classe.

        React.useEffect(() => {

            // Fetch API: fetch('http://localhost:4107/dadospessoais/api/listar') é uma chamada à Fetch API, 
            // uma maneira moderna de fazer solicitações de rede (como chamadas a APIs) em JavaScript. 
            // Neste caso, você está fazendo uma solicitação GET para o URL especificado 
            // (http://localhost/dadospessoais/api/listar). 
            // Esta URL parece ser uma API local que lista dados pessoais.

            // Processando a Resposta:

            // .then(response => response.json()): Após a solicitação ser feita, você recebe um objeto Response. 
            // O método .json() é chamado neste objeto para extrair o corpo da resposta e convertê-lo 
            // de JSON para um objeto JavaScript. Este método retorna uma promessa que resolve com 
            // o resultado da análise do corpo do texto como JSON.
            // Atualizando o Estado com os Dados:

            // .then(data => setData(data)): Uma vez que os dados são recebidos e convertidos, 
            // a próxima função .then é executada. Aqui, você atualiza o estado data do seu componente 
            // com os dados recebidos através da função setData, que é parte do useState que você definiu 
            // anteriormente no componente.
            // Tratamento de Erros:

            // .catch(error => console.error('Error fetching data:', error)): Este é o manipulador de erros. 
            // Se algo der errado durante a solicitação ou o processamento da resposta (como uma falha de rede, 
            // resposta de erro do servidor, problemas na análise do JSON, etc.), o código dentro 
            // do .catch será executado. Aqui, você está apenas registrando o erro no console.

            fetch('http://localhost:4107/dadospessoais/api/listar')
                .then(response => response.json())
                .then(data => setData(data))
                .catch(error => console.error('Error fetching data:', error));
        }, []);

        return (
            <div className="container mt-4">
                <h1>Data from API</h1>
                <pre>
                    {/*
                    JSON.stringify: Este é um método JavaScript que converte um objeto ou valor JavaScript 
                    em uma string JSON. É frequentemente usado para exibir objetos ou arrays de forma legível.

                    data: Este é o primeiro argumento para JSON.stringify e representa o objeto ou valor 
                    a ser convertido em uma string JSON. No contexto do seu código, data é a variável 
                    de estado que você definiu com useState e que é atualizada com os dados recebidos 
                    da sua chamada de API.

                    null: Este é o segundo argumento para JSON.stringify. Ele é usado como uma função 
                    de substituição durante a conversão. No entanto, quando é null, não há efeito 
                    de substituição, e o objeto é convertido como está.

                    2: Este é o terceiro argumento para JSON.stringify e especifica o número de espaços 
                    usados para indentação no JSON resultante. Isso torna a string JSON mais legível 
                    para humanos. Neste caso, cada nível no objeto JSON terá uma indentação de dois espaços.
                    */}

                    {JSON.stringify(data, null, 2)}
                </pre>
            </div>
        );
    };
    ReactDOM.render(<App_table_api_id />, document.getElementById('react_result_api_id'));
</script>