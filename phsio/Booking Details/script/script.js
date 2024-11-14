document.addEventListener('DOMContentLoaded', function() {
    const calendar = document.getElementById('calendar');
    const daysInMonth = 30;
    const today = new Date().getDate();
    const timeSlots = ['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM'];

    for (let i = 1; i <= daysInMonth; i++) {
        const dateElement = document.createElement('div');
        dateElement.className = 'date';
        dateElement.textContent = i;
        if (i === today) {
            dateElement.classList.add('selected');
        }
        dateElement.addEventListener('click', function() {
            document.querySelectorAll('.date').forEach(date => date.classList.remove('selected'));
            dateElement.classList.add('selected');
        });
        calendar.appendChild(dateElement);
    }

    const afternoonSlots = document.getElementById('afternoon-slots');
    const morningSlots = document.getElementById('morning-slots');
    const eveningSlots = document.getElementById('evening-slots');

    timeSlots.forEach(slot => {
        const slotElement = document.createElement('div');
        slotElement.className = 'slot';
        slotElement.textContent = slot;
        slotElement.addEventListener('click', function() {
            document.querySelectorAll('.slot').forEach(slot => slot.classList.remove('selected'));
            slotElement.classList.add('selected');
        });
        afternoonSlots.appendChild(slotElement.cloneNode(true));
        morningSlots.appendChild(slotElement.cloneNode(true));
        eveningSlots.appendChild(slotElement.cloneNode(true));
    });
});
