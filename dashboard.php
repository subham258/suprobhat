<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #c72828;
    background-color: #ffeb9c;
}
    .well{
      background-color: #d8db8c;

    }
    .glyphicon-log-in
    {
      color: #ff0000;
    }
    .navbar-inverse .navbar-nav>li>a {
    color: #c2f91b;;
}
    .navbar-brand {
    color: rgb(249 3 60);
}

.navbar-inverse .navbar-brand {
    color: #270fed;
}
.table-bordered>thead>tr>th {
    border: 1px solid;

color: #1324eb;
}
.table-bordered>tr>td
{
  border: 1px solid;

color: #5175cf;
}

.containers{
      background-color: #0033cc;

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
      <a class="navbar-brand" href="#">Cloud</a>
      <p class="navbar-brand" href="#">Vista</p>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
      <li><a href="report.php">Report</a> </li>
        <li><a href="reset-password.php">Reset Password</a> </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
      <br><br><br><br>
      <div class="col-sm-12">
        <div class="table-responsive">
          <table id='userTable' class='table table-bordered'>
          <thead>
           <tr>
              <th>Date</th>
              <th>Time</th>
               <th>Ticket ID</th>
               <th>Status</th>
               <th>Assign_by</th>

           </tr>
          </thead>

          <?php

          include 'config.php';
          //Getting default page number
                  if (isset($_GET['pageno'])) {
                      $pageno = $_GET['pageno'];
                  } else {
                      $pageno = 1;
                  }
          // Formula for pagination
                  $no_of_records_per_page = 20;
                  $offset = ($pageno-1) * $no_of_records_per_page;
          // Getting total number of pages
                  $total_pages_sql = "SELECT COUNT(*) FROM cloudvistaticket";
                  $result = mysqli_query($conn,$total_pages_sql);
                  $total_rows = mysqli_fetch_array($result)[0];
                  $total_pages = ceil($total_rows / $no_of_records_per_page);
                  $sql = "SELECT * FROM cloudvistaticket ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
                  $res_data = mysqli_query($conn,$sql);
                  $cnt=1;
                  while($row = mysqli_fetch_array($res_data)){?>
                    <tbody>
                    <tr>
                        <td><?php  echo $row['c_date']; ?></td>
                        <td><?php  echo $row['c_time']; ?></td>
                        <td><a href="ticket.php?ticket=<?php  echo $row['ticket']; ?>" target="_blank"><?php  echo $row['ticket']; ?></a> </td>
                        <td><?php  echo $row['status']; ?></td>
                        <td><?php  echo $row['assign_by']; ?></td>
                    </tr>
           <?php
          $cnt++;
            }
              ?>
          </table>
        </div>

      <div align="center">
          <ul class="pagination" >
              <li><a href="?pageno=1">First</a></li>
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
              </li>
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
              </li>
              <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
          </ul>
      </div>
      </div>
    </div>
</div>

</body>
</html>
