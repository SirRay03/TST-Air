<!-- view all flights -->
<html>
    <head>
        <title>Flights</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .container {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Flights</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Flight ID</th>
                        <th>Flight Number</th>
                        <th>Departure Airport</th>
                        <th>Arrival Airport</th>
                        <th>Departure Date</th>
                        <th>Arrival Date</th>
                        <th>Price</th>
                        <th>Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($flight as $flight): ?>
                        <tr>
                            <td><?= $flight['flight_id'] ?></td>
                            <td><?= $flight['flight_number'] ?></td>
                            <td><?= $flight['departure_airport'] ?></td>
                            <td><?= $flight['arrival_airport'] ?></td>
                            <td><?= $flight['departure_date'] ?></td>
                            <td><?= $flight['arrival_date'] ?></td>
                            <td><?= $flight['price'] ?></td>
                            <td><?= $flight['seats'] ?></td>
                            <td>
                                <a href="/flight/edit-flight/<?= $flight['flight_id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="/flight/delete-flight/<?= $flight['flight_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/flight/add-flight" class="btn btn-success">Add Flight</a>
        </div>
</html>