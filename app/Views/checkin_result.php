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
    <?php if(isset($checkin_result)): ?>
        <ul>
            <li><strong>Booking ID:</strong> <?php echo $checkin_result['booking_id']; ?></li>
            <li><strong>Passenger Name:</strong> <?php echo $checkin_result['honorifics'] . ' ' . $checkin_result['first_name'] . ' ' . $checkin_result['last_name']; ?></li>
            <li><strong>Flight ID:</strong> <?php echo $checkin_result['flight_id']; ?></li>
            <li><strong>Departure Airport:</strong> <?php echo $checkin_result['departure_airport']; ?></li>
            <li><strong>Arrival Airport:</strong> <?php echo $checkin_result['arrival_airport']; ?></li>
            <li><strong>Departure Date:</strong> <?php echo $checkin_result['departure_date']; ?></li>
            <li><strong>Seat Number:</strong> <?php echo $checkin_result['seat_num']; ?></li>
        </ul>
    <?php else: ?>
        <p>No booking information available.</p>
    <?php endif; ?>
</body>
</html>
