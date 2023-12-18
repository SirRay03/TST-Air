<!DOCTYPE html>
<html>
<head>
    <title>Add Flight</title>
    <style>
        /* Add some style to the page */
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://wallpaperset.com/w/full/c/7/c/249456.jpg"); /* Use a background image of a plane */
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
        p {
            color: #ff0000;
            text-align: center;
        }
        .alert {
            display: none;
            color: red;
        }
    </style>
    <script>
        function validateForm() {
            var fields = ['flight_number', 'origin_id', 'destination_id', 'schedule', 'duration', 'price', 'capacity'];
            var isValid = true;

            for (var i = 0; i < fields.length; i++) {
                var field = document.getElementById(fields[i]);
                var alertDiv = document.getElementById(fields[i] + '_alert');

                if (field.value == "") {
                    alertDiv.style.display = 'block';
                    isValid = false;
                } else {
                    alertDiv.style.display = 'none';
                }
            }

            return isValid;
        }

        window.onload = function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                var form = event.target;
                var data = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: data
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data.success) {
                        // Use an alert instead of a toast to show the message
                        alert(data.message);
                    }
                });
            });
        }
        
        window.onload = function() {
            var now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            var tomorrow = new Date(now);
            tomorrow.setDate(tomorrow.getDate() + 1);
            tomorrow.setHours(0,0,0,0);

            var minDateTime = tomorrow.toISOString().slice(0,16);

            document.getElementById("schedule").setAttribute("min", minDateTime);
        }
    </script>
</head>
<body>
    <h1>Add Flight</h1>
    <form action="/flight/add" method="POST">
        <label for="flight_number">Flight Number OF-...</label>
        <input type="text" name="flight_number" id="flight_number" required>
        <div id="flight_number_alert" class="alert">This field is required.</div>
        
        <label for="origin_id">Departure Airport</label>
        <select name="origin_id" id="origin_id" required>
            <option value="">Select an airport</option>
            <?php foreach ($airports as $airport) : ?>
                <option value="<?= $airport->iata ?>"><?= $airport->name ?></option>
            <?php endforeach ?>
        </select>
        <div id="origin_id_alert" class="alert">This field is required.</div>

        <label for="destination_id">Arrival Airport</label>
        <select name="destination_id" id="destination_id" required>
            <option value="">Select an airport</option>
            <?php foreach ($airports as $airport) : ?>
                <option value="<?= $airport->iata ?>"><?= $airport->name ?></option>
            <?php endforeach ?>
        </select>
        <div id="destination_id_alert" class="alert">This field is required.</div>

        <label for="schedule">Departure Time</label>
        <input type="datetime-local" name="schedule" id="schedule" required>
        <div id="departure_time_alert" class="alert">This field is required</div>

        <label for="duration">Duration</label>
        <input type="time" name="duration" id="duration" required>
        <div id="duration_alert" class="alert">This field is required</div>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" required>
        <div id="price_alert" class="alert">This field is required</div>

        <label for="capacity">Capacity</label>
        <input type="number" name="capacity" id="capacity" required>
        <div id="capacity_alert" class="alert">This field is required</div>
        
        <input type="submit" value="Add Flight">
    </form>
</body>
</html>
