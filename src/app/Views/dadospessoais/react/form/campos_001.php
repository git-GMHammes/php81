<?php
$id_form = (isset ($result['id_form']) ? $result['id_form'] : '');
// Aqui como todos os que serão enviados com o react
$in_php_campos_001 = array(
    "id_form" => $id_form,
    // Endereço para submit post
    "url_post" => base_url() . "dadospessoais/api/atualizar",
    // Endereço para receber dados ou não do formulário. ID virá do Backend ou do segmnto de URL
    "url_api_value" => base_url() . "dadospessoais/api/exibir/" . $id_form,
    // Endereço para <select> tipo_pessoa
    "url_api_person_type" => base_url() . "tipopessoa/api/exibir",
    // Endereço para <select> tipo_pessoa
    "url_api_gender" => base_url() . "generopessoa/api/exibir",
    // Token CSRF
    "token_csrf" => '$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2'
);
// myPrint($in_php_campos_001, 'src\app\Views\dadospessoais\react\form\campos_001.php');
?>

<div class="campos_001" data-inphp='<?php echo json_encode($in_php_campos_001); ?>'></div>
<script type="text/babel">

    function CamposOcultos({ tokenCsrf, idForm }) {
        return (
            <>
                <input type="hidden" name="token_csrf" value={tokenCsrf} readOnly />
                <input type="hidden" name="id" value={idForm} readOnly />
            </>
        );
    }

    function AppCampo001() {

        const enviarCampo = async (nomeDoCampo, valorDoCampo) => {
            if (valorDoCampo.trim() === '') {
                console.error("O campo não pode estar vazio");
                return;
            }

            const formData = new FormData();
            formData.append('token_csrf', tokenCsrf);
            formData.append('id', idForm);
            formData.append(nomeDoCampo, valorDoCampo);

            try {
                const response = await fetch(urlPost, {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    console.log("Campo enviado com sucesso!");
                } else {
                    console.error("Falha ao enviar campo");
                }
            } catch (error) {
                console.error("Erro na requisição:", error);
            }
        };

        const debugField = false;
        // EXIGE que venha do PHP
        const [tokenCsrf, setTokenCsrf] = React.useState('');
        const [idForm, setIdForm] = React.useState('');
        // Prepara todos os endereços do REACT com o PHP
        const [urlPost, setUrlPost] = React.useState('');
        const [urlApiValue, setUrlApiValue] = React.useState('');
        const [urlApiPersonType, setUrlApiPersonType] = React.useState('');
        const [urlApiGender, setUrlApiGender] = React.useState('');
        // Estados para armazenar os dados recebidos das APIs
        const [dadosApiPersonType, setDadosPersonType] = React.useState([]);
        const [dadosApiGender, setDadosGender] = React.useState([]);
        const [dadosApiValue, setDadosApiValue] = React.useState(null)
        // Definindo estados para os campos que queremos extrair
        const [addressComplement, setAddressComplement] = React.useState(null);
        const [addressCode, setAddressCode] = React.useState(null);
        const [deletedAt, setDeletedAt] = React.useState(null);
        const [personType, setPersonType] = React.useState('');
        const [birth_date, setBirthDate] = React.useState('');
        const [createdAt, setCreatedAt] = React.useState('');
        const [telephone, setTelephone] = React.useState('');
        const [updatedAt, setUpdatedAt] = React.useState('');
        const [full_name, setFullName] = React.useState('');
        const [gender, setGender] = React.useState('');
        const [mail, setMail] = React.useState(null);
        const [city, setCity] = React.useState(null);
        const [order, setOrder] = React.useState('');
        const [uf, setUf] = React.useState(null);
        const [cpf, setCpf] = React.useState('');
        const [id, setId] = React.useState('');
        const [rg, setRg] = React.useState('');

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
            setUrlApiPersonType(dataInPhp.url_api_person_type);
            setUrlApiGender(dataInPhp.url_api_gender);

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
                        setAddressComplement(item.address_complement);
                        setAddressCode(item.address_code);
                        setPersonType(item.person_type);
                        setDeletedAt(item.deleted_at);
                        setBirthDate(item.birth_date);
                        setCreatedAt(item.created_at);
                        setUpdatedAt(item.updated_at);
                        setTelephone(item.telephone);
                        setGender(item.gender);
                        setOrder(item.order);
                        setFullName(item.full_name);
                        setCity(item.city);
                        setMail(item.mail);
                        setCpf(item.cpf);
                        setId(item.id);
                        setRg(item.rg);
                        setUf(item.uf);
                    }

                    // Chama a API para obter os tipos de pessoa.
                    const responsePersonType = await fetch(dataInPhp.url_api_person_type);
                    const apiDataPersonType = await responsePersonType.json();
                    setDadosPersonType(apiDataPersonType.result);

                    // Chama a API para obter os generos
                    const responseGender = await fetch(dataInPhp.url_api_gender);
                    const apiDataGender = await responseGender.json();
                    setDadosGender(apiDataGender.result);
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            };

            // Executa a função assíncrona definida acima.
            fetchData();
        }, []);

        return (
            <div className="container">
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
                            {dadosApiGender ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiGender, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                        <div id="Exibe a lista de tipos de pessoas">
                            {dadosApiPersonType ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiPersonType, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                    </div>
                )}

                <form className="was-validated" action={urlPost} method="post">

                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                    <div className="mb-12">
                        <label htmlFor="tipo" className="form-label">Tipo</label>
                        <select
                            className="form-select"
                            id="tipo"
                            name="personType"
                            value={personType}
                            onChange={e => setPersonType(e.target.value)}
                            onBlur={() => enviarCampo('personType', personType)}
                            required
                        >
                            <option value="">Escolha um tipo</option>
                            {dadosApiPersonType && dadosApiPersonType.map((tipo, index) => (
                                <option key={index} value={tipo.id_slug} selected={personType === tipo.descricao ? true : null}>
                                    {tipo.descricao}
                                </option>
                            ))}
                        </select>
                        <div className="invalid-feedback">Selecione um tipo válido.</div>
                    </div>

                </form>
                <form className="was-validated" action={urlPost} method="post">

                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                    <div className="mb-12">
                        <label htmlFor="nome" className="form-label">Nome</label>
                        <input
                            type="text"
                            className="form-control"
                            id="full_name"
                            name="full_name"
                            value={full_name}
                            onChange={e => setFullName(e.target.value)}
                            onBlur={() => enviarCampo('full_name', full_name)}
                            required
                        />
                        <div className="invalid-feedback">Por favor, insira um nome.</div>
                    </div>

                </form>
                <form className="was-validated" action={urlPost} method="post">

                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                    <div className="mb-12">
                        <label htmlFor="tipo" className="form-label">Gênero</label>
                        <select
                            className="form-select"
                            id="tipo"
                            name="gender"
                            value={gender}
                            onChange={e => setGender(e.target.value)}
                            onBlur={() => enviarCampo('gender', gender)}
                            required
                        >
                            <option value="">Escolha um Genero</option>
                            {dadosApiGender && dadosApiGender.map((drop_gender_person, index) => (
                                <option key={index} value={drop_gender_person.id_slug} selected={drop_gender_person === drop_gender_person.descricao ? true : null}>
                                    {drop_gender_person.descricao}
                                </option>
                            ))}
                        </select>
                        <div className="invalid-feedback">Selecione um Gênero válido.</div>
                    </div>

                </form>
                <form className="was-validated" action={urlPost} method="post">

                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                    <div className="mb-12">
                        <label htmlFor="nome" className="form-label">Nome</label>
                        <input
                            type="date"
                            className="form-control"
                            id="birth_date"
                            name="birth_date"
                            value={birth_date}
                            onChange={e => setBirthDate(e.target.value)}
                            onBlur={() => enviarCampo('birth_date', birth_date)}
                            required
                        />
                        <div className="invalid-feedback">Por favor, insira um nome.</div>
                    </div>

                </form>

            </div>
        );
    }
    ReactDOM.render(<AppCampo001 />, document.querySelector('.campos_001'));
</script>