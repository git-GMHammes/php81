<!DOCTYPE html>
<html lang="en">
<!-- src\app\Views\dadospessoais\react\calendar\main.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Responsivo</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- React e ReactDOM CDN -->
    <script src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <!-- Babel CDN -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
</head>

<body>
    <header>
        <h1>Calendário</h1>
    </header>
    <main>
        <div id="calendar"></div>
        <?php
        myPrint($result, '', true);
        ?>
    </main>
    <footer>
        <script type="text/babel">
            const Calendar = () => {
                const today = new Date();
                const [currentYear, setCurrentYear] = React.useState(today.getFullYear());
                const [currentMonth, setCurrentMonth] = React.useState(today.getMonth());
                const weekDays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
                const months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

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
                        const isToday = dayIndex === today.getDate() && month === today.getMonth() && year === today.getFullYear();
                        const btnClass = isToday ? 'btn-dark' : 'btn-outline-secondary';

                        if (isCurrentMonthDay) {
                            // Use padStart para garantir que o dia tenha dois dígitos
                            const dayString = String(dayIndex).padStart(2, '0');
                            return (
                                <td key={index} className="text-center">
                                    <a className={`btn btn-sm ${btnClass}`} href="#" role="button">
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
    </footer>
</body>

</html>