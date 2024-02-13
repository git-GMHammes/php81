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
    <link href="<?=base_url().'assets/calendar/style.css';?>" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Calendário</h1>
    </header>
    <main>
        <div id="calendar"></div>
        <script type="text/babel" src="calendar.js"></script>
    </main>
    <footer>
        <script type="text/babel">
            const Calendar = () => {
                const today = new Date();
                const currentMonth = today.getMonth();
                const currentYear = today.getFullYear();
                const weekDays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

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

                        if (isCurrentMonthDay) {
                            return (
                                <td key={index} className={`${dayIndex === today.getDate() && month === today.getMonth() ? 'table-primary text-center' : 'text-center'}`}>
                                    {dayIndex}
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
                    <table className="table table-bordered border-dark table-hover">
                        <thead>
                            <tr>
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
                );
            };

            // Renderizando o calendário no elemento com id 'calendar'
            ReactDOM.render(<Calendar />, document.getElementById('calendar'));
        </script>
    </footer>
</body>
</html>