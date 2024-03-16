<div class="d-flex justify-content-center">
    # route GET /www/dadospessoais/endpoint/listar/array/(:any)
</div>
<div class="d-flex justify-content-center">
    https://github.com/git-GMHammes/php81/blob/main/src/app/Views/dadospessoais/react/array/001_array_id.php
</div>
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
            <div className="container mt-4">
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
    }

    // Buscando o elemento do DOM onde o React será renderizado.
    const reactAppElement = document.getElementById('dadosPessoaisReact_id');

    // Convertendo a string JSON armazenada em 'data-result' em um objeto JavaScript.
    const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

    // Renderizando o componente React dentro do elemento selecionado.
    // Passando 'dataResult' como prop para o componente App_array_id.
    ReactDOM.render(<App_array_id data={dataResult} />, reactAppElement);
</script>
