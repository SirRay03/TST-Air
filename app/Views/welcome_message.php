<!DOCTYPE html>
<html>
<head>
    <title>Airline Landing Page</title>
    <style>
        /* Add some style to the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("https://wallpaperset.com/w/full/c/7/c/249456.jpg"); /* Use a background image of a plane */
            background-size: cover;
            background-repeat: no-repeat;
        }
        .header {
            background-color: #333;
            color: #ffffff;
            padding: 10px;
            text-align: center;
        }
        .main {
            margin: 15px;
            color: #000000; /* This will make the text color white */
            text-align: center;
        }
        .footer {
            background-color: #333;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        /* Add some style for the buttons */
        .button {
            display: inline-block;
            padding: 15px 25px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #555;
        }
        /* Add some style for the images */
        .image {
            display: block;
            width: 50%;
            height: auto;
            margin: 0 auto;
            border: 2px solid #ffffff;
            border-radius: 10px;
        }
        .logo {
            display: block;
            width: auto;
            height: 200px; /* This will make the logo 100 pixels high */
            margin: 0 auto;
            border: 2px solid #ffffff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- if no session found, show different menu -->
        <?php if (!session()->get('log')): ?>
            <a href="/login" class="button">Login</a>
            <a href="/booking/checkin" class="button">Passenger Check-In</a>
        <?php else: ?>
            <!-- Add the buttons for the services -->
            <a href="/flight" class="button">View Flights</a>
            <a href="/airport" class="button">View Airports</a>
            <a href="/flight/add-flight" class="button">Add Flight</a>
            <a href="/airport/add-airport" class="button">Add Airport</a>
            <a href="/financial-recap" class="button">Financial Recap</a>
            <a href="/logout" class="button">Logout</a>
        <?php endif; ?>
    </div>
    <div class="main">
        <img src="https://i.imgur.com/71peiTl.jpeg" alt="OF logo" class="logo">
        <h1>Welcome to OnlyFlights!</h1>
        <h2>About Us</h2>
        <p>We are committed to providing the best travel experience for all our customers.</p>
        <h2>Our Services</h2>
        <p>We offer flights to numerous destinations around the world. Book your flight today!</p>
        <!-- Add an image of a world map with flight routes -->
        <img src="https://www.visualcapitalist.com/wp-content/uploads/2022/09/CP-Adam-Symington-Mapping-Airways-Main.png" alt="World Map with Flight Routes" class="image">
    </div>
    <div class="footer">
        <p>© 2023 OnlyFlights. All rights reserved.</p>
    </div>
</body>
</html>
