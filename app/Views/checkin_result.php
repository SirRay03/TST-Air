<!DOCTYPE html>
<html>
<head>
    <title>Check-in Result</title>
    <style>
        /* Add some style to the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        h1 {
            color: #333333;
            text-align: center;
        }
        ul {
            list-style-type: none;
            margin: 0 auto;
            padding: 0;
            width: 50%;
        }
        li {
            border: 1px solid #cccccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        p {
            color: #ff0000;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Check-in Result</h1>
    <?php if(isset($booking)): ?>
        <ul>
            <li><strong>PNR:</strong> <?php echo $booking->pnr; ?></li>
            <li><strong>Last Name:</strong> <?php echo $booking->last_name; ?></li>
            <li><strong>Flight ID:</strong> <?php echo $booking->flight_id; ?></li>
            <li><strong>Created At:</strong> <?php echo $booking->created_at; ?></li>
            <li><strong>Paid At:</strong> <?php echo $booking->paid_at; ?></li>
            <li><strong>Seat Number:</strong> <?php echo $booking->seat_num; ?></li>
        </ul>
    <?php else: ?>
        <p>No booking information available.</p>
    <?php endif; ?>
</body>
</html>
