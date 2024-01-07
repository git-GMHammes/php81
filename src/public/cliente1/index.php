<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- bootstrap@5.0.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- react@17 -->
    <title>WebSocket Client 2</title>
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone"></script>
    <!-- CSS personalizado -->
    <style>
        .altura-customizada {
            height: 350px;
            /* Exemplo de altura customizada */
        }
    </style>
</head>

<body>
    <div class="container">
        &nbsp;
    </div>
    <div id="chat_react"></div>
    <script type="text/babel">
        // Importa os hooks do React que serão usados
        const { useState, useEffect, useRef } = React;

        // Função para formatar a data para o padrão brasileiro
        function formatDateTime(date) {
            return date.toLocaleString('pt-BR');
        }

        // Componente principal do cliente de WebSocket
        function WebSocketClient() {
            // State para gerenciar a conexão WebSocket
            const [ws, setWs] = useState(null);
            // State para armazenar as mensagens recebidas
            const [messages, setMessages] = useState([]);
            // State para o input de nova mensagem
            const [input, setInput] = useState('');
            // Identificador do usuário (poderia também ser um state se mudar dinamicamente)
            const [userId, setUserId] = useState('User2');
            // Ref para a última mensagem na lista para rolagem automática
            const messagesEndRef = useRef(null);

            // Efeito para conectar ao servidor WebSocket na montagem do componente
            useEffect(() => {
                const newWs = new WebSocket('ws://localhost:4109');

                // Log quando a conexão é aberta
                newWs.onopen = () => {
                    console.log('Connected to the WebSocket server');
                };

                // Função para tratar mensagens recebidas
                newWs.onmessage = (event) => {
                    console.log('Message received: ' + event.data);
                    const parsedData = JSON.parse(event.data);
                    const dateTime = formatDateTime(new Date());
                    // Atualiza o state de mensagens e rola para o final
                    setMessages(prevMessages => [...prevMessages, {...parsedData, dateTime}]);
                };

                // Trata o fechamento da conexão tentando reconectar
                newWs.onclose = () => {
                    console.log('Disconnected from the WebSocket server');
                    console.log('WebSocket connection closed. Attempting to reconnect...');
                    setTimeout(() => setWs(new WebSocket('ws://localhost:4109')), 5000);
                };

                // Atualiza o state da conexão WebSocket
                setWs(newWs);

                // Limpeza quando o componente for desmontado
                return () => newWs.close();
            }, []);

            // Efeito para rolar para a mensagem mais recente quando o array de mensagens atualizar
            useEffect(() => {
                scrollToBottom();
            }, [messages]);

            // Função para enviar uma nova mensagem
            const sendMessage = (e) => {
                e.preventDefault();
                if (ws && ws.readyState === WebSocket.OPEN) {
                    const messageData = { id: userId, message: input };
                    ws.send(JSON.stringify(messageData));
                    setInput('');
                } else {
                    console.error('WebSocket is not connected');
                }
            };

            // Função para rolar para o final da lista de mensagens
            function scrollToBottom() {
                if (messagesEndRef.current) {
                    messagesEndRef.current.scrollIntoView({ behavior: 'smooth' });
                }
            }

            // Renderiza o layout do chat
            return (
                <div className="container-lg">
                    <div className="row">
                        <div className="col-sm-6 mb-3 mb-sm-0">
                            <div className="card altura-customizada">
                                <div className="card-header">
                                    <h2>Bate-Papo</h2>
                                </div>
                                <div className="card-body overflow-auto">
                                    {/* Mapeia o array de mensagens para renderizar cada uma */}
                                    {messages.map((message, index) => (
                                        <div key={index} className={`alert ${message.id === userId ? 'alert-primary text-start' : 'alert-info text-sm-end'} fs-6`} role="alert">
                                            {message.id} [{message.dateTime}]: <br />
                                            {message.message}
                                        </div>
                                    ))}
                                    {/* Elemento invisível usado como referência para rolagem */}
                                    <div ref={messagesEndRef} />
                                </div>
                                <div className="card-footer text-muted">
                                    {/* Formulário para enviar novas mensagens */}
                                    <form className="d-flex p-2" onSubmit={sendMessage}>
                                        <div className="input-group">
                                            <input 
                                                type="text"
                                                className="form-control"
                                                value={input}
                                                onChange={e => setInput(e.target.value)}
                                                placeholder="Digite uma mensagem..."
                                            />
                                            <button type="submit" className="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {/* Coluna para perfil do usuário ou outras informações */}
                        <div class="col-sm-6">
                            <div className="card altura-customizada">
                                <div className="card-header">
                                    <h2>Perfil do Usuário</h2>
                                </div>
                                <div className="card-body">
                                    <blockquote className="blockquote mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="bi bi-chat-left-text" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                        </svg>
                                        <p>A well-known quote, contained in a blockquote element.</p>
                                        <footer className="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                    </blockquote>
                                </div>
                                <div class="card-footer text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            );
        }

        // Renderiza o componente WebSocketClient no elemento com id 'chat_react'
        ReactDOM.render(<WebSocketClient />, document.getElementById('chat_react'));
    </script>
</body>

</html>