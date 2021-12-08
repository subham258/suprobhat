<?php


if(isset($_POST['submit']))
{
  include 'config.php';

  date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y');
    $time = date('h:i:s A');
  
    $name = $_POST['name'];
    $agent_id = $_POST['agent_id'];
    $campaign = $_POST['campaign'];
    $cust_message = $_POST['cust_message'];
  
    $ticket = rand(99,9999999999);
  
    $sql = "INSERT INTO cloudvistaticket (c_date, c_time, ticket, name, agent_id, campaign, cust_message)
    VALUES ('$date', '$time', '$ticket', '$name', '$agent_id', '$campaign', '$cust_message')";
  
    if (mysqli_query($conn, $sql)) {
      $status = '<p><h3 style="color:blue">Thank you for contacting us.....<br> Your ticket number is :</h3><h1 style="color:red">'.$ticket.' </h1></p>';
      
    }
  
    else{
  
      $status = '<p>Ohh! System error</p>';
     header('refresh1  ;url=index.php');
    }
  

}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Support System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    
   
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #0033cc;
     
    }

    .well{
      background-color: #ff0000;
      color: #0a1b70;
    }
    .containers{
      background-color: #0033cc;

    }
    .collapse 
{
  background-color: #0b183e;
}
 .container-fluid
  {
  background-color: #0b183e;
    }
    .glyphicon-log-in
    {
      color: #ff0000;
    }
    .navbar-inverse .navbar-brand {
    color: rgb(249 3 60);
}
.navbar-brand {
    float: left;
    height: 50p;
    padding: 15px  15px;
    font-size: 30px;
    line-height: 20px;
}
.navbar-inverse .navbar-nav>li>a {
    color: rgb(251 255 9);
}
  </style>
</head>
<body style="background-color: #80bfff">

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
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
      </ul>
      <ul class="nav navbar-nav navbar">
        <li> <a href="view.php" ><span class="glyphicon glyphicon-log-in"></span> View Ticket</a> </li>
    
  </ul>


    </div>
  </div>
</nav>

<div class="container">
  <br><br>
  <h1 class="text-center"><img src="logo.png" width="150" height="150"> <br><br> Online Support Portal</h1>
  <br><br><br>
  <div class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
      <?php

      if(isset($_POST['submit']))
      {
        echo "$status <br>";
      }

       ?>
      <div class="well">

        <form action="" method="post">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control"  placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label>Agent ID</label>
            <input type="text" name="agent_id" class="form-control"  placeholder="Your agent id" required>
          </div>
          <div class="form-group">
            <label>Select Campaign</label>
            <select class="form-control" name="campaign" required>
                  <option value="JK">JK</option>
                  <option value="Novoco">Novoco</option>
                  <option value="SailCMO">Sail CMO</option>
                  <option value="SAILTender">SAILTender</option>
                  <option value="SAILBHAILI">SAIL BHAILI</option>
                  <option value="coaljunctaion">Coal junctaion</option>
                  <option value="BuyJunction">Buy Junction</option>
                  <option value="FinaceJunction">Finace Junction</option>
                  <option value="Ambuja">Ambuja</option>
                  <option value="MITR">MITR</option>
                  <option value="BOSCH">BOSCH</option>
                  <option value="IOCL">IOCL</option>
                  <option value="VALUEMART">VALUE MART</option>
                  <option value="VALUEJUNCTION">VALUE JUNCTION</option>
                  <option value="METALJUNCTION">METAL JUNCTION</option>
                  <option value="EPS">EPS</option>
                  <option value="VEDANTA">VEDANTA</option>
                  <option value="TEAHELPLINE">TEA HELPLINE</option>
                  <option value="PUBLICATION">PUBLICATION</option>
                  <option value="PSMS">PSMS</option>
            </select>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" rows="5" name="cust_message" placeholder="Your message..." required></textarea>
          </div>
          <br>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
    <div class="col-sm-4">

    </div>
  </div>
</div>

</body>
</html>
