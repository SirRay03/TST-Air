<!-- Insert pnr and last name -->
<html>
<head>
    <title>Check In</title>
</head>
<body>
    <div class="container">
        <h1>Check In</h1>
        <form action="/checkin-result" method="get">
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