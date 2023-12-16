<html>
<head>
    <title>Add Flight</title>
    <style>
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
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data.success) {
                        document.querySelector('.toast').innerHTML = data.message;
                        document.querySelector('.toast').classList.add('show');
                        setTimeout(function() {
                            document.querySelector('.toast').classList.remove('show');
                        }, 3000);
                    }
                });
            });
        }
    </script>
</head>
<body>
    <h1>Add Flight</h1>
    <form action="/flight/add-flight" method="POST">
        <label for="flight_number">Flight Number OF-...</label>
        <input type="text" name="flight_number" id="flight_number" required>
        <label for="departure_airport">Departure Airport</label>
        <select name="departure_airport" id="departure_airport" required>
            <option value="">Select an airport</option>
            <?php foreach ($airports as $airport) : ?>
                <option value="<?= $airport->iata ?>"><?= $airport->iata ?></option>
            <?php endforeach ?>
        </select>
        <label for="arrival_airport">Arrival Airport</label>
        <select name="arrival_airport" id="arrival_airport" required>
            <option value="">Select an airport</option>
            <?php foreach ($airports as $airport) : ?>
                <option value="<?= $airport->iata ?>"><?= $airport->iata ?></option>
            <?php endforeach ?>
        </select>
        <label for="departure_time">Departure Time</label>
        <input type="datetime-local" name="departure_time" id="departure_time" required>
        <label for="duration">Duration</label>
        <input type="number" name="duration" id="duration" required>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" required>
        <label for="capacity">Capacity</label>
        <input type="number" name="capacity" id="capacity" required>
        <input type="submit" value="Add Flight">
    </form>
    <a href="/flight">Back to Flight List</a>
    <div class="toast"></div>
</html>