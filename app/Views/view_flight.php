<!DOCTYPE html>
<html>
<head>
    <title>View Flight</title>
</head>
<body>
    <h1>Flight Details</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Origin ID</th>
            <th>Destination ID</th>
            <th>Price</th>
            <th>Capacity</th>
            <th>Schedule</th>
            <th>Duration</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($flights as $f): ?>
        <tr>
            <td><?= $f->id; ?></td>
            <td><?= $f->origin_id; ?></td>
            <td><?= $f->destination_id; ?></td>
            <td><?= $f->price; ?></td>
            <td><?= $f->capacity; ?></td>
            <td><?= $f->schedule; ?></td>
            <td><?= $f->duration; ?></td>
            <td><a href="<?= site_url('flight/edit/'.$f->id); ?>">Edit</a></td>
            <td><a href="<?= site_url('flight/delete/'.$f->id); ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
