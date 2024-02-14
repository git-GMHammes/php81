<script>
    var baseUrl = "<?php echo base_url(); ?>";
</script>
<script type="text/babel">
    const Calendar = () => {
        const today = new Date();
        // Acessando os dados passados para o elemento 'calendar'
        const dataElement = document.getElementById('calendar').getAttribute('data-result');
        const initialData = JSON.parse(dataElement).data || { ano: new Date().getFullYear(), mes: new Date().getMonth() + 1, dia: new Date().getDate() };

        // Estados para ano, mês e dia, atualizados para usar os valores iniciais
        const [currentYear, setCurrentYear] = React.useState(parseInt(initialData.ano));
        const [currentMonth, setCurrentMonth] = React.useState(parseInt(initialData.mes) - 1);
        const [currentDay, setCurrentDay] = React.useState(parseInt(initialData.dia));
        const weekDays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
        const months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

        // Função para navegar para o mês anterior
        const goToPreviousMonth = () => {
            setCurrentMonth(prev => prev === 0 ? 11 : prev - 1);
            if (currentMonth === 0) {
                setCurrentYear(currentYear - 1);
            }
        };

        // Função para navegar para o próximo mês
        const goToNextMonth = () => {
            setCurrentMonth(prev => prev === 11 ? 0 : prev + 1);
            if (currentMonth === 11) {
                setCurrentYear(currentYear + 1);
            }
        };

        // Função para gerar os dias do mês atual
        const generateCalendarDays = (year, month) => {
            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            const totalSlots = [];
            for (let day = 1; day <= 42; day++) {
                totalSlots.push(day);
            }

            // Preenche com os dias do mês atual, anterior e próximo
            const calendarDays = totalSlots.map((_, index) => {
            const dayIndex = index - firstDayOfMonth + 1;
            const isCurrentMonthDay = dayIndex > 0 && dayIndex <= daysInMonth;

            // Verifica se o dia é o dia especificado
            const isSelectedDay = dayIndex === currentDay && month === currentMonth && year === currentYear;
            const btnClass = isSelectedDay ? 'btn-dark' : 'btn-outline-secondary';

            if (isCurrentMonthDay) {
                const dayString = String(dayIndex).padStart(2, '0');
                const monthString = String(month + 1).padStart(2, '0'); // Mês é de 0-11 no JS, então adicione 1.
                const yearString = String(year);

                // Construa a URL completa para cada dia.
                const dayUrl = `${baseUrl}calendar/endpoint/principal/${yearString}/${monthString}/${dayString}`;

                return (
                    <td key={index} className="text-center">
                        <a className={`btn btn-sm ${btnClass}`} href={dayUrl} role="button">
                            {dayString}
                        </a>
                    </td>
                );
                } else {
                    // Dias do mês anterior ou próximo
                    return <td key={index} className="text-center"></td>;
                }
            });

            // Divide os dias em semanas
            const weeks = [];
            for (let i = 0; i < calendarDays.length; i += 7) {
                const weekSlice = calendarDays.slice(i, i + 7);
                // Verifica se a semana é a última e se todos os seus dias são do próximo mês
                const isLastWeek = i + 7 >= calendarDays.length;
                const isLastWeekEmpty = weekSlice.every((day, index) => index + i - firstDayOfMonth + 1 > daysInMonth);
                if (!isLastWeek || (isLastWeek && !isLastWeekEmpty)) {
                    weeks.push(weekSlice);
                }
            }

            return weeks;
        };

        const weeks = generateCalendarDays(currentYear, currentMonth);

        return (
            <div className="mt-2 mb-2 ms-2 me-2">
            <div className="d-flex justify-content-center btn-sm mt-2 mb-2 ms-2 me-2">
                <button className="btn btn-outline-secondary btn-sm mt-2 mb-2 ms-2 me-2" onClick={goToPreviousMonth}>&lt; Anterior</button>
                    <h3 className="text-center btn-sm mt-2 mb-2 ms-2 me-2">{months[currentMonth]} {currentYear}</h3>
                <button className="btn btn-outline-secondary btn-sm mt-2 mb-2 ms-2 me-2" onClick={goToNextMonth}>Próximo &gt;</button>
            </div>
                <table className="table table-bordered border-dark table-hover">
                    <thead>
                        <tr className="fs-6">
                            {weekDays.map(dayName => (
                                <th className='text-center' key={dayName} scope="col">{dayName}</th>
                            ))}
                        </tr>
                    </thead>
                    <tbody>
                        {weeks.map((week, index) => (
                            <tr className='text-center' key={index}>
                                {week}
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    };

    // Renderizando o calendário no elemento com id 'calendar'
    ReactDOM.render(<Calendar />, document.getElementById('calendar'));
</script>