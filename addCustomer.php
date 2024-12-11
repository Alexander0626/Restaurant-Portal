<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form action="index.php?action=addCustomer" method="POST">
        <label>Name:</label>
        <input type="text" name="customer_name" required><br><br>
        <label>Contact Info (Email/Phone):</label>
        <input type="text" name="contact_info" required><br><br>
        <button type="submit">Add Customer</button>
    </form>
</body>
</html>
