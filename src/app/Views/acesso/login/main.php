<?php
#
$date = new DateTime();
$formatter = new IntlDateFormatter(
    'pt_BR',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'America/Sao_Paulo',
    IntlDateFormatter::GREGORIAN
);
#
$login_uri = (isset ($metadata['getURI'])) ? ($metadata['getURI']) : (array());
#
switch ($login_uri) {
    case in_array('token', $login_uri):
        $menu_user = 'token';
        break;
    case in_array('busca', $login_uri):
        $menu_user = 'busca';
        break;
    case in_array('recupera', $login_uri):
        $menu_user = 'recupera';
        break;
    default:
        $menu_user = 'login';
        break;
}
$in_php = array(
    "title" => "Sistema de Login",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    "rodape_card" => "PRORES" . ' ' . $formatter->format($date),
    'menu_log' => $menu_user,
    'menu_url_login' => base_url() . 'acesso/usuario/endpoint/login/login#a_login',
    'menu_url_token' => base_url() . 'acesso/usuario/endpoint/login/token#a_token',
    'menu_url_busca' => base_url() . 'acesso/usuario/endpoint/login/busca#a_busca',
    'menu_url_recupera' => base_url() . 'acesso/usuario/endpoint/login/recupera#a_recupera',
    "url_api_orgão" => base_url() . "sessao/api/verbo/parametro",
    "url_post" => base_url() . "sessao/api/verbo/parametro",
);
#
// myPrint($in_php, 'src\app\Views\acesso\login\main.php');
#
?>

<div class="system_Login" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">

    function ContainerLogin() {

        return (
            <form action="/submit-form" method="post">
                <div className="ms-2">
                    <div className="mb-3">
                        <label htmlFor="cpf" className="form-label">CPF</label>
                        <input
                            type="number"
                            className="form-control"
                            id="cpf"
                            placeholder={"00011122233"}
                            required
                        />
                        <div className="invalid-feedback">
                            Somente números sem pontos ou letras.
                        </div>
                    </div>
                    <div className="mb-3">
                        <label htmlFor="receber" className="form-label">Como deseja receber o Token?</label>
                        <div className="form-check">
                            <input
                                type="radio"
                                className="form-check-input"
                                id="prevented"
                                name="prevented"
                                required
                            />
                            <label className="form-check-label" htmlFor="prevented">Whatsapp</label>
                        </div>
                        <div className="form-check mb-3">
                            <input
                                type="radio"
                                className="form-check-input"
                                id="prevented"
                                name="prevented"
                                required
                            />
                            <label className="form-check-label" htmlFor="recebe_mail">E-mail</label>
                            <div className="invalid-feedback">Escolha um canal de envio</div>
                        </div>
                    </div>
                    <div className="mb-3">
                        <button className="btn btn-outline-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        );
    }

    function ContainerToken() {
        return (
            <form action="/submit-form" method="post">
                <div className="ms-2">
                    <div>
                        <div className="mb-3">
                            <label htmlFor="tonen" className="form-label">Token</label>
                            <input
                                type="number"
                                className="form-control"
                                id="tonen"
                                placeholder={"123456"}
                                required
                            />
                            <div className="invalid-feedback">
                                Somente números sem pontos ou letras.
                            </div>
                        </div>
                        <div className="mb-3">
                            <button className="btn btn-outline-primary" type="submit">Enviar</button>
                        </div>
                    </div>

                </div>
            </form>
        );
    }

    function ContainerBusca() {
        return (
            <form action="/submit-form" method="post">
                <div className="ms-2">
                    <div className="mb-3">
                        <label htmlFor="cpf" className="form-label">CPF</label>
                        <input
                            type="number"
                            className="form-control"
                            id="cpf"
                            placeholder={"00011122233"}
                            required
                        />
                        <div className="invalid-feedback">
                            Somente números sem pontos ou letras.
                        </div>
                    </div>
                    <div className="mb-3">
                        <button className="btn btn-outline-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        );
    }

    function ContainerRecupera() {
        return (
            <form action="/submit-form" method="post">
                <div className="ms-2">
                    <div className="mb-3">
                        <label htmlFor="cpf" className="form-label">CPF</label>
                        <input type="number" className="form-control" id="cpf" placeholder={"00011122233"} required />
                        <div className="invalid-feedback">
                            Somente números sem pontos ou letras.
                        </div>
                    </div>
                    <div className="mb-3">
                        <label htmlFor="celular" className="form-label">Celular</label>
                        <input type="number" className="form-control" id="celular" placeholder={"21000001111"} required />
                        <div className="invalid-feedback">
                            Somente números, 2 digitos para DDD e 9 digitos para o número, sem pontos ou letras.
                        </div>
                    </div>
                    <div className="mb-3">
                        <label htmlFor="mail" className="form-label">E-mail</label>
                        <input type="mail" className="form-control" id="mail" placeholder="login@server.com" required />
                        <div className="invalid-feedback">
                            O E-mail deve possuir ao menos: um login, um "@" e um Servidor.
                        </div>
                    </div>
                    <div className="mb-3">
                        <button className="btn btn-outline-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        );
    }

    function AppSystemLogin() {
        // Estado para armazenar dados recebidos da API
        const [dadosRecebidosAPI, setDadosAPI] = React.useState([]);
        // Estados para armazenar informações passadas pelo PHP
        const [title, setTitle] = React.useState('');
        const [rodape_card, setRodapeCard] = React.useState('');
        const [menu_log, setMenuLog] = React.useState('');
        const [menu_url_login, setMenuUrlLogin] = React.useState('');
        const [menu_url_token, setMenuUrlToken] = React.useState('');
        const [menu_url_busca, setMenuUrlBusca] = React.useState('');
        const [menu_url_recupera, setMenuUrlRecupera] = React.useState('');
        const [urlPost, setUrlPost] = React.useState('');

        React.useEffect(() => {
            const appElement = document.querySelector('.system_Login');
            // Extrai e decodifica os dados passados pelo PHP
            const dataResult = appElement.getAttribute('data-inphp');
            const data = JSON.parse(dataResult);
            // Define os dados extraídos nos estados correspondentes
            setTitle(data.title);
            setRodapeCard(data.rodape_card);
            setMenuLog(data.menu_log);
            setMenuUrlLogin(data.menu_url_login);
            setMenuUrlToken(data.menu_url_token);
            setMenuUrlBusca(data.menu_url_busca);
            setMenuUrlRecupera(data.menu_url_recupera);
            setUrlPost(data.url_post);
        }, []);

        return (
            <div className="container">
                <div className="card mt-4 mb-2 ms-2 me-2">
                    <div className="card-header">
                        <h5 className="card-title">{title}</h5>
                    </div>
                    <div className="card-body mb-0">
                        <ul className="nav nav-tabs">
                            <li className="nav-item">
                                <a
                                    className={`nav-link ${menu_log === 'login' ? 'active' : ''}`}
                                    {...(menu_log === 'login' ? { 'aria-current': 'page' } : {})}
                                    href="'acesso/usuario/endpoint/login/login#a_login'"
                                >
                                    Login
                                </a>
                            </li>
                            <li className="nav-item">
                                <a
                                    className={`nav-link ${menu_log === 'token' ? 'active' : ''}`}
                                    {...(menu_log === 'login' ? { 'aria-current': 'page' } : {})}
                                    href="'acesso/usuario/endpoint/login/token#a_token'"
                                >
                                    Token
                                </a>
                            </li>
                            <li className="nav-item">
                                <a
                                    className={`nav-link ${menu_log === 'busca' ? 'active' : ''}`}
                                    {...(menu_log === 'login' ? { 'aria-current': 'page' } : {})}
                                    href="'acesso/usuario/endpoint/login/busca#a_busca'"
                                >
                                    Busca
                                </a>
                            </li>
                            <li className="nav-item">
                                <a
                                    className={`nav-link ${menu_log === 'recupera' ? 'active' : ''}`}
                                    {...(menu_log === 'login' ? { 'aria-current': 'page' } : {})}
                                    href="'acesso/usuario/endpoint/login/recupera#a_recupera'"
                                >
                                    Recupera
                                </a>
                            </li>
                        </ul>
                        <div className="border border-1 border-top-0">
                            <div className="ms-2">
                                {menu_log === 'login' && <ContainerLogin />}
                                {menu_log === 'token' && <ContainerToken />}
                                {menu_log === 'busca' && <ContainerBusca />}
                                {menu_log === 'recupera' && <ContainerRecupera />}
                            </div>
                        </div>
                    </div>
                    <div className="card-footer text-right">
                        <div className="text-end">
                            <small className="text-muted">{rodape_card}</small>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
    ReactDOM.render(<AppSystemLogin />, document.querySelector('.system_Login'));
</script>