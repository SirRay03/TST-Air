<!DOCTYPE html>
<html>
<head>
    <title>View Flight</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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
            <input type="text" id="edit-duration" name="duration" value=""><br>
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
    </script>
</body>
</html>
