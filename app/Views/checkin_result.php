<!DOCTYPE html>
<html>
<head>
    <title>Check-in Result</title>
</head>
<body>
    <h1>Check-in Result</h1>
    <?php if(isset($booking)): ?>
        <table>
            <tr>
                <th>PNR</th>
                <th>Last Name</th>
                <th>Flight ID</th>
                <th>Created At</th>
                <th>Paid At</th>
                <th>Seat Number</th>
            </tr>
            <tr>
                <td><?php echo $booking->pnr; ?></td>
                <td><?php echo $booking->last_name; ?></td>
                <td><?php echo $booking->flight_id; ?></td>
                <td><?php echo $booking->created_at; ?></td>
                <td><?php echo $booking->paid_at; ?></td>
                <td><?php echo $booking->seat_num; ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>No booking information available.</p>
    <?php endif; ?>
</body>
</html>
