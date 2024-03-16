<?php
// Aqui é a entrega do Backend do Framework não será usado em todos os caregamentos
$result = array(
    'id' => 1005,
    'ordem' => 1,
    'data_minima_cadastro' => '1985-01-01',
);
// Aqui como todos os que serão enviados com o react
$in_php = array(
    "title" => "Titulo do Formulário",
    // Endereço para submit post
    "url_post" => base_url() . "dadospessoais/api/criar",
    // Endereço para receber dados ou não do formulário. ID virá do Backend ou do segmnto de URL
    "url_api_value" => base_url() . "dadospessoais/api/exibir" . (isset($result['id']) ? '/' . $result['id'] : ''),
    // Endereço para <select> tipo_pessoa
    "url_api_tipo_pessoa" => base_url() . "tipopessoa/api/exibir",
    // Endereço para <select> genero
    "url_api_genero" => base_url() . "generopessoa/api/exibir",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat massa id felis dapibus, ac malesuada ipsum venenatis. Pellentesque vitae dui dui. Curabitur sollicitudin metus elementum vulputate blandit. Donec in varius diam. Vestibulum a est quis lacus pretium viverra eu id est. Vivamus efficitur tempus est, sed consectetur justo pellentesque sit amet. Sed vehicula consectetur augue, vel commodo leo pulvinar volutpat. Etiam sagittis non ligula bibendum tincidunt. Nunc sed tellus id arcu interdum dapibus vel sed enim. Ut dictum accumsan viverra. Donec cursus libero ut neque mattis, eu pellentesque lorem pharetra. Nam pharetra iaculis est, quis porta mi iaculis at. Fusce dui felis, pharetra eget massa vel, aliquam vulputate tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quam quam, dictum sed risus quis, euismod tincidunt erat. Mauris pellentesque erat risus.",
    "keywords" => "Ordenar",
    "body" => "ordenar",
    "token_csrf" => '$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2',
    "css" => array(),
    "js" => array()
);
?>

<div class="app_form_dados" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">
    function AppFormDados() {
        const [title, setTitle] = React.useState('');
        const [tokenCsrf, setTokenCsrf] = React.useState('');
        const [urlPost, setUrlPost] = React.useState('');
        const [urlApiValue, setUrlApiValue] = React.useState('');
        const [urlApiTipoPessoa, setUrlApiTipoPessoa] = React.useState('');
        const [urlApiGenero, setUrlApiGenero] = React.useState('');
        const [selectedTipo, setSelectedTipo] = React.useState('');
        const [dadosApiValue, setDadosApiValue] = React.useState(null);
        const [dadosApiTipoPessoa, setDadosApiTipoPessoa] = React.useState([]);
        const [dadosApiGenero, setDadosApiGenero] = React.useState([]);

        // Estados para os dados do formulário
        const [formData, setFormData] = React.useState({
            id: '',
            name: '',
            personType: '',
            order: '',
        });

        // Manipuladores onChange
        const handleInputChange = (event) => {
            const { name, value } = event.target;
            setFormData(prevFormData => ({
                ...prevFormData,
                [name]: value,
            }));
        };

        React.useEffect(() => {
            const appElement = document.querySelector('.app_form_dados');
            let data;
            try {
                data = JSON.parse(appElement.getAttribute('data-inphp'));
            } catch (error) {
                console.error('Parsing error:', error);
                return;
            }

            setTitle(data.title);
            setTokenCsrf(data.token_csrf);
            setUrlPost(data.url_post);
            setUrlApiValue(data.url_api_value);
            setUrlApiTipoPessoa(data.url_api_tipo_pessoa);
            setUrlApiGenero(data.url_api_genero);

            fetch(data.url_api_value)
                .then(response => response.json())
                .then(apiData => {
                    if (apiData && apiData.result) {
                        const apiResult = apiData.result;
                        setSelectedTipo(apiResult.person_type);
                        setName(apiResult.name);
                        // Atualize aqui mais estados conforme necessário
                        setDadosApiValue(apiResult); // Isso atualiza o estado com todos os dados de apiData.result
                    }
                })
                .catch(error => console.error('Error fetching data:', error));

            fetch(data.url_api_tipo_pessoa)
                .then(response => response.json())
                .then(apiDataTipoPessoa => setDadosApiTipoPessoa(apiDataTipoPessoa.result))
                .catch(error => console.error('Error fetching data:', error));

            fetch(data.url_api_genero)
                .then(response => response.json())
                .then(apiDataGenero => setDadosApiGenero(apiDataGenero.result))
                .catch(error => console.error('Error fetching data:', error));
        }, []);

        // Quando os dados da API são recebidos, preenchemos o estado do formulário
        React.useEffect(() => {
            if (dadosApiValue) {
                setFormData({
                    id: dadosApiValue.id || '',
                    name: dadosApiValue.name || '',
                    personType: dadosApiValue.person_type || '',
                    order: dadosApiValue.order || '',
                });
            }
        }, [dadosApiValue]);

        return (
            <div className="container">
                <form className="was-validated" action={urlPost} method="post">
                    <div className="mb-12">
                        <input
                            type="hidden"
                            className="form-control"
                            id={"token_csrf"}
                            name="token_csrf"
                            value={tokenCsrf}
                            readOnly
                        />
                    </div>
                    <div className="mb-12">
                        <label htmlFor="id" className="form-label">
                            ID
                        </label>
                        <input
                            type="text"
                            className="form-control is-valid"
                            id="id"
                            name="id"
                            value={formData ? formData.id : ''}
                            readOnly
                        />
                        <div className="valid-feedback">
                            o 'id' do registro
                        </div>
                    </div>

                    <div className="mb-12">
                        <label htmlFor="tipo" className="form-label">Tipo</label>
                        <select
                            className="form-select"
                            id="tipo"
                            name="personType"
                            value={formData.personType}
                            onChange={handleInputChange}
                            required
                        >
                            <option value="">Escolha um tipo</option>
                            {dadosApiTipoPessoa && dadosApiTipoPessoa.map((tipo, index) => (
                                <option key={index} value={tipo.id_slug}>
                                    {tipo.descricao}
                                </option>
                            ))}
                        </select>
                        <div className="invalid-feedback">Selecione um tipo válido.</div>
                    </div>

                    <div className="mb-12">
                        <label htmlFor="order" className="form-label">Ordem</label>
                        <input
                            type="text"
                            className="form-control is-valid"
                            id="order"
                            name="order"
                            value={formData.order}
                            onChange={handleInputChange}
                            required
                        />
                        <div className="valid-feedback">
                            Favor informar a ordem na Tebela
                        </div>
                    </div>

                    <div className="mb-12">
                        <label htmlFor="name" className="form-label">Nome Completo</label>
                        <input
                            type="text"
                            className="form-control is-valid"
                            id="name"
                            name="name"
                            value={formData.name}
                            onChange={handleInputChange}
                            required
                        />
                        <div className="valid-feedback">
                            Favor informar um nome completo
                        </div>
                    </div>

                    <button className="btn btn-outline-primary" type="submit">Enviar</button>
                </form>
            </div>
        );
    }
    ReactDOM.render(<AppFormDados />, document.querySelector('.app_form_dados'));
</script>