<div id="app_arrasta"></div>
<script type="text/babel">
    // Define um componente botão que pode ser arrastado
    function DraggableButton() {
        // Manipulador do evento de início de arraste
        function onDragStart(event) {
            // Define os dados do arraste para o id do elemento que está sendo arrastado
            event.dataTransfer.setData("text/plain", event.target.id);
        }

        // Retorna o JSX para o botão arrastável
        return (
            // Div que pode ser arrastada com o manipulador de eventos onDragStart
            <div id="draggableButton" draggable="true" onDragStart={onDragStart} className="input-group mb-3">
                {/* Add-on do grupo de entrada do Bootstrap (tipicamente para ícones) */}
                <span className="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width={16} height={16} fill="currentColor" className="bi bi-hand-index" viewBox="0 0 16 16">
                        <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                    </svg>
                </span>
                {/* Botão que acompanha o ícone */}
                <button className="btn btn-outline-secondary btn-sm" type="button">
                    Botão
                </button>
            </div>
        );
    }

    // Define um componente de área onde pode-se soltar elementos
    function DroppableArea(props) {
        // Manipulador para quando um elemento arrastável está sobre a área de soltura
        function onDragOver(event) {
            // Impede o comportamento padrão para permitir soltar
            event.preventDefault();
        }

        // Manipulador para quando um elemento arrastável é solto
        function onDrop(event) {
            // Impede o manuseio padrão do soltar
            event.preventDefault();
            // Recupera o id do elemento arrastável
            const draggableElementData = event.dataTransfer.getData("text/plain");
            // Obtém o elemento arrastável pelo id
            const draggableElement = document.getElementById(draggableElementData);
            // Obtém o .card-body mais próximo de onde o elemento foi solto
            const droppableElement = event.currentTarget.querySelector('.card-body');

            // Adiciona a classe de margem inferior se não estiver presente
            draggableElement.classList.add("mb-3");

            // Anexa o elemento arrastável ao elemento soltável se ele ainda não estiver lá
            if (!droppableElement.contains(draggableElement)) {
                droppableElement.appendChild(draggableElement);
            }
            // Limpa os dados de arraste para evitar vazamentos de memória
            event.dataTransfer.clearData();
        }

        // Retorna o JSX para a área de soltura
        return (
            // Div que atua como uma área de soltura com manipuladores de eventos onDragOver e onDrop
            <div className="card mb-4" style={{ width: '18rem' }} onDragOver={onDragOver} onDrop={onDrop}>
                {/* Container que centralizará seus filhos tanto vertical quanto horizontalmente */}
                <div className="card-body d-flex justify-content-center align-items-center">
                    {/* Renderiza os filhos passados para DroppableArea */}
                    {props.children}
                </div>
            </div>
        );
    }

    // Define o componente principal que será renderizado no DOM
    function AppArrasta() {
        // Retorna o JSX para o componente principal
        return (
            // Container principal para os componentes arrastáveis e soltáveis
            <div className="container mt-4">
                <form>
                    {/* Primeira área de soltura contendo um botão arrastável */}
                    <DroppableArea>
                        <DraggableButton />
                    </DroppableArea>
                    {/* Segunda área de soltura */}
                    <DroppableArea />
                </form>
            </div>
        );
    }

    // Renderiza o componente principal na div com id="app_arrasta"
    ReactDOM.render(<AppArrasta />, document.getElementById('app_arrasta'));
</script>