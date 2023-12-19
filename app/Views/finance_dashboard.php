<?php
// Assuming the response is stored in a variable called $response_finance
$sales = $response_finance["sales"]; // Get the sales array from the response
$total = 0; // Initialize the total revenue to zero
?>

<html>
<head>
    <style>
        /* Add some style to the page */
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://wallpaperaccess.com/full/1307429.jpg"); /* Use a background image of a plane */
            background-size: cover;
            background-repeat: no-repeat;
        }
        h1 {
            color: #ffffff;
            text-align: center;
            text-shadow: 2px 2px 4px #000000; /* Add some shadow to the title */
        }
        p {
            color: #ffffff;
            text-align: center;
        }
        table, th, td {
            border: 1px solid #ffffff;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            color: #ffffff;
            text-align: center;
        }
        th {
            background-color: #333;
        }
        tr:nth-child(even) {
            background-color: #0f0f0f;
            color: #333;
        }
        tr:nth-child(odd) {
            background-color: #5f5f5f;
            color: #333;
        }
        /* Add some style for the logo */
        .logo {
            display: block;
            width: auto;
            height: 200px;
            margin: 0 auto;
            border: 2px solid #ffffff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Add the logo of the airline -->
    <img src="https://i.imgur.com/71peiTl.jpeg" alt="OF logo" class="logo">
    <h1>Sales Report</h1>
    <p>Message: <?php echo $response_finance["message"]; ?></p>
    <table>
        <tr>
            <th>Month</th>
            <th>Flight ID</th>
            <th>Revenue</th>
        </tr>
        <?php
        // Use foreach to loop through the sales array
        foreach ($sales as $sale) {
            // Get the month, flight_id and revenue from each sale
            $month = $sale["MONTH"];
            $flight_id = $sale["flight_id"];
            $revenue = $sale["revenue"];
            // Add the revenue to the total
            $total += $revenue;
            // Display the sale data in a table row
            echo "<tr>";
            echo "<td>$month</td>";
            echo "<td>$flight_id</td>";
            echo "<td>$revenue</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <p>Total Revenue: <?php echo $total; ?></p>
</body>
</html>
