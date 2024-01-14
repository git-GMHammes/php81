<!-- Exemplo de View em CodeIgniter 4 -->
<div id="reactApp" data-result='<?php echo json_encode($result); ?>'></div>

<!-- Inclusão do React e ReactDOM via CDN -->
<script src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

<script>
    // Importando os hooks 'useEffect' e 'useState' do objeto React
    const { useEffect, useState } = React;

    // Definindo um componente funcional React chamado 'MyComponent'
    function MyComponent() {
        // Inicializando o estado 'data' com um array vazio
        // 'setData' é a função que será usada para atualizar 'data'
        const [data, setData] = useState([]);

        // O Hook useEffect é usado para lidar com efeitos colaterais
        // Aqui, é usado para carregar dados quando o componente é montado
        useEffect(() => {
            // Acessando o elemento DOM com id 'reactApp'
            const element = document.getElementById('reactApp');
            // Lendo o atributo 'data-result', que contém os dados em formato JSON
            const result = JSON.parse(element.getAttribute('data-result'));

            // Atualizando o estado 'data' com os dados convertidos
            setData(result);
        }, []); // O array vazio indica que o efeito roda apenas na montagem do componente

        // Renderização do componente: mapeando cada item de 'data' para um div
        return (
            <div>
                {data.map((item, index) => (
                    // Para cada item de 'data', criamos um div com o conteúdo sendo a stringificação do item
                    // 'key' é necessário em listas para ajudar o React a identificar quais itens mudaram
                    <div key={index}>{JSON.stringify(item)}</div>
                ))}
            </div>
        );
    }

    // Renderizando 'MyComponent' dentro do elemento DOM com id 'reactApp'
    ReactDOM.render(<MyComponent />, document.getElementById('reactApp'));
</script>

