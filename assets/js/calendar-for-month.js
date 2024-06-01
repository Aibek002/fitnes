document.addEventListener('DOMContentLoaded', function () {
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth();

    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

    const container = document.querySelector('.calendar-container');



    const daysContainer = document.createElement('div');
    daysContainer.classList.add('days');
    container.appendChild(daysContainer);

    for (let i = 0; i < firstDayOfMonth; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.classList.add('day');
        daysContainer.appendChild(emptyDay);
    }

    for (let i = 1; i <= daysInMonth; i++) {
        const day = document.createElement('div');
        day.classList.add('day');
        day.textContent = i;

        if (currentDate.getDate() === i) {
            day.classList.add('today');
        }

        daysContainer.appendChild(day);
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const calendarContainer = document.querySelector('.calendar-container');
    const mealPlanContainer = document.getElementById('meal-plan');

    calendarContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('day')) {
            const clickedDay = event.target.textContent;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'get_meal_plan.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    mealPlanContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.send(`day=${clickedDay}`);
        }
    });
});
