// document.getElementById('bookingForm').addEventListener('submit', function (e) {
//     const dateInput = document.getElementById('date');
//     const timeInput = document.getElementById('time');

//     if (!dateInput.value || !timeInput.value) {
//         alert('Please select a date and time.');
//         e.preventDefault();
//     }
// });






document.getElementById('bookingForm').addEventListener('submit', function (e) {
    const dateInput = document.getElementById('date');
    const timeInput = document.getElementById('time');

    if (!dateInput.value || !timeInput.value) {
        alert('Please select a date and time.');
        e.preventDefault();
    }
});
