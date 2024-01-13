<?php
$result; // Declaração da variável $result. Ela deve ser definida ou preenchida em algum lugar anteriormente no código.
$jsonData = json_encode($result); // Converte o array PHP $result em uma string JSON e armazena em $jsonData.
// myPrint($jsonData, true);
?>

<!-- Esta é a div onde o seu aplicativo React vai ser renderizado. -->
<div id="app"></div> 

<script type="text/babel">

    const data = <?php echo $jsonData; ?>; 

    function App() {
        return (
            <div>
                <table NameClass="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">DESTAQUE</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">CONTEUDO</th>
                        </tr>
                    </thead>
                    <tbody>
                    {data.map((item, index) => (
                        <tr>
                            <td key={index}>{JSON.stringify(item.id)}</td> 
                            <td key={index}>{JSON.stringify(item.titulo)}</td> 
                            <td key={index}>{JSON.stringify(item.destaque)}</td> 
                            <td key={index}>{JSON.stringify(item.tipo)}</td> 
                            <td key={index}>{JSON.stringify(item.conteudo)}</td> 
                        </tr>
                    ))}
                    </tbody>
                </table>
            </div>
        );
    }

    ReactDOM.render(<App />, document.getElementById('app')); 
</script>