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
        <div class="alerta"></div>
        <div class="cor"></div>
    </main>

    <footer>
        <p>Rodapé da Página</p>
        <!-- Outros elementos do rodapé -->
    </footer>

    <!-- Código do React -->
    <script type="text/babel">
        class BotaoMensagem extends React.Component {
            exibirMensagem() {
                alert("Mensagem enviada!");
            }

            render() {
                return <button onClick={this.exibirMensagem}>Enviar Mensagem</button>;
            }
        }
        // Várias class="alerta"
        document.querySelectorAll('.alerta').forEach(domContainer => {
        ReactDOM.render(<BotaoMensagem />, domContainer);
    });
    // Uma class="alerta"
    // ReactDOM.render(<BotaoMensagem />, document.querySelector('.alerta'));
    </script>
    <script type="text/babel">
        class BotaoMudaCor extends React.Component {
        mudarCorDoBody() {
            document.body.style.backgroundColor = "lightblue"; // ou qualquer cor desejada
        }

        resetarCorDoBody() {
            document.body.style.backgroundColor = "white"; // volta a cor para branco
        }

        render() {
            return (
                <div>
                    <button onClick={this.mudarCorDoBody}>Mudar Cor do Fundo</button>
                    <button onClick={this.resetarCorDoBody}>Resetar Cor do Fundo</button>
                </div>
            );
        }
    }

    ReactDOM.render(<BotaoMudaCor />, document.querySelector('.cor'));
</script>
</body>

</html>