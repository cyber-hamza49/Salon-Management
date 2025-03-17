<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Hello {{ $name }},</h2>
    <p>Your appointment has been confirmed! <br> Here are the details:</p>
    <ul>
        <li><strong>Service:</strong> {{ $service }}</li>
        <li><strong>Stylist:</strong> {{ $stylist }}</li>
        <li><strong>Date:</strong> {{ $date }}</li>
        <li><strong>Time:</strong> {{ $time }}</li>
    </ul>
    <p>We look forward to serving you!</p>
    <p><strong>BarberX Team</strong></p>
</body>
</html>
