<!-- Div onde o aplicativo React será montado -->
<div id="dadosPessoaisReact_id" data-result='<?php echo json_encode($result); ?>'></div>

<script type="text/babel">
    // Definindo um componente funcional React chamado App_array_id.
    function App_array_id({ data }) {
        // Imprime uma mensagem no console para fins de depuração.
        console.log('function App_array_id');
        
        // O componente retorna o seguinte JSX:
        return (
            // Um div envolvendo todo o conteúdo retornado.
            <div>
                {/* 
                  Usando a função 'map' para iterar sobre cada item em 'data'.
                  'item' representa o elemento atual sendo iterado.
                  'index' é o índice do elemento atual.
                */}
                {data.map((item, index) => (
                    // Cada item da lista é envolvido por um div.
                    // 'key' ajuda o React a identificar quais itens mudaram.
                    <div key={index}>
                        {/* Exibindo o 'id' de cada item */}
                        {item.id}
                    </div>
                ))}
            </div>
        );
    }

    // Buscando o elemento do DOM onde o React será renderizado.
    const reactAppElement = document.getElementById('dadosPessoaisReact_id');

    // Convertendo a string JSON armazenada em 'data-result' em um objeto JavaScript.
    const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

    // Renderizando o componente React dentro do elemento selecionado.
    // Passando 'dataResult' como prop para o componente App_array_id.
    ReactDOM.render(<App_array_id data={dataResult} />, reactAppElement);
</script>
