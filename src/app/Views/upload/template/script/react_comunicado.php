<?php
if (
    $_SERVER['SERVER_NAME'] == 'intranet.degase.proderj.rj.gov.br'
    || $_SERVER['SERVER_NAME'] == 'www.intranet.degase.proderj.rj.gov.br'
) {
    // API de Homologação
    $api_comunicado = 'https://intranet.degase.proderj.rj.gov.br/intranet/comunicado/api/listar';
} elseif (
    $_SERVER['SERVER_NAME'] == 'intranet.degase.rj.gov.br'
    || $_SERVER['SERVER_NAME'] == 'www.intranet.degase.rj.gov.br'
) {
    // API de Produção
    $api_comunicado = 'https://intranet.degase.rj.gov.br/intranet/comunicado/api/listar';
} elseif (
    $_SERVER['SERVER_NAME'] == 'localhost'
    && $_SERVER["SERVER_PORT"] == 80
) {
    // API de Desevolvimento
    $api_comunicado = base_url() . 'intranet/comunicado/api/listar';
} elseif (
    $_SERVER['SERVER_NAME'] == '127.0.0.1'
    && $_SERVER["SERVER_PORT"] == 80
) {
    // API de Desevolvimento
    $api_comunicado = base_url() . 'intranet/comunicado/api/listar';
} elseif (
    $_SERVER['SERVER_NAME'] == 'localhost'
    && $_SERVER["SERVER_PORT"] !== 80
) {
    // API de Desevolvimento
    $api_comunicado = base_url() . 'intranet/comunicado/api/listar';
} elseif (
    $_SERVER['SERVER_NAME'] == '127.0.0.1'
    && $_SERVER["SERVER_PORT"] !== 80
) {
    // API de Desevolvimento
    $api_comunicado = base_url() . 'intranet/comunicado/api/listar';
} else {
    $api_comunicado = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . '/intranet/comunicado/api/listar';
}
// exit($api_comunicado);
?>
<script type="text/babel">
    function App() {
        const [comunicados, setComunicados] = React.useState([]);
        const [filtro, setFiltro] = React.useState('');
        const [isLoading, setIsLoading] = React.useState(false);
        const [paginaAtual, setPaginaAtual] = React.useState(1);
        const [limite, setLimite] = React.useState(5); // Limite inicial

        React.useEffect(() => {
            // Função assíncrona para chamar a API e lidar com a resposta
            const fetchData = async () => {
                setIsLoading(true);
                try {
                    const response = await fetch('<?= $api_comunicado; ?>');
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const data = await response.json();
                    setComunicados(data.result);
                } catch (error) {
                    console.log("PASSOU: " + error);
                    console.error('Erro ao chamar a API', error);
                } finally {
                    setIsLoading(false);
                }
            };
            // Executar a função fetchData
            fetchData();
        }, []);

        // Calcular o total de páginas
        const totalPaginas = Math.ceil(comunicados.length / limite);

        // Função para mudar a página
        const mudarPagina = (numeroPagina) => {
            setPaginaAtual(numeroPagina);
        };

        // Função para mudar o limite de registros por página
        const mudarLimite = (novoLimite) => {
            setLimite(Number(novoLimite));
            setPaginaAtual(1); // Retorna para a primeira página ao mudar o limite
        };

        // Filtrar e paginar os dados
        const dadosFiltrados = comunicados
            .filter(comunicado => {
                const filtroMinusc = filtro.toLowerCase();
                return (
                    comunicado.TituloComunicado.toLowerCase().includes(filtroMinusc) ||
                    comunicado.ConteudoComunicado.toLowerCase().includes(filtroMinusc) ||
                    (comunicado.DataAprovacaoComunicado && comunicado.DataAprovacaoComunicado.toLowerCase().includes(filtroMinusc))
                );
            })
            .slice((paginaAtual - 1) * limite, paginaAtual * limite);

        return (
            <div>
                <select value={limite} onChange={(e) => mudarLimite(e.target.value)}>
                    {[1, 5, 10, 20, 30, 50].map(num => (
                        <option key={num} value={num}>{num}</option>
                    ))}
                </select>&emsp;
                <input
                    type="text"
                    placeholder="Filtrar..."
                    value={filtro}
                    onChange={(e) => setFiltro(e.target.value)}
                />
                {isLoading ? (
                    <div className="progress-bar">
                        <div className="progress-bar-animation"></div>
                    </div>
                ) : (
                    dadosFiltrados.map(comunicado => (
                        <div className="index-comunicados" key={comunicado.ComunicadoID}>
                        <div>
                            <div className="index-comunicados-titulo">
                            <i className="fa index-comunicados-icone fa-bookmark-o" aria-hidden="true"></i>
                            <h3><strong>
                                {comunicado.TituloComunicado || 'ERRO: Título'}
                            </strong></h3>
                            </div>
                            <h3>
                            {comunicado.ConteudoComunicado || 'ERRO: Descrição'}
                            </h3>
                        </div>
                        <h3><strong>
                            {comunicado.DataAprovacaoComunicado ? new Date(comunicado.DataAprovacaoComunicado).toLocaleDateString('pt-BR') : 'ERRO: Data'}
                        </strong></h3>
                        </div>
                    ))
                )}
                <div className="paginacao">
                    {Array.from({ length: totalPaginas }, (_, index) => (
                        <button
                            key={index + 1}
                            onClick={() => mudarPagina(index + 1)}
                            disabled={paginaAtual === index + 1}
                        >
                            {index + 1}
                        </button>
                    ))}
                </div>
            </div>
        );
    }
    ReactDOM.render(<App />, document.getElementById('DadosComunicados'));
</script>