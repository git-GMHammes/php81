<?php
$api_comunicado = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"]
?>
<script type="text/babel">
    function ImageCarousel({ images }) {
        const [currentImageIndex, setCurrentImageIndex] = React.useState(0);

        // Função para mudar para a próxima imagem
        const nextImage = () => {
            setCurrentImageIndex((prevIndex) => (prevIndex + 1) % images.length);
        };

        // Efeito para mudar a imagem automaticamente a cada 2 segundos
        React.useEffect(() => {
            const timer = setInterval(() => {
                nextImage();
            }, 5000);
            return () => clearInterval(timer);
        }, []);

        // Indicadores de paginação
        const paginationIndicators = images.map((_, index) => (
            <span 
                key={index} 
                className={`pagination-indicator ${currentImageIndex === index ? 'active' : ''}`}
                onClick={() => setCurrentImageIndex(index)}
            ></span>
        ));

        return (
            <div className="carousel-container">
                <div className="carousel-slide">
                    <img 
                        src={images[currentImageIndex]} 
                        className="carousel-image"
                    />
                </div>
                <div style={{ textAlign: 'center' }}>
                    {paginationIndicators}
                </div>
            </div>
        );
    }

    const images = [
        '<?= $api_comunicado; ?>/assets/img/degase/carrossel_1_doacao.jpg',
        '<?= $api_comunicado; ?>/assets/img/degase/carrossel_3_Maracana.jpg',
        '<?= $api_comunicado; ?>/assets/img/degase/carrossel_4_onibus.jpeg',
    ];

    ReactDOM.render(<ImageCarousel images={images} />, document.getElementById('carousel'));
</script>