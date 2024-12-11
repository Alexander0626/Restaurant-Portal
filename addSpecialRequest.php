<!DOCTYPE html>
<html>
<head>
    <title>Add Special Request</title>
</head>
<body>
    <h1>Add Special Request</h1>
    <form action="index.php?action=addSpecialRequest" method="POST">
        <label>Reservation ID:</label>
        <input type="number" name="reservation_id" required><br><br>
        <label>Special Request:</label>
        <input type="text" name="special_request" required><br><br>
        <button type="submit">Add Request</button>
    </form>
</body>
</html>
