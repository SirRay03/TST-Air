<!DOCTYPE html>
<html>
<head>
<style>
.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar .dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="/">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Flights 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/flight">View and Manage Registered Flights</a>
      <a href="/flight/add-flight">Add New Flight</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Airports
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/airport">View and Manage Partner Airports</a>
      <a href="/airport/add-airport">Add New Partner Aiport</a>
    </div>
  </div>
  <a href="/booking/checkin">Passenger Check-In</a>
  <a href="/finance-dashboard">Financial Recap</a>
  <a href="/logout">Logout</a>
</div>

</body>
</html>