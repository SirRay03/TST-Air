<!DOCTYPE html>
<html>
<head>
    <title>View Flight</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <style>
        /* Add some style to the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        h1 {
            color: #333333;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #cccccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #eeeeee;
        }
        tr:nth-child(even) {
            background-color: #ffffff;
        }
        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        a {
            color: #333333;
            text-decoration: none;
        }
        a:hover {
            color: #555555;
            text-decoration: underline;
        }
        .modal {
            background-color: #ffffff;
            border: 2px solid #333333;
            border-radius: 10px;
            padding: 20px;
        }
        .modal p {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .modal label {
            display: block;
            margin-bottom: 5px;
        }
        .modal input, .modal select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .modal input[type="submit"] {
            background-color: #333333;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .modal input[type="submit"]:hover {
            background-color: #555555;
        }
        /* Add some icons to the edit and delete links */
        .edit-link::before {
            content: "\270E"; /* Unicode character for edit icon */
            margin-right: 5px;
        }
        .delete-link::before {
            content: "\2716"; /* Unicode character for delete icon */
            margin-right: 5px;
        }
    </style>
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
            <td>Rp <?= number_format($f->price, 0, ',', '.'); ?></td>
            <td><?= $f->capacity; ?></td>
            <td><?= $f->schedule; ?></td>
            <td><?= $f->duration; ?></td>
            <td><a href="#edit-modal" class="edit-link" data-id="<?= $f->id; ?>" rel="modal:open">Edit</a></td>
            <td><a href="#delete-modal" class="delete-link" data-id="<?= $f->id; ?>" rel="modal:open">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Edit Modal -->
    <div id="edit-modal" class="modal">
        <p>Edit Flight</p>
        <form id="edit-form">
            <label for="edit-id">ID:</label><br>
            <input type="text" id="edit-id" name="id" value="" disabled><br>
            <label for="edit-origin-id">Origin ID:</label><br>
            <select id="edit-origin-id" name="origin_id">
                <?php foreach ($airports as $airport): ?>
                    <option value="<?= $airport->iata; ?>"><?= $airport->name; ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="edit-destination-id">Destination ID:</label><br>
            <select id="edit-destination-id" name="destination_id">
                <?php foreach ($airports as $airport): ?>
                    <option value="<?= $airport->iata; ?>"><?= $airport->name; ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="edit-price">Price:</label><br>
            <input type="text" id="edit-price" name="price" value=""><br>
            <label for="edit-capacity">Capacity:</label><br>
            <input type="text" id="edit-capacity" name="capacity" value=""><br>
            <label for="edit-schedule">Schedule:</label><br>
            <input type="datetime-local" id="edit-schedule" name="schedule" value=""><br>
            <label for="edit-duration">Duration:</label><br>
            <input type="time" id="edit-duration" name="duration" value=""><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- Delete Modal -->
    <div id="delete-modal" class="modal">
        <p>Delete Flight</p>
        <form id="delete-form">
            <input type="hidden" id="delete-id" name="id" value="">
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('.edit-link').click(function(){
                var id = $(this).data('id');
                $('#edit-id').val(id);
                // Use AJAX to fetch the flight details and populate the edit form
                $.ajax({
                    url: 'flight/fetch-flight/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        $('#edit-origin-id').val(response.origin_id);
                        $('#edit-destination-id').val(response.destination_id);
                        $('#edit-price').val(response.price);
                        $('#edit-capacity').val(response.capacity);
                        $('#edit-schedule').val(response.schedule);
                        $('#edit-duration').val(response.duration);
                    }
                });
            });

            $('.delete-link').click(function(){
                var id = $(this).data('id');
                $('#delete-id').val(id);
            });

            $('#edit-form').submit(function(e){
                e.preventDefault();

                // Get the form data
                var formData = $(this).serialize();

                // Use AJAX to submit the form data
                $.ajax({
                    url: 'flight/edit-flight/' + $('#edit-id').val(),  // Adjust the URL as needed
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);

                        // Refresh the browser
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Log any errors
                        console.log('AJAX request failed: ' + textStatus + ', ' + errorThrown);
                    }
                });
            });

            $('#delete-form').submit(function(e){
                e.preventDefault();

                // Use AJAX to submit the form data
                $.ajax({
                    url: 'flight/delete-flight/' + $('#delete-id').val(),  // Adjust the URL as needed
                    method: 'POST',
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);

                        // Refresh the browser
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Log any errors
                        console.log('AJAX request failed: ' + textStatus + ', ' + errorThrown);
                    }
                });
            });
        });
            
    window.onload = function() {
                var now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                var tomorrow = new Date(now);
                tomorrow.setDate(tomorrow.getDate() + 1);
                tomorrow.setHours(0,0,0,0);

                var minDateTime = tomorrow.toISOString().slice(0,16);

                document.getElementById("edit-schedule").setAttribute("min", minDateTime);
        }
    </script>
</body>
</html>
