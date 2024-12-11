<!DOCTYPE html>
<html>
<head>
    <title>Add Dining Preferences</title>
</head>
<body>
    <h1>Add Dining Preferences</h1>
    <form action="index.php?action=addDiningPreferences" method="POST">
        <label>Customer ID:</label>
        <input type="number" name="customer_id" required><br><br>
        
        <label>Favorite Table:</label>
        <input type="text" name="favorite_table" required><br><br>
        
        <label>Dietary Restrictions:</label>
        <input type="text" name="dietary_restrictions" required><br><br>
        
        <button type="submit">Submit</button>
    </form>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
