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
        <div class="AloHabilidade1"></div>
        <div class="AloHabilidade2"></div>
    </main>

    <footer>
        <p>Rodapé da Página</p>
        <!-- Outros elementos do rodapé -->
    </footer>

    <!-- Código do React -->
    <script type="text/babel">
            function AloHabilidade1(props){
            return <h1>Alô, {props.name} Nº 1!!!</h1>;
        }
        ReactDOM.render(<AloHabilidade1 name="Habilidade" />, document.querySelector('.AloHabilidade1'));
    </script>
    
    <!-- Código do React -->
    <script type="text/babel">
        class AloHabilidade2 extends React.Component{
            render(){
                return <h1>Alô, {this.props.name} Nº 2!!!</h1>;
            }
        }
        ReactDOM.render(<AloHabilidade2 name="Habilidade" />, document.querySelector('.AloHabilidade2'));
    </script>
</body>

</html>