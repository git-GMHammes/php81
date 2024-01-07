<!DOCTYPE html>
<html>

<head>
    <!-- Metadados, estilos, scripts (como React e Babel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <title>Minha Página com React</title>
</head>

<body>
    <!-- Conteúdo principal da página, incluindo o elemento raiz do React -->
    <header>
        <h1>Cabeçalho da Página</h1>
        <!-- Outros elementos do cabeçalho -->
    </header>

    <main>
        <div class="alerta"></div>
    </main>

    <footer>
        <p>Rodapé da Página</p>
        <!-- Outros elementos do rodapé -->
    </footer>

    <!-- Código do React -->
    <script type="text/babel">

    function BotaoMensagem() {
        const [mensagem, setMensagem] = React.useState(''); 
        const exibirMensagem = () => {
            setMensagem('Mensagem enviada!');
        };

        return (
            <div>
                <button onClick={exibirMensagem}>Enviar Alerta</button>
                {mensagem && <p>{mensagem}</p>}
            </div>
        );
    }

    document.querySelectorAll('.alerta').forEach(domContainer => {
        ReactDOM.render(<BotaoMensagem />, domContainer);
    });
</script>

</body>

</html>