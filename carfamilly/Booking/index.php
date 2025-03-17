<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Service Booking</title>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://app.embed.im/snow.js" defer></script>

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #141e30, #243b55);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-y: auto;
        }

        .container {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            backdrop-filter: blur(12px);
            color: #ffffff;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 24px;
            color: #ffffff;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: rgb(226, 226, 226);
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.25);
            color: rgb(0, 0, 0);
            font-size: 14px;
            outline: none;
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        .links {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .links a {
            color: #00c8ff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media (min-width: 768px) {
            form {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            form > button {
                grid-column: span 2;
            }
        }

        .response-message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }

        .response-message.success {
            background-color: #e0ffe0;
            color: #008000;
            border: 1px solid #008000;
        }

        .response-message.error {
            background-color: #ffe0e0;
            color: #800000;
            border: 1px solid #800000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Book Your Service Appointment</h1>
    <form id="bookingForm">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>

        <label for="telephone">Telephone Number:</label>
        <input type="tel" id="telephone" name="telephone" placeholder="Enter your phone number" required pattern="[0-9]{10}" title="Enter a valid 10-digit number">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" placeholder="Enter any comments or requests" rows="4"></textarea>

        <label for="date">Select Date:</label>
        <input type="text" id="date" name="date" placeholder="Select a date" required>

        <label for="time">Select Time:</label>
        <select id="time" name="time" required>
            <option value="">--Select Time--</option>
            <option value="09:00">09:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="13:00">01:00 PM</option>
            <option value="14:00">02:00 PM</option>
            <option value="15:00">03:00 PM</option>
            <option value="16:00">04:00 PM</option>
        </select>

        <button type="submit">Submit</button>
    </form>
    <div id="responseMessage" class="response-message"></div>
    <div class="links">
        <a href="#">Already have an account? Login</a>
        <a href="../index.php">Back to Home page</a>
    </div>
</div>

<!-- Flatpickr JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    flatpickr("#date", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
        minDate: "today"
    });

    const bookingForm = document.getElementById('bookingForm');
    const responseMessage = document.getElementById('responseMessage');

    bookingForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com)$/;

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email (e.g., abc@gmail.com, abc@yahoo.com).");
            return;
        }

        const formData = new FormData(bookingForm);

        fetch('process_booking.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            responseMessage.innerHTML = `<div class="success">${data}</div>`;
            // Disable form after submission
            bookingForm.reset();
        })
        .catch(error => {
            responseMessage.innerHTML = `<div class="error">Error: ${error.message}</div>`;
        });
    });
});
</script>
</body>
</html>
