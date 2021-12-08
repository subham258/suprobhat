<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'config.php';
$ticket = $_GET['ticket'];
$resultz = mysqli_query($conn,"SELECT * FROM cloudvistaticket where ticket='$ticket'");
$rowz = mysqli_fetch_assoc($resultz);
$name = $rowz['name'];
$agent_id = $rowz['agent_id'];
$campaign = $rowz['campaign'];
$assign_by = $rowz['assign_by'];
$cust_message = $rowz['cust_message'];
$sup_message = $rowz['sup_message'];
$status = $rowz['status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ticket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #EB0B1C;

    }
    .btn-block {
    display: block;
    width: 100%;
    color: DC291E;
}
.navbar-inverse .navbar-brand {
    color:  #1487ED;
}
.navbar_brand{
  color: #1487ED;

}

    .well{
      background-color: #23b3c7;
    }
    .h4, h4 {
    font-size: 18px;
    color: #F6162A;
}
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #ebde81;
    background-color: #6e909952;
}
.navbar-inverse .navbar-nav>li>a {
    color: #1868e1;
}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Cloud Vista</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <br><br><br>
  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <h4>#<?php echo $ticket; ?></h4>
        <br><br>
        <form action="updateTicket.php" method="post">
          <input type="hidden" name="ticket" value="<?php echo $ticket; ?>">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control"  placeholder="Enter your name" value="<?php echo $name; ?>" disabled>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Agent ID</label>
                <input type="text" name="agent_id" class="form-control"  placeholder="Enter your name" value="<?php echo $agent_id; ?>" disabled>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Campaign</label>
                <input type="text" name="campaign" class="form-control"  placeholder="Enter your name" value="<?php echo $campaign; ?>" disabled>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>assign</label>
                <select class="form-control" name="assign_by" required>
                <option><?php echo $assign_by; ?></option>
                      <option value="Akash">Akash</option>
                      <option value="Chandranath">Chandranath</option>
                      <option value="Jayesh">Jayesh</option>
                      <option value="Mamoni">Mamoni</option>
                      <option value="Subham">Subham</option>
               
                </select>
             
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                <option><?php echo $status; ?></option>
                      <option value="Pending">Pending</option>
                      <option value="Resolved">Resolved</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label>Customer Message</label>
            <textarea class="form-control" rows="5" name="cust_message" placeholder="Your message..." disabled><?php echo $cust_message; ?></textarea>
          </div>
          <br>
          <div class="form-group">
            <label>Support Reply</label>
            <textarea class="form-control" rows="5" name="sup_message" placeholder="Your message..." required><?php echo $sup_message; ?></textarea>
          </div>
          <br>
          <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
