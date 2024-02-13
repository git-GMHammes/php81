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

                    // Dias do mês anterior para preencher o início do calendário
                    const prevMonthDays = [];
                    for (let i = 0; i < firstDayOfMonth; i++) {
                        prevMonthDays.push(<div className="calendar-day previous-month"></div>);
                    }

                    // Dias do mês atual
                    const currentMonthDays = [];
                    for (let i = 1; i <= daysInMonth; i++) {
                        currentMonthDays.push(
                            <div className={`calendar-day ${i === today.getDate() && month === today.getMonth() ? 'today' : ''}`}>
                                {i}
                            </div>
                        );
                    }

                    // Dias do próximo mês para preencher o fim do calendário
                    const nextDays = 42 - (prevMonthDays.length + currentMonthDays.length);
                    const nextMonthDays = [];
                    for (let i = 1; i <= nextDays; i++) {
                        nextMonthDays.push(<div className="calendar-day next-month"></div>);
                    }

                    return [...prevMonthDays, ...currentMonthDays, ...nextMonthDays];
                };
                const days = generateCalendarDays(currentYear, currentMonth);
                const weeks = [];
                for (let i = 0; i < days.length; i += 7) {
                    const week = days.slice(i, i + 7);
                    weeks.push(
                        <div key={i} className="row">
                            {week.map((day, index) => (
                                <div key={index} className="col col-2 col-md-1">
                                    {day}
                                </div>
                            ))}
                        </div>
                    );
                }

                return (
                    <div className="container">
                    <div className="row">
                        {weekDays.map((dayName, index) => (
                            <div key={index} className="col col-2 col-md-1">
                                <div className="week-day">{dayName}</div> {/* Exibindo os dias da semana aqui */}
                            </div>
                        ))}
                    </div>
                    {weeks}
                </div>
                );
            };

            // Renderizando o calendário no elemento com id 'calendar'
            ReactDOM.render(<Calendar />, document.getElementById('calendar'));

        </script>
    </footer>
</body>
</html>