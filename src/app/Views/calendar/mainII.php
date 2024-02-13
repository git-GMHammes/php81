        <script type="text/babel">
            const Calendar = () => {
                // Acessando os dados passados para o elemento 'calendar'
                const dataElement = document.getElementById('calendar').getAttribute('data-result');
                const initialData = JSON.parse(dataElement).data || { ano: new Date().getFullYear(), mes: new Date().getMonth() + 1 }; // Adicionando 1 porque JavaScript conta meses de 0 a 11

                // Estados para ano e mês atualizados para usar os valores iniciais
                const [currentYear, setCurrentYear] = React.useState(parseInt(initialData.ano));
                const [currentMonth, setCurrentMonth] = React.useState(parseInt(initialData.mes) - 1); // Subtraindo 1 para alinhar com a contagem de meses do JavaScript

                const weekDays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
                const months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

        </script>
    </footer>
</body>

</html>