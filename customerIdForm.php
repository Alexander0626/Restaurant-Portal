<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Customer ID</title>
</head>
<body>
    <h1>View Customer Preferences</h1>
    <form action="index.php?action=viewPreferences" method="POST">
        <label for="customer_id">Customer ID:</label>
        <input type="number" id="customer_id" name="customer_id" required>
        <br><br>
        <button type="submit">Submit</button>
    </form>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
