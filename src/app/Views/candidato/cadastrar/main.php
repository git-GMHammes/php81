<?php
// myPrint($result, 'src\app\Views\candidato\cadastrar\main.php');
$uri_post = base_url('index.php/candidato/api/criar');
$id = isset($result['candidato'][0]['id']) ? ($result['candidato'][0]['id']) : (NULL);
$form_candidato_name = array(
    'id' => $id,
    'name' => isset($result['candidato'][0]['name']) ? ($result['candidato'][0]['name']) : (NULL),
    'endereco' => $uri_post,
    'token_csrf' => '$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2'
);
$form_candidato_mail = array(
    'id' => $id,
    'mail' => isset($result['candidato'][0]['mail']) ? ($result['candidato'][0]['mail']) : (NULL),
    'endereco' => $uri_post,
    'token_csrf' => '$ywB9i/CRwduLN0lgDED2jR.UrpxAw1eHBThgNYG.xfBfrhHr8IBOY2'
);
?>

<div id="form_candidato_name" data-result='<?php echo json_encode($form_candidato_name); ?>'></div>
<div id="form_candidato_mail" data-result='<?php echo json_encode($form_candidato_mail); ?>'></div>

<!-- name -->
<script type="text/babel">
    // Definindo um componente React para gerenciar o formulário de nome do candidato
    function FormularioCandidatoName() {
        // Obtém o elemento div que conterá o formulário, usando seu ID
        const divElement = document.getElementById('form_candidato_name');

        // Extrai os dados armazenados no elemento div, que incluem id, nome, endereço da API e token CSRF
        const { id, name, endereco, token_csrf } = JSON.parse(divElement.getAttribute('data-result'));
        
        // Define o estado do nome usando o React useState hook. O estado inicial é definido para o nome extraído acima
        const [data_name, setName] = React.useState(name);
        
        // Função para lidar com a submissão do formulário
        const handleSubmit = (event) => {
        // Previne o comportamento padrão do formulário, que é recarregar a página
        event.preventDefault();

        // Cria um objeto formData para facilitar o envio de dados do formulário
        const formData = new URLSearchParams();
        formData.append('name', data_name);
        formData.append('token_csrf', token_csrf);
        formData.append('id', id);

        // Usa a API Fetch para enviar os dados do formulário para o endereço da API, usando o método POST
        fetch(endereco, {
            method: 'POST', // Método HTTP para criação de recursos
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded', // Define o tipo de conteúdo como URL-encoded, padrão para dados de formulário
            },
            body: formData, // Corpo da requisição contendo os dados do formulário
        }).then((response) => {
            // Log de sucesso no console do navegador
            console.log('Formulário enviado com sucesso', response);
        }).catch((error) => {
            // Log de erro no console do navegador
            console.error('Erro ao enviar formulário', error);
        });
        };

        // Função para lidar com mudanças no input do nome
        const handleChange = (event) => {
        // Atualiza o estado do nome com o valor atual do input
        setName(event.target.value);
        };

        // Retorna o JSX do formulário, configurado para chamar handleSubmit no submit
        return (
        <form onSubmit={handleSubmit} action={endereco} method="POST">
            <input
            type="text"
            name="name"
            value={data_name} // Vincula o valor do input ao estado do nome
            onChange={handleChange} // Chama handleChange a cada alteração do input
            onBlur={handleSubmit} // Chama handleSubmit quando o input perde o foco
            />
            <input
            type="hidden"
            name="token_csrf"
            value={token_csrf} // Campo oculto para enviar o token CSRF
            />
            <input
            type="hidden"
            name="id"
            value={id} // Campo oculto para enviar o ID
            />
        </form>
    );
  }
  // Renderiza o componente FormularioCandidatoName dentro do div com id 'form_candidato_name'
  ReactDOM.render(<FormularioCandidatoName />, document.getElementById('form_candidato_name'));
</script>
<!-- mail -->
<script type="text/babel">
    function FormularioCandidatoMail() {
    // Acessando os dados do elemento div
    const divElement = document.getElementById('form_candidato_mail');

    const { id, mail, endereco, token_csrf } = JSON.parse(divElement.getAttribute('data-result'));
    
    // Estado para gerenciar o valor do input
    const [data_mail, setMail] = React.useState(mail);
    
    const handleSubmit = (event) => {
      event.preventDefault(); // Prevenir o recarregamento da página

      // Preparar dados do formulário para envio
      const formData = new URLSearchParams();
      formData.append('mail', data_mail);
      formData.append('token_csrf', token_csrf);
      formData.append('id', id);

      // Enviar dados com a API Fetch
      fetch(endereco, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData,
      }).then((response) => {
        console.log('Formulário enviado com sucesso', response);
      }).catch((error) => {
        console.error('Erro ao enviar formulário', error);
      });
    };

    const handleChange = (event) => {
      setMail(event.target.value);
    };

    return (
      <form onSubmit={handleSubmit} action={endereco} method="POST">
        <input
          type="text"
          name="mail"
          value={data_mail}
          onChange={handleChange}
          onBlur={handleSubmit} // Enviar ao perder o foco
        />
        <input
          type="hidden"
          name="token_csrf"
          value={token_csrf}
        />
        <input
          type="hidden"
          name="id"
          value={id}
        />
      </form>
    );
  }

  ReactDOM.render(<FormularioCandidatoMail />, document.getElementById('form_candidato_mail'));
</script>