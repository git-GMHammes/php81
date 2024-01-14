<!-- Exemplo de View em CodeIgniter 4 -->
<div id="reactApp" data-results='<?php echo json_encode($result); ?>'></div>

<script src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>

<script>
    const { useEffect, useState } = React;

    function MyComponent() {
        const [data, setData] = useState([]);

        useEffect(() => {
            // Lê os dados do elemento DOM
            const element = document.getElementById('reactApp');
            const results = JSON.parse(element.getAttribute('data-results'));

            setData(results);
        }, []);

        return (
            <div>
                {data.map((item, index) => (
                    <div key={index}>{JSON.stringify(item)}</div>
                ))}
            </div>
        );
    }

    // Monta o componente React no elemento com id 'reactApp'
    ReactDOM.render(<MyComponent />, document.getElementById('reactApp'));
</script>
