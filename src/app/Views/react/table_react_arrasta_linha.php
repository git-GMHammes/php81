<div id="table_react"></div>

<script type="text/babel">
    function Tabela() {
        const [rows, setRows] = React.useState(
            Array.from({ length: 100 }, (_, i) => `Linha ${i + 1}`)
        );

        const onDragStart = (event, index) => {
            event.dataTransfer.setData("text/plain", index);
        };

        const onDragOver = (event) => {
            event.preventDefault();
        };

        const onDrop = (event, droppedOnIndex) => {
            event.preventDefault();
            const draggedFromIndex = event.dataTransfer.getData("text/plain");

            const itemDragged = rows[draggedFromIndex];
            const remainingItems = rows.filter((_, index) => index !== draggedFromIndex);

            const reorderedRows = [
                ...remainingItems.slice(0, droppedOnIndex),
                itemDragged,
                ...remainingItems.slice(droppedOnIndex)
            ];

            setRows(reorderedRows);
        };

        return (
            <table className="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Coluna 1</th>
                        <th>Coluna 2</th>
                        <th>Coluna 3</th>
                    </tr>
                </thead>
                <tbody>
                    {rows.map((row, index) => (
                        <tr key={index} 
                            draggable 
                            onDragStart={(e) => onDragStart(e, index)} 
                            onDragOver={onDragOver} 
                            onDrop={(e) => onDrop(e, index)}>
                            <td>{row}</td>
                            <td>{row}</td>
                            <td>{row}</td>
                        </tr>
                    ))}
                </tbody>
                <tfoot>
                    <tr>
                        <td colSpan="3">Rodapé da Tabela</td>
                    </tr>
                </tfoot>
            </table>
        );
    }

    ReactDOM.render(<Tabela />, document.getElementById('table_react'));
</script>