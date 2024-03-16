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

    // Aqui estou assumindo que o endpoint da API retorna um objeto com os dados necessários
    fetch(data.url_api_value)
        .then(response => response.json())
        .then(apiData => {
            // A API retornou os dados, agora vamos preencher os estados
            if (apiData && apiData.result) {
                const apiResult = apiData.result;
                setSelectedTipo(apiResult.person_type);
                setName(apiResult.name);
                // Atualize aqui mais estados conforme necessário
                setDadosApiValue(apiResult); // Isso atualiza o estado com todos os dados de apiData.result
            }
        })
        .catch(error => console.error('Error fetching data:', error));

    // Os outros fetches permanecem iguais
    // ...
}, []);
