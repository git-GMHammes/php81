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
    // Endereço para <select> orgao_seguranca
    "url_api_orgao_seguranca" => base_url() . "orgaoseguranca/api/exibir",
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
        const [urlApiOrgaoSeguranca, setUrlApiOrgaoSeguranca] = React.useState('');
        const [urlApiPersonType, setUrlApiPersonType] = React.useState('');
        const [urlApiGender, setUrlApiGender] = React.useState('');
        const [urlApiValue, setUrlApiValue] = React.useState('');
        const [urlPost, setUrlPost] = React.useState('');
        // Estados para armazenar os dados recebidos das APIs
        const [dadosApiOrgaoSeguranca, setDadosOrgaoSeguranca] = React.useState([]);
        const [dadosApiPersonType, setDadosPersonType] = React.useState([]);
        const [dadosApiValue, setDadosApiValue] = React.useState(null)
        const [dadosApiGender, setDadosGender] = React.useState([]);
        // Definindo estados para os campos que queremos extrair
        const [administrative_unit, setAdministrativeUnit] = React.useState('');
        const [address_complement, setAddressComplement] = React.useState(null);
        const [government_organ, setGovernmentOrgan] = React.useState('');
        const [expeditor_organ, setExpeditorOrgan] = React.useState('');
        const [expedition_date, setExpeditionDate] = React.useState('');
        const [function_patent, setFunctionPatent] = React.useState('');
        const [cpf_validation, setCpfValidation] = React.useState('');
        const [address_code, setAddressCode] = React.useState(null);
        const [deletedAt, setDeletedAt] = React.useState(null);
        const [government, setGovernment] = React.useState('');
        const [personType, setPersonType] = React.useState('');
        const [birth_date, setBirthDate] = React.useState('');
        const [createdAt, setCreatedAt] = React.useState('');
        const [telephone, setTelephone] = React.useState('');
        const [updatedAt, setUpdatedAt] = React.useState('');
        const [prevented, setPrevented] = React.useState('');
        const [full_name, setFullName] = React.useState('');
        const [initials, setInitials] = React.useState('');
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
            setUrlApiOrgaoSeguranca(dataInPhp.url_api_orgao_seguranca);
            setUrlApiPersonType(dataInPhp.url_api_person_type);
            setUrlApiGender(dataInPhp.url_api_gender);
            setUrlApiValue(dataInPhp.url_api_value);
            setTokenCsrf(dataInPhp.token_csrf);
            setUrlPost(dataInPhp.url_post);
            setIdForm(dataInPhp.id_form);

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
                        setAdministrativeUnit(item.administrative_unit);
                        setAddressComplement(item.address_complement);
                        setGovernmentOrgan(item.government_organ);
                        setExpeditorOrgan(item.expeditor_organ);
                        setExpeditionDate(item.expedition_date);
                        setFunctionPatent(item.function_patent);
                        setCpfValidation(item.cpf_validation);
                        setAddressCode(item.address_code);
                        setPersonType(item.person_type);
                        setGovernment(item.government);
                        setDeletedAt(item.deleted_at);
                        setBirthDate(item.birth_date);
                        setCreatedAt(item.created_at);
                        setUpdatedAt(item.updated_at);
                        setTelephone(item.telephone);
                        setPrevented(item.prevented);
                        setFullName(item.full_name);
                        setInitials(item.initials);
                        setGender(item.gender);
                        setOrder(item.order);
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

                    // Chama a API para obter os orgao de Segurança
                    const responseOrgaoSeguranca = await fetch(dataInPhp.url_api_orgao_seguranca);
                    const apiDataOrgaoSeguranca = await responseOrgaoSeguranca.json();
                    setDadosOrgaoSeguranca(apiDataOrgaoSeguranca.result);
                } catch (error) {
                    console.error('Error fetching data:', error);
                }
            };

            // Executa a função assíncrona definida acima.
            fetchData();
        }, []);

        return (
            <div className="container">
                <h1>Formulário from API</h1>
                <h3>'http://localhost:4107/index.php/dadospessoais/endpoint/create/dadospessoais/1036'</h3>
                <div>
                    <div className="d-flex justify-content-center">
                        # route GET /www/dadospessoais/endpoint/create/dadospessoais/(:any)
                    </div>
                    <div className="d-flex justify-content-center">
                        https://github.com/git-GMHammes/php81/blob/main/src/app/Views/dadospessoais/react/form/campos_001.php
                    </div>
                </div>
                {debugField && (
                    <div>
                        <h3>API Value</h3>
                        <div id="Exibe os dados Value">
                            {dadosApiValue ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiValue, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                        <h3>API Genero</h3>
                        <div id="Exibe a lista de Generos">
                            {dadosApiGender ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiGender, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                        <h3>API Tipo Pessoa</h3>
                        <div id="Exibe a lista de tipos de pessoas">
                            {dadosApiPersonType ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiPersonType, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                        <h3>API Orgão de Segurança</h3>
                        <div id="Exibe a lista de Orgãoes de Segurança">
                            {dadosApiOrgaoSeguranca ? (
                                <div>
                                    <pre>{JSON.stringify(dadosApiOrgaoSeguranca, null, 2)}</pre>
                                </div>
                            ) : (
                                <p>Carregando dados ou não disponível...</p>
                            )}
                        </div>
                    </div>
                )}

                <fieldset className="border border-secondary border-1 p-3 mb-2">
                    <legend className="float-none w-auto p-2">Identificação Pessoal</legend>
                    <div className="row">
                        <div className="col-12 col-sm-4">
                            <label htmlFor="false" className="form-label">Id</label>
                            <input
                                type="text"
                                className="form-control"
                                value={idForm}
                                disabled
                            />
                            <div className="invalid-feedback">&nbsp;</div>
                        </div>
                        <div className="col-12 col-sm-4">
                            <label htmlFor="false" className="form-label">Ordem</label>
                            <input
                                type="text"
                                className="form-control"
                                value={order}
                                disabled
                            />
                            <div className="invalid-feedback">&nbsp;</div>
                        </div>
                        <div className="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-3">
                                    <label htmlFor="prevented" className="form-label">Impedimento</label>&emsp;
                                    <div className="d-flex justify-content-start">
                                        <div className="form-check">
                                            <input
                                                type="radio"
                                                className="form-check-input"
                                                id="prevented"
                                                name="prevented"
                                                value="Y"
                                                checked={prevented === 'Y'}
                                                onChange={() => setPrevented('Y')}
                                                onBlur={() => enviarCampo('prevented', 'Y')}
                                                required
                                            />
                                            <label className="form-check-label" htmlFor="prevented">Sim</label>&emsp;/&emsp;
                                        </div>
                                        <div className="form-check">
                                            <input
                                                type="radio"
                                                className="form-check-input"
                                                id="prevented"
                                                name="prevented"
                                                value="N"
                                                checked={prevented === 'N'}
                                                onChange={() => setPrevented('N')}
                                                onBlur={() => enviarCampo('prevented', 'N')}
                                                required
                                            />
                                            <label className="form-check-label" htmlFor="preventedNo">Não</label>
                                        </div>
                                    </div>
                                    <div className="invalid-feedback">Informe se o Cadastro possui algum impedimento</div>
                                </div>
                            </form >
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-12 col-sm-12">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="full_name" className="form-label">Nome</label>
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
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="personType" className="form-label">Tipo</label>
                                    <select
                                        className="form-select"
                                        id="personType"
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
                        </div>
                        <div className="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="birth_date" className="form-label">Aniversário</label>
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
                                    <div className="invalid-feedback">Por favor, insira a data de Aniversário.</div>
                                </div>

                            </form>
                        </div>
                        <div className="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="gender" className="form-label">Gênero</label>
                                    <select
                                        className="form-select"
                                        id="gender"
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
                        </div>
                    </div>
                </fieldset>
                <fieldset className="border border-secondary border-1 p-3 mb-2">
                    <legend className="float-none w-auto p-2">Contato</legend>
                    <div className="row">
                        <div className="col-12 col-sm-6">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="telephone" className="form-label">Telefone</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="telephone"
                                        name="telephone"
                                        value={telephone}
                                        onChange={e => setFullName(e.target.value)}
                                        onBlur={() => enviarCampo('telephone', telephone)}
                                        required
                                    />
                                    <div className="invalid-feedback">Por favor, insira telefone celular.</div>
                                </div>
                            </form>
                        </div>
                        <div className="col-12 col-sm-6">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="mail" className="form-label">E-mail</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="mail"
                                        name="mail"
                                        value={mail}
                                        onChange={e => setFullName(e.target.value)}
                                        onBlur={() => enviarCampo('mail', mail)}
                                        required
                                    />
                                    <div className="invalid-feedback">Por favor, insira um e-mail.</div>
                                </div>

                            </form>
                        </div>
                    </div>
                </fieldset>
                <fieldset className="border border-secondary border-1 p-3 mb-2">
                    <legend className="float-none w-auto p-2">Documentação</legend>
                    <div>
                        <div className="row">
                            <div className="col-12 col-sm-4">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="rg" className="form-label">RG</label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="rg"
                                            name="rg"
                                            value={rg}
                                            onChange={e => setFullName(e.target.value)}
                                            onBlur={() => enviarCampo('rg', rg)}
                                            required
                                        />
                                        <div className="invalid-feedback">Por favor, insira um RG.</div>
                                    </div>

                                </form>
                            </div>
                            <div className="col-12 col-sm-4">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="expeditor_organ" className="form-label">Orgão expedidor</label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="expeditor_organ"
                                            name="expeditor_organ"
                                            value={expeditor_organ}
                                            onChange={e => setFullName(e.target.value)}
                                            onBlur={() => enviarCampo('expeditor_organ', expeditor_organ)}
                                            required
                                        />
                                        <div className="invalid-feedback">Por favor, insira um Orgão Expedidor.</div>
                                    </div>

                                </form>
                            </div>
                            <div className="col-12 col-sm-4">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="expedition_date" className="form-label">Data de Expedição</label>
                                        <input
                                            type="date"
                                            className="form-control"
                                            id="expedition_date"
                                            name="expedition_date"
                                            value={expedition_date}
                                            onChange={e => setBirthDate(e.target.value)}
                                            onBlur={() => enviarCampo('expedition_date', expedition_date)}
                                            required
                                        />
                                        <div className="invalid-feedback">Por favor, insira Data de Expedição.</div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-12 col-sm-6">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="cpf" className="form-label">CPF</label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="cpf"
                                            name="cpf"
                                            value={cpf}
                                            onChange={e => setFullName(e.target.value)}
                                            onBlur={() => enviarCampo('cpf', cpf)}
                                            required
                                        />
                                        <div className="invalid-feedback">Por favor, insira um CPF válido.</div>
                                    </div>

                                </form>
                            </div>
                            <div className="col-12 col-sm-6">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-3">
                                        <label htmlFor="cpf_validation" className="form-label">CPF Validado</label>&emsp;
                                        <div className="d-flex justify-content-start">
                                            <div className="form-check">
                                                <input
                                                    type="radio"
                                                    className="form-check-input"
                                                    id="preventedYes"
                                                    name="cpf_validation"
                                                    value="Y"
                                                    checked={cpf_validation === 'Y'}
                                                    onChange={() => setPrevented('Y')}
                                                    onBlur={() => enviarCampo('cpf_validation', 'Y')}
                                                    required
                                                />
                                                <label className="form-check-label" htmlFor="preventedYes">Sim</label>&emsp;/&emsp;
                                            </div>
                                            <div className="form-check">
                                                <input
                                                    type="radio"
                                                    className="form-check-input"
                                                    id="preventedNo"
                                                    name="cpf_validation"
                                                    value="N"
                                                    checked={cpf_validation === 'N'}
                                                    onChange={() => setPrevented('N')}
                                                    onBlur={() => enviarCampo('cpf_validation', 'N')}
                                                    required
                                                />
                                                <label className="form-check-label" htmlFor="preventedNo">Não</label>
                                            </div>
                                        </div>
                                        <div className="invalid-feedback">Informe se o CPF esta validado</div>
                                    </div>
                                </form >
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset className="border border-secondary border-1 p-3 mb-2">
                    <legend className="float-none w-auto p-2">Vínculo Empregatício</legend>
                    <div>
                        <div className="row">
                            <div className="col-12 col-sm-2">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="initials" className="form-label">Sigla</label>
                                        <select
                                            className="form-select"
                                            id="initials"
                                            name="initials"
                                            value={initials}
                                            onChange={e => setPersonType(e.target.value)}
                                            onBlur={() => enviarCampo('initials', initials)}
                                            required
                                        >
                                            <option value="">Sigla</option>
                                            {dadosApiOrgaoSeguranca && dadosApiOrgaoSeguranca.map((initials, index) => (
                                                <option key={index} value={initials.initials} selected={initials === initials.initials ? true : null}>
                                                    {initials.initials}
                                                </option>
                                            ))}
                                        </select>
                                        <div className="invalid-feedback">Escolha uma sigla</div>
                                    </div>

                                </form>
                            </div>
                            <div className="col-12 col-sm-10">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="government_organ" className="form-label">Órgão de Segurança</label>
                                        <select
                                            className="form-select"
                                            id="government_organ"
                                            name="government_organ"
                                            value={government_organ}
                                            onChange={e => setPersonType(e.target.value)}
                                            onBlur={() => enviarCampo('government_organ', government_organ)}
                                            required
                                        >
                                            <option value="">Escolha um Órgão de Segurança</option>
                                            {dadosApiOrgaoSeguranca && dadosApiOrgaoSeguranca.map((dropOrgaoSeguranca, index) => (
                                                <option key={index} value={dropOrgaoSeguranca.descricao} selected={government_organ === dropOrgaoSeguranca.descricao ? true : null}>
                                                    {dropOrgaoSeguranca.descricao}
                                                </option>
                                            ))}
                                        </select>
                                        <div className="invalid-feedback">Selecione um Órgão</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-12 col-sm-12">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="administrative_unit" className="form-label">Unidade Administrativa</label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="administrative_unit"
                                            name="administrative_unit"
                                            value={administrative_unit}
                                            onChange={e => setFullName(e.target.value)}
                                            onBlur={() => enviarCampo('administrative_unit', administrative_unit)}
                                            required
                                        />
                                        <div className="invalid-feedback">Por favor, insira uma unidade administrativa</div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div className="row">
                            <div className="col-12 col-sm-6">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="function_patent" className="form-label">Função/Patente</label>
                                        <input
                                            type="text"
                                            className="form-control"
                                            id="function_patent"
                                            name="function_patent"
                                            value={function_patent}
                                            onChange={e => setFullName(e.target.value)}
                                            onBlur={() => enviarCampo('function_patent', function_patent)}
                                            required
                                        />
                                        <div className="invalid-feedback">Por favor, insira uma função ou Patente</div>
                                    </div>
                                </form>
                            </div>
                            <div className="col-12 col-sm-6">
                                <form className="was-validated" action={urlPost} method="post">

                                    <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                    <div className="mb-12">
                                        <label htmlFor="government" className="form-label">Esfera Governamental</label>
                                        <select
                                            className="form-select"
                                            id="government"
                                            name="government"
                                            value={government}
                                            onChange={e => setPersonType(e.target.value)}
                                            onBlur={() => enviarCampo('government', government)}
                                            required
                                        >
                                            <option value="">Escolha uma esfera</option>
                                            <option value="Municipal">Municipal</option>
                                            <option value="Estadual" selected>Estadual</option>
                                            <option value="Federal">Federal</option>
                                        </select>
                                        <div className="invalid-feedback">Por favor, insira uma esfera governamental</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset className="border border-secondary border-1 p-3 mb-2">
                    <legend className="float-none w-auto p-2">Endereço Completo</legend>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="address_complement" className="form-label">Endereço Completo</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="address_complement"
                                        name="address_complement"
                                        value={address_complement}
                                        onChange={e => setFullName(e.target.value)}
                                        onBlur={() => enviarCampo('address_complement', address_complement)}
                                        required
                                    />
                                    <div className="invalid-feedback">Por favor, insira o endereço Completo</div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="address_code" className="form-label">CEP</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="address_code"
                                        name="address_code"
                                        value={address_code}
                                        onChange={e => setFullName(e.target.value)}
                                        onBlur={() => enviarCampo('address_code', address_code)}
                                        required
                                    />
                                    <div className="invalid-feedback">Por favor, insira um CEP</div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="city" className="form-label">Cidade</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="city"
                                        name="city"
                                        value={city}
                                        onChange={e => setFullName(e.target.value)}
                                        onBlur={() => enviarCampo('city', city)}
                                        required
                                    />
                                    <div className="invalid-feedback">Por favor, insira uma cidade</div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-sm-4">
                            <form className="was-validated" action={urlPost} method="post">

                                <CamposOcultos tokenCsrf={tokenCsrf} idForm={idForm} />

                                <div className="mb-12">
                                    <label htmlFor="uf" className="form-label">UF</label>
                                    <input
                                        type="text"
                                        className="form-control"
                                        id="uf"
                                        name="uf"
                                        value={uf}
                                        onChange={e => setFullName(e.target.value)}
                                        onBlur={() => enviarCampo('uf', uf)}
                                        required
                                    />
                                    <div className="invalid-feedback">Por favor, insira uma unidade UF</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </fieldset >
            <div class="container">
                &nbsp;
            </div>
            </div >
        );
    }
    ReactDOM.render(<AppCampo001 />, document.querySelector('.campos_001'));
</script>