<!DOCTYPE html>
<html>
<head>
    <title>View Airports</title>
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
            <td><a href="#edit-modal" class="edit-link" data-iata="<?= $a->iata; ?>" rel="modal:open">Edit</a></td>
            <td><a href="#delete-modal" class="delete-link" data-iata="<?= $a->iata; ?>" rel="modal:open">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Edit Modal -->
    <div id="edit-modal" class="modal">
        <p>Edit Airport</p>
        <form id="edit-form">
            <label for="edit-iata">IATA:</label><br>
            <input type="text" id="edit-iata" name="iata" value="" disabled><br>
            <label for="edit-country-id">Country ID:</label><br>
            <select id="edit-country-id" name="country_id">
                <?php foreach ($countries as $country): ?>
                    <option value="<?= $country->code; ?>"><?= $country->name; ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="edit-name">Name:</label><br>
            <input type="text" id="edit-name" name="name" value=""><br>
            <label for="edit-city">City:</label><br>
            <input type="text" id="edit-city" name="city" value=""><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <!-- Delete Modal -->
    <div id="delete-modal" class="modal">
        <p>Delete Airport</p>
        <p>Are you sure you want to delete this airport?</p>
        <form id="delete-form">
            <input type="hidden" id="delete-iata" name="iata" value="">
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
    $(document).ready(function(){
        $('.edit-link').click(function(){
            var iata = $(this).data('iata');
            $('#edit-iata').val(iata);

            // Use AJAX to fetch the airport details
            $.ajax({
                url: 'airport/fetch-airport/' + iata,  // Adjust the URL as needed
                method: 'GET',
                success: function(response) {
                    // Assuming the response is a JSON object containing the airport details
                    console.log(response);  // Log the response data
                    $('#edit-country-id').val(response[0].country_id);
                    $('#edit-name').val(response[0].name);
                    $('#edit-city').val(response[0].city);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Log any errors
                    console.log('AJAX request failed: ' + textStatus + ', ' + errorThrown);
                }
            });
        });

        $('#edit-form').submit(function(e){
            e.preventDefault();

            // Get the form data
            var formData = $(this).serialize();

            // Use AJAX to submit the form data
            $.ajax({
                url: 'airport/edit-airport/' +$('#edit-iata').val(),  // Adjust the URL as needed
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    console.log(response);
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Log any errors
                    console.log('AJAX request failed: ' + textStatus + ', ' + errorThrown);
                }
            });
        });

        $('.delete-link').click(function(){
            var iata = $(this).data('iata');
            $('#delete-iata').val(iata);
        });

        $('#delete-form').submit(function(e){
            e.preventDefault();

            // Get the form data
            var formData = $(this).serialize();

            // Use AJAX to submit the form data
            $.ajax({
                url: 'airport/delete-airport/' + $('#delete-iata').val(),  // Adjust the URL as needed
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
    });
    </script>
</body>
</html>
