<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
</head>
<body>
    <h1>All Reservations</h1>
    <?php if (!empty($reservations)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Customer ID</th>
                    <th>Reservation Time</th>
                    <th>Number of Guests</th>
                    <th>Special Requests</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= htmlspecialchars($reservation['reservationId']) ?></td>
                        <td><?= htmlspecialchars($reservation['customerId']) ?></td>
                        <td><?= htmlspecialchars($reservation['reservationTime']) ?></td>
                        <td><?= htmlspecialchars($reservation['numberOfGuests']) ?></td>
                        <td><?= htmlspecialchars($reservation['specialRequests']) ?></td>
                        <td>
                            <a href="index.php?action=deleteReservation&reservation_id=<?= $reservation['reservationId'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No reservations found.</p>
    <?php endif; ?>
    <br>
    <a href="index.php?action=addReservation">Add a New Reservation</a>
</body>
</html>
