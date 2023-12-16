<!-- Insert pnr and last name -->
<html>
<head>
    <title>Check In</title>
    <link rel="stylesheet" href="/css/style.css">
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
    <div class="container">
        <h1>Check In</h1>
        <form action="/checkin/checkin" method="post">
            <div class="form-group">
                <label for="pnr">PNR</label>
                <input type="text" class="form-control" id="pnr" name="pnr" placeholder="Enter PNR">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>
            <button type="submit" class="btn btn-primary">Check In</button>
        </form>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"></div>
    </div>
</body>
</html>