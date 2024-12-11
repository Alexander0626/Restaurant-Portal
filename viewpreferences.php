<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Preferences</title>
</head>
<body>
    <h1>Customer Preferences</h1>
    <table border="1">
        <tr>
            <th>Favorite Table</th>
            <th>Dietary Restrictions</th>
        </tr>
        <tr>
            <td><?= htmlspecialchars($preferences['favoriteTable']) ?></td>
            <td><?= htmlspecialchars($preferences['dietaryRestrictions']) ?></td>
        </tr>
    </table>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>
