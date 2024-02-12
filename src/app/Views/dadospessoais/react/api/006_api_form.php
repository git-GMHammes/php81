<div id="formDadosPessoais"></div>

<script type="text/babel">
    class FormularioDadosPessoais extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            nome: '',
            email: '',
            tipoPessoa: '',
            idade: 46,
            telefone: '',
            cep: '',
            endereco: '',
            file: null,
            isLoading: false,
        };
    }

    handleInputChange = (event) => {
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;

        this.setState({
            [name]: value,
        });
    }

    handleSubmit = async (event) => {
        event.preventDefault();
        this.setState({ isLoading: true });

        const formData = new FormData();
        Object.keys(this.state).forEach(key => {
            if (key !== 'isLoading') { // Não incluir o estado de carregamento
                formData.append(key, this.state[key]);
            }
        });

        try {
            const response = await fetch('<?= base_url(); ?>dadospessoais/api/criar', {
                method: 'POST',
                body: formData,
            });
            const data = await response.json();

            if (data.status === 'success') {
                // Exibir animação verde e redirecionar
                this.setState({ isLoading: false });
                window.location.href = 'http://localhost:4107'; // Redirecionar
            } else {
                // Exibir animação vermelha e manter os dados no formulário
                this.setState({ isLoading: false });
                alert('Erro ao enviar os dados. Tente novamente.'); // Placeholder para animação
            }
        } catch (error) {
            this.setState({ isLoading: false });
            alert('Erro na comunicação com a API. Tente novamente.'); // Placeholder para animação
        }
    }

    render() {
        return (
            <div className="card ms-4 me-4 mt-4 mb-4">
                <div className="card-header">
                    <h5 className="card-title">Formulário Dados Pessoais</h5>
                </div>
                <div className="card-body">
                    {this.state.isLoading && <div>Carregando...</div>}
                    <form className="was-validated" onSubmit={this.handleSubmit}>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
                            <input type="text" id="nome" name="nome" value="Nome Completo" class="form-control nome-input" placeholder="Nome e Sobre Nome" required />
                            <div class="invalid-feedback">Campo Nome Obrigatório</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome Completo</label>
                            <input type="mail" id="email" name="email" value="email@servidor.com" class="form-control" placeholder="Nome e Sobre Nome" required />
                            <div class="invalid-feedback">Campo Email Obrigatório</div>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="validationFormCheck1" required />
                            <label class="form-check-label" for="validationFormCheck1">Cadastro válido</label>
                            <div class="invalid-feedback">Campo Obrigatório</div>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required />
                            <label class="form-check-label" for="validationFormCheck2">Pessoa Física</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required />
                            <label class="form-check-label" for="validationFormCheck3">Pessoa Jurídica</label>
                            <div class="invalid-feedback">Campo Obrigatório</div>
                        </div>

                        <div class="form-check mb-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <span id="idadeValor">46</span>
                            <input type="range" id="idade" name="idade" value="46" class="form-range" min="0" max="110" />
                            <div class="invalid-feedback">Campo Idade Obrigatório</div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm" id="telefone" name="telefone" required aria-label="select example">
                                <option value="">Escolha um telefone</option>
                                <option value="21980558545">21980558545</option>
                                <option value="21999977777">21999977777</option>
                                <option value="21898989897">21898989897</option>
                            </select>
                            <div class="invalid-feedback">Campo Telefone Obrigatório</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">CEP</label>
                            <input type="text" id="end_cep" name="end_cep" value="20.7101-180" class="form-control" placeholder="Nome e Sobre Nome" required />
                            <div class="invalid-feedback">Campo CEP Obrigatório</div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Endereço Completo</label>
                            <textarea class="form-control form-control-sm is-invalid" id="end_complemento" name="end_complemento" placeholder="Required example textarea" required>Rua Caiapó, 49, Eng Novo, Rio de Janeiro, RJ.</textarea>
                            <div class="invalid-feedback">
                                Digite seu endereço completo com Localidade, Bairro, Rua e Número.
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control form-control-sm" aria-label="file example" required />
                            <div class="invalid-feedback">Campo Obrigatório</div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="" value="$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2" />
                            <button class="btn btn-primary btn-sm" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
                <div className="card-footer text-right">
                    Sistema desenvolvido pela empresa Habilidade.Com
                </div>
            </div>
        );
    }
}

ReactDOM.render(<FormularioDadosPessoais />, document.getElementById('formDadosPessoais'));
</script>