<div id="reactApp" data-result='<?php echo json_encode($result); ?>'></div>

<script type="text/babel">
    function App({ data }) {
        return (
            <div>
                {data.map((item, index) => (
                    <div key={index}>{item}</div>
                ))}
            </div>
        );
    }

    const reactAppElement = document.getElementById('reactApp');
    const dataResult = JSON.parse(reactAppElement.getAttribute('data-result'));

    ReactDOM.render(<App data={dataResult} />, reactAppElement);
</script>
