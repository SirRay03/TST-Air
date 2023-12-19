<!-- Insert pnr and last name -->
<html>
<head>
    <title>Check In</title>
    <!-- Add some style to make the page look nicer -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input {
            display: block;
            width: 96%;
            padding: 10px;
            border: 1px solid #ccc;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .toast {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px;
            border: 1px solid #007bff;
            background-color: #cce5ff;
            color: #004085;
        }
        .logo {
            display: block;
            width: auto;
            height: 25%;
            margin: 0 auto;
            border: 2px solid #ffffff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://i.imgur.com/71peiTl.jpeg" alt="OF logo" class="logo">
        <h1>Web Checkin</h1>
        <form action="/booking/checkin-result" method="get">
            <div class="form-group">
                <label for="booking_id">Booking ID</label>
                <input type="text" class="form-control" id="booking_id" name="booking_id" placeholder="Enter Booking ID">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Passenger Last Name">
            </div>
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"></div>
    </div>
</body>
</html>
