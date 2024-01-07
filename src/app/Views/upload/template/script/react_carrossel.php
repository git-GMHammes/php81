<?php
if(
    $_SERVER['SERVER_NAME'] == 'localhost'
    && $_SERVER["SERVER_PORT"] = '80'
){
    $laragon = '/intranetdegase/src/public';
}else{
    $laragon = '';
}
$api_comunicado = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"].$laragon;
?>
<script type="text/babel">
    function ImageCarousel({ images }) {
        const [currentImageIndex, setCurrentImageIndex] = React.useState(0);

        // Função para mudar para a próxima imagem
        const nextImage = () => {
            setCurrentImageIndex((prevIndex) => (prevIndex + 1) % images.length);
        };

        const prevImage = () => {
            setCurrentImageIndex((prevIndex) => {
                if (prevIndex === 0) {
                    return images.length - 1;
                } else {
                    return prevIndex - 1;
                }
            });
        };
        
        // Efeito para mudar a imagem automaticamente a cada 2 segundos
        React.useEffect(() => {
            const timer = setInterval(() => {
                nextImage();
            }, 5000);
            return () => clearInterval(timer);
        }, []);

        return (
            <div className="carousel-container">
                <div className="carousel-slide">
                    <img src={images[currentImageIndex]} className="carousel-image"/>
                </div>
                <div className="carousel-arrow left" onClick={prevImage}>&lt;</div>
                <div className="carousel-arrow right" onClick={nextImage}>&gt;</div>
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