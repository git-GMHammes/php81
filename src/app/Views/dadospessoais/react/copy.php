<div id="reactApp" data-result='<?php echo json_encode($result); ?>'></div>

<script type="text/babel">
    function App({ data }) {
        return (
            <div>
                {data.map((item, index) => (
                    <div key={index}>
                        <p>ID: {item.id}</p>
                        <p>Nome: {item.nome}</p>
                        <p>Telefone: {item.telefone}</p>
                        <p>Email: {item.email}</p>
                        <p>Idade: {item.idade}</p>
                        <p>CEP: {item.end_cep}</p>
                        <p>Endereço: {item.end_complemento}</p>
                        <p>Criado em: {item.created_at}</p>
                        <p>Atualizado em: {item.updated_at}</p>
                        {item.deleted_at && <p>Deletado em: {item.deleted_at}</p>}
                    </div>
                ))}
            </div>
        );
    }

    const reactAppElement = document.getElementById('reactApp');
    const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

    ReactDOM.render(<App data={dataResult} />, reactAppElement);
</script>


<!DOCTYPE html>
<html>
<head>
    <title>Sua Página com React</title>
    <!-- React e ReactDOM via CDN -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <!-- Babel via CDN -->
    <script src="https://unpkg.com/@babel/standalone@7.12.10/babel.min.js"></script>
</head>
<body>
    <div id="reactApp" data-result='<?php echo json_encode($result); ?>'></div>

    <script type="text/babel">
        function App({ data }) {
            return (
                <div>
                    {data.map((item, index) => (
                        <div key={index}>{item}</div>
                    ))}
                </div>
            );
        }

        const reactAppElement = document.getElementById('reactApp');
        const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

        ReactDOM.render(<App data={dataResult} />, reactAppElement);
    </script>
</body>
</html>

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

