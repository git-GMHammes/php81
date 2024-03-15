<?php
// Aqui é a entrega do Backend do Framework não será usado em todos os caregamentos
$result = array(
    'id' => 234,
    'ordem' => 1,
    'data_minima_cadastro' => '1985-01-01',
);
// Aqui como todos os que serão enviados com o react
$in_php = array(
    "title" => "Titulo do Formulário",
    // Endereço para submit post
    "url_post" => base_url() . "dadospessoais/api/criar",
    // Endereço para receber dados ou não do formulário. ID virá do Backend ou do segmnto de URL
    "url_api_value" => base_url() . "meureact/api/ordenar" . isset($result['id']) ? ('/' . $result['id']) : (NULL),
    // Endereço para <select> tipo_pessoa
    "url_api_tipo_pessoa" => base_url() . "tipopessoa/api/exibir",
    // Endereço para <select> genero
    "url_api_genero" => base_url() . "generopessoa/api/exibir",
    "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat massa id felis dapibus, ac malesuada ipsum venenatis. Pellentesque vitae dui dui. Curabitur sollicitudin metus elementum vulputate blandit. Donec in varius diam. Vestibulum a est quis lacus pretium viverra eu id est. Vivamus efficitur tempus est, sed consectetur justo pellentesque sit amet. Sed vehicula consectetur augue, vel commodo leo pulvinar volutpat. Etiam sagittis non ligula bibendum tincidunt. Nunc sed tellus id arcu interdum dapibus vel sed enim. Ut dictum accumsan viverra. Donec cursus libero ut neque mattis, eu pellentesque lorem pharetra. Nam pharetra iaculis est, quis porta mi iaculis at. Fusce dui felis, pharetra eget massa vel, aliquam vulputate tortor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam quam quam, dictum sed risus quis, euismod tincidunt erat. Mauris pellentesque erat risus.",
    "keywords" => "Ordenar",
    "body" => "ordenar",
    "css" => array(),
    "js" => array()
);
?>
<form class="was-validated" action="www_in_php_url_post" method="post">
    <!-- se o id existir -->
    <?php if (isset($in_php['value']['id'])): ?>
        <div class="mb-12">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control is-valid" id="id" name="id" value="url_api_value" readonly>
            <div class="valid-feedback">
                o 'id' do registro
            </div>
        </div>
    <?php endif; ?>

    <div class="mb-12">
        <label for="nome" class="form-label">Tipo</label>
        <select class="form-select" required aria-label="select example">
            <option value="">Escolha um tipo</option>
            <!-- Aqui começa os dados da API -->
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="url_api_value" selected>Valor que vem da API</option>
            <option value="3">Three</option>
            <!-- Aqui termina os dados da API -->
        </select>
        <div class="invalid-feedback">Example invalid select feedback</div>
    </div>

    <div class="mb-12">
        <label for="ordem" class="form-label">Ordem</label>
        <input type="text" class="form-control is-valid" id="ordem" name="ordem" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar a ordem na Tebela
        </div>
    </div>

    <div class="mb-12">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" class="form-control is-valid" id="nome" name="nome" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar um nome completo
        </div>
    </div>

    <div class="mb-12">
        <label for="nome" class="form-label">Genero</label>
        <select class="form-select" required aria-label="select example">
            <option value="">Escolha um Gênero</option>
            <!-- Aqui começa os dados da API -->
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="url_api_value" selected>Valor que vem da API</option>
            <option value="3">Three</option>
            <!-- Aqui termina os dados da API -->
        </select>
        <div class="invalid-feedback">https://orientando.org/listas/lista-de-generos/</div>
    </div>

    <div class="mb-12">
        <label for="nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control is-valid" id="nascimento" name="nascimento" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar uma data
        </div>
    </div>

    <div class="mb-12">
        <label for="nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control is-valid" id="nascimento" name="nascimento" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar uma data
        </div>
    </div>

    <div class="mb-12">
        <label for="rg" class="form-label">RG</label>
        <input type="text" class="form-control is-valid" id="rg" name="rg" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar um RG
        </div>
    </div>

    <div class="mb-12">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" class="form-control is-valid" id="cpf" name="cpf" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar um CPF
        </div>
    </div>

    <div class="mb-12">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control is-valid" id="telefone" name="telefone" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar uma Telefone
        </div>
    </div>

    <div class="mb-12">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control is-valid" id="email" name="email" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar um e-mail
        </div>
    </div>

    <div class="mb-12">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control is-valid" id="cep" name="cep" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar um CEP
        </div>
    </div>

    <div class="mb-12">
        <label for="cmplemento" class="form-label">Complemento</label>
        <input type="text" class="form-control is-valid" id="cmplemento" name="cmplemento" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar complemto do endereço
        </div>
    </div>

    <div class="mb-12">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control is-valid" id="cidade" name="cidade" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar uma Cidade
        </div>
    </div>

    <div class="mb-12">
        <label for="uf" class="form-label">UF</label>
        <input type="text" class="form-control is-valid" id="uf" name="uf" value="url_api_value" required>
        <div class="valid-feedback">
            Favor informar uma Unidade Federal
        </div>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto 3x4</label>
        <input type="file" class="form-control" aria-label="file example" required>
        <div class="invalid-feedback">Foto 3x4</div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>
<div class="app_form_dados" data-inphp='<?php echo json_encode($in_php); ?>'></div>
<script type="text/babel">
    function AppFormDados() {
        return (
            <div className="container">
                <form className="was-validated" action="" method="post">
                    <input
                        type="hidden"
                        className="form-control"
                        id={"token_csrf"}
                        name="token_csrf"
                        value={"$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2"}
                        readOnly
                    />
                    <button className="btn btn-outline-primary" type="submit">Enviar</button>
                </form>
            </div>
        );
    }
    ReactDOM.render(<AppFormDados />, document.querySelector('.app_form_dados'));
</script>