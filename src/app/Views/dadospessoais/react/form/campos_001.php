<?php
$id_form = (isset($result['id_form']) ? $result['id_form'] : '');
// Aqui como todos os que serão enviados com o react
$in_php_campos_001 = array(
    "id_form" => $id_form,
    // Endereço para submit post
    "url_post" => base_url() . "dadospessoais/api/criar",
    // Endereço para receber dados ou não do formulário. ID virá do Backend ou do segmnto de URL
    "url_api_value" => base_url() . "dadospessoais/api/exibir/" . $id_form,
    // Endereço para <select> tipo_pessoa
    "url_api_tipo_pessoa" => base_url() . "tipopessoa/api/exibir",
    // Token CSRF
    "token_csrf" => '$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2'
);
// myPrint($in_php_campos_001, 'src\app\Views\dadospessoais\react\form\campos_001.php');
?>

<div class="campos_001" data-inphp='<?php echo json_encode($in_php_campos_001); ?>'></div>
<script type="text/babel">
    function AppCampo001() {
        const debugField = true;
        // EXIGE que venha do PHP
        const [tokenCsrf, setTokenCsrf] = React.useState('');
        const [idForm, setIdForm] = React.useState('');
        // Prepara todos os endereços do REACT com o PHP
        const [urlPost, setUrlPost] = React.useState('');
        const [urlApiValue, setUrlApiValue] = React.useState('');
        const [urlApiTipoPessoa, setUrlApiTipoPessoa] = React.useState('');
        // Estados para armazenar os dados recebidos das APIs
        const [dadosApiTipoPessoa, setDadosApiTipoPessoa] = React.useState([]);
        const [dadosApiValue, setDadosApiValue] = React.useState(null)
        // Definindo estados para os campos que queremos extrair
        const [telephone, setTelephone] = React.useState('');
        const [cpf, setCpf] = React.useState('');
        const [birthDate, setBirthDate] = React.useState('');

        React.useEffect(() => {
            const appElement = document.querySelector('.campos_001');
            let data;
            try {
            const responseValue = await fetch(data.url_api_value);
            const apiDataValue = await responseValue.json();

            setDadosApiValue(apiDataValue.result);
            if (apiDataValue.result && apiDataValue.result.length > 0) {
                const item = apiDataValue.result[0];
                setTelephone(item.telephone);
                setCpf(item.cpf);
                setBirthDate(item.birth_date);
            }

            const responseTipoPessoa = await fetch(data.url_api_tipo_pessoa);
            const apiDataTipoPessoa = await responseTipoPessoa.json();
            setDadosApiTipoPessoa(apiDataTipoPessoa.result);
        } catch (error) {
            console.error('Error fetching data:', error);
        }

            setUrlPost(data.url_post);
            setIdForm(data.id_form);
            setTokenCsrf(data.token_csrf);
            setUrlApiValue(data.url_api_value);
            setUrlApiTipoPessoa(data.url_api_tipo_pessoa);

            fetch(data.url_api_value)
                .then(response => response.json())
                .then(apiDataValue => {
                    setDadosApiValue(apiDataValue.result);
                })
                .catch(error => console.error('Error fetching data:', error));

            // Busca os tipos de pessoa
            fetch(data.url_api_tipo_pessoa)
                .then(response => response.json())
                .then(apiDataTipoPessoa => {
                    setDadosApiTipoPessoa(apiDataTipoPessoa.result);
                })
                .catch(error => console.error('Error fetching data:', error));

        }, []);

        return (
            <div className="container">
                {dadosApiValue && dadosApiValue.length > 0 && (<span>{dadosApiValue[0].telephone}</span>)}
                {debugField && (
                    <div>
                        <div id="Exibe os dados Value">
                            {dadosApiValue ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiValue, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                        <div id="Exibe a lista de tipos de pessoas">
                            {dadosApiTipoPessoa ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiTipoPessoa, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                    </div>
                )}
                <form className="was-validated" action={urlPost} method="post">
                    <div className="mb-12">
                        <input
                            type="text"
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
                            value={idForm}
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
                            value={dadosApiValue ? dadosApiValue.personType : ''}
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

                    <button className="btn btn-outline-primary" type="submit">Enviar</button>
                </form>
            </div>
        );
    }
    ReactDOM.render(<AppCampo001 />, document.querySelector('.campos_001'));
</script>