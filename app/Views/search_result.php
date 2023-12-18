<!DOCTYPE html>
<html>
    <head>
        <title>
            Search Result
        </title>
    </head>
    <body>
        <h1>
            Search Result
        </h1>
        <?php if (isset($flights)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Flight Number</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Schedule</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Capacity</th>
                        <th>Available Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($flights as $flight) : ?>
                        <tr>
                            <td><?= $flight->id ?></td>
                            <td><?= $flight->origin_id ?></td>
                            <td><?= $flight->destination_id ?></td>
                            <td><?= $flight->schedule ?></td>
                            <td><?= $flight->duration ?></td>
                            <td><?= $flight->price ?></td>
                            <td><?= $flight->capacity ?></td>
                            <td>
                                <a href="/booking/add/<?= $flight->id ?>">Book</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No flights found.</p>
        <?php endif ?>
    </body>
</html>