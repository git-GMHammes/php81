<?php
$id_form = (isset ($result['id_form']) ? $result['id_form'] : '');
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
        const [addressCode, setAddressCode] = React.useState(null);
        const [addressComplement, setAddressComplement] = React.useState(null);
        const [birthDate, setBirthDate] = React.useState('');
        const [city, setCity] = React.useState(null);
        const [cpf, setCpf] = React.useState('');
        const [createdAt, setCreatedAt] = React.useState('');
        const [deletedAt, setDeletedAt] = React.useState(null);
        const [gender, setGender] = React.useState('');
        const [id, setId] = React.useState('');
        const [mail, setMail] = React.useState(null);
        const [name, setName] = React.useState('');
        const [order, setOrder] = React.useState('');
        const [personType, setPersonType] = React.useState('');
        const [rg, setRg] = React.useState('');
        const [telephone, setTelephone] = React.useState('');
        const [uf, setUf] = React.useState(null);
        const [updatedAt, setUpdatedAt] = React.useState('');

        React.useEffect(() => {
            const appElement = document.querySelector('.campos_001');
            let dataInPhp;
            try {
                dataInPhp = JSON.parse(appElement.getAttribute('data-inphp'));
            } catch (error) {
                console.error('Parsing error:', error);
                return;
            }

            // Defina esses valores imediatamente, já que eles não dependem das chamadas de API.
            setUrlPost(dataInPhp.url_post);
            setIdForm(dataInPhp.id_form);
            setTokenCsrf(dataInPhp.token_csrf);
            setUrlApiValue(dataInPhp.url_api_value);
            setUrlApiTipoPessoa(dataInPhp.url_api_tipo_pessoa);

            // Função assíncrona para buscar os dados da API.
            const fetchData = async () => {
                try {
                    // Chama a API para obter os dados do formulário.
                    const responseValue = await fetch(dataInPhp.url_api_value);
                    const apiDataValue = await responseValue.json();
                    setDadosApiValue(apiDataValue.result);

                    if (apiDataValue.result && apiDataValue.result.length > 0) {
                        const item = apiDataValue.result[0];
                        // Atualizando os estados com os dados recebidos
                        setAddressCode(item.address_code);
                        setAddressComplement(item.address_complement);
                        setBirthDate(item.birth_date);
                        setCity(item.city);
                        setCpf(item.cpf);
                        setCreatedAt(item.created_at);
                        setDeletedAt(item.deleted_at);
                        setGender(item.gender);
                        setId(item.id);
                        setMail(item.mail);
                        setName(item.name);
                        setOrder(item.order);
                        setPersonType(item.person_type);
                        setRg(item.rg);
                        setTelephone(item.telephone);
                        setUf(item.uf);
                        setUpdatedAt(item.updated_at);

                    }

                    // Chama a API para obter os tipos de pessoa.
                    const responseTipoPessoa = await fetch(dataInPhp.url_api_tipo_pessoa);
                    const apiDataTipoPessoa = await responseTipoPessoa.json();
                    setDadosApiTipoPessoa(apiDataTipoPessoa.result);
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            };

            // Executa a função assíncrona definida acima.
            fetchData();
        }, []);

        return (
            <div className="container">
                <div>
                    {telephone}&nbsp; <br />
                    {cpf}&nbsp; <br />
                    {birthDate}&nbsp; <br />
                </div>
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