<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
</head>
<body>
    <h1>Add a New Reservation</h1>
    <form action="index.php?action=addReservation" method="POST">
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name" required>
        <br><br>
        
        <label for="contact_info">Contact Info:</label>
        <input type="text" id="contact_info" name="contact_info" required>
        <br><br>
        
        <label for="reservation_time">Reservation Time:</label>
        <input type="datetime-local" id="reservation_time" name="reservation_time" required>
        <br><br>
        
        <label for="number_of_guests">Number of Guests:</label>
        <input type="number" id="number_of_guests" name="number_of_guests" required>
        <br><br>
        
        <label for="special_requests">Special Requests:</label>
        <textarea id="special_requests" name="special_requests"></textarea>
        <br><br>
        
        <button type="submit">Add Reservation</button>
    </form>
    <br>
    <a href="index.php?action=viewReservations">View All Reservations</a>
</body>
</html>
