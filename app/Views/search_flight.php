<!DOCTYPE html>
<html>
    <head>
        <title>
            Search Flight
        </title>
        <script>
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
        <h1>Search your next flight!</h1>
        <form action="/flight/search-result" method="GET">
            <label for="origin_id">Departure Airport</label>
            <select name="origin_id" id="origin_id" required>
                <option value="">Select an airport</option>
                <?php foreach ($airports as $airport) : ?>
                    <option value="<?= $airport->iata ?>"><?= $airport->name ?></option>
                <?php endforeach ?>
            </select>

            <label for="destination_id">Arrival Airport</label>
            <select name="destination_id" id="destination_id" required>
                <option value="">Select an airport</option>
                <?php foreach ($airports as $airport) : ?>
                    <option value="<?= $airport->iata ?>"><?= $airport->name ?></option>
                <?php endforeach ?>
            </select>

            <label for="schedule">Departure Time</label>
            <input type="date" name="schedule" id="schedule" required>

            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" required>

            <input type="submit" value="Search">
        </form>
    </body>
</html>