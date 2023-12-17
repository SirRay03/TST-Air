<!DOCTYPE html>
<html>
<head>
    <title>View Airports</title>
</head>
<body>
    <h1>Airport Details</h1>
    <table>
        <tr>
            <th>IATA</th>
            <th>Country ID</th>
            <th>City</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($airports as $a): ?>
        <tr>
            <td><?= $a->iata; ?></td>
            <td><?= $a->country_id; ?></td>
            <td><?= $a->city; ?></td>
            <td><?= $a->name; ?></td>
            <td><a href="<?= site_url('airport/edit/'.$a->iata); ?>">Edit</a></td>
            <td><a href="<?= site_url('airport/delete/'.$a->iata); ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
