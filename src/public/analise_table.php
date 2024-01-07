<!DOCTYPE html>
<html>

<head>
    <!-- Metadados, estilos, scripts (como React e Babel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.development.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.development.js"></script>
    <!-- Incluindo Babel -->
    <script src="https://unpkg.com/@babel/standalone@7.14.0/babel.min.js"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Titulo da Página -->
    <title>Minha Página com React</title>
</head>

<body class="blackBody">
    <!-- Conteúdo principal da página, incluindo o elemento raiz do React -->
    <header>
        <h1>Pagina de Contatos Fake</h1>
        <!-- Outros elementos do cabeçalho -->
    </header>

    <main>
        <div class="root"></div>
    </main>

    <footer>
        <p>Rodapé da Página</p>
        <!-- Outros elementos do rodapé -->
    </footer>

    <!-- Código do React -->
    <script type="text/babel">
        // Removido import do React e useState, useEffect, agora eles são acessados através do React global
        function App() {
            const [dadosOfUser, setDadosOfUser] = React.useState([]);
            const [carregando, setCarregando] = React.useState(true);
            const [erro, setErro] = React.useState(null);
            const [hideUserId, setHideUserId] = React.useState(null);
            const hideUser = (userId) => {
                // Para ocultar apenas ao clicar e voltar ao clicar no próximo
                // setHideUserId(userId);
                // Para ocultar permanentemente ao clicar
                setDadosOfUser(dadosOfUser.filter(usuario => usuario.id !== userId));
            }
            React.useEffect(() => {
                const fetchData = async () => {
                    try {
                    } catch (error) {
                    setErro(error);
                    } finally {
                        setCarregando(false);
                    }
                };
                document.body.style.backgroundColor = "black";
                document.body.style.color = "#ADD8E6";
                fetch('https://dummyjson.com/users')
                    .then(resposta => resposta.json())
                    .then(
                        (result) => {
                            setCarregando(false);
                            setDadosOfUser(result.users);
                        },
                        (erro) => {
                            setCarregando(false);
                            setErro(erro);
                        }
                    );
            }, []);
            if (erro) {
                return <div>Erro: {erro.message}</div>;
            } else if (carregando) {
                return <div>Carregando...</div>;
            } else {
                return (
                    <div>
                        <table className="table table-dark table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">&emsp;</th>
                                <th scope="col">Foto</th>
                                <th scope="col">ID</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Idade</th>
                                <th scope="col">&emsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            {dadosOfUser.map((usuario) => (
                                hideUserId !== usuario.id && (
                                    <tr key={usuario.id}>
                                        <td>
                                            <button className="btn btn-primary" type="submit">Editar</button>
                                        </td>
                                            <td><img src={usuario.image} alt={usuario.image} height="40px" width="40px"/></td>
                                            <th scope="row">{usuario.id}</th>
                                            <td>{usuario.username}</td>
                                            <td>{usuario.firstName} {usuario.lastName}</td>
                                            <td>{usuario.email}</td>
                                            <td>{usuario.phone}</td>
                                            <td>{usuario.age}</td>
                                        <td>
                                            <button className="btn btn-danger" onClick={() => hideUser(usuario.id)} type="submit">Excluir</button>
                                        </td>
                                    </tr>
                                )
                            ))}
                        </tbody>
                        <tfoot>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                                </table>
                    </div>
                );
            }
        }
        // Renderização do App sem o uso de export
        ReactDOM.render(<App />, document.querySelector('.root'));
    </script>

</body>

</html>