<div id="app_card"></div>
<script type="text/babel">
    function AppCard() {
        return (
            <div>
                <div class="container">
                    <div className="card mb-4 mt-4 ms-4 me-4" style={{ width: '18rem' }}>
                        <div className="card-body">
                            <h5 className="card-title">Crad em Bootstrap</h5>
                            <p className="card-text">Conteúdo principal do card. Aqui vai o corpo do card, onde você pode colocar qualquer informação.</p>
                            <a href="#" className="btn btn-primary">Rodapé do Card</a>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
    ReactDOM.render(<AppCard />, document.getElementById('app_card'));
</script>