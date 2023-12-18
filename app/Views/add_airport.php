<!DOCTYPE html>
<html>
<head>
    <title>Add Airport</title>
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
        input, select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #333333;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555555;
        }
        .toast {
            visibility: hidden;
            max-width: 50%;
            margin: auto;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
            transform: translateX(-50%);
        }

        .toast.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;} 
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;} 
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>
    <script>
        window.onload = function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();

                var form = event.target;
                var data = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'success') {
                        window.location.href = '/airport/add-airport';
                        var toast = document.getElementById("toast");
                        toast.className = "toast show";
                        setTimeout(function(){ toast.className = toast.className.replace("show", ""); }, 3000);
                    } else {
                        alert('Failed to add airport');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        }
    </script>
</head>
<body>
    <h1>Add Airport</h1>
    <form action="/airport/add" method="post">
        <label for="iata">IATA Code</label>
        <input type="text" name="iata" id="iata" required><br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>
        <label for="city">City</label>
        <input type="text" name="city" id="city" required><br>
        <label for="country">Country</label>
        <select name="country" id="country" required>
            <option value="">Select a country</option>
            <?php foreach ($countries as $country) : ?>
                <option value="<?= $country->code ?>"><?= $country->name ?></option>
            <?php endforeach; ?>
        <input type="submit" value="Add Airport">
    </form>
    <div id="toast" class="toast">Airport added successfully!</div>
</body>
</html>