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
            form {
                max-width: 50%;
                margin: 0 auto;
                padding: 20px;
                border: 2px solid #ffffff;
                border-radius: 10px;
                background-color: rgba(255, 255, 255, 0.8); /* Use a semi-transparent background for the form */
            }
            label {
                display: block;
                margin-bottom: 5px;
            }
            input, button {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }
            input[type="text"], input[type="password"] {
                border: 1px solid #333;
                border-radius: 5px;
                padding: 10px;
            }
            button {
                background-color: #333;
                color: #ffffff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background-color: #555;
            }
            /* Add some style for the logo */
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
        <!-- Add the logo of the airline -->
        <img src="https://i.imgur.com/71peiTl.jpeg" alt="OF logo" class="logo">
        <h1>Login</h1>
        <form action="/login-process" method="POST">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Login</button>
        </form>
    </body>
</html>
