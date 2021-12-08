<?php
//include "config.php";

$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

$from_date_error = '';
$to_date_error = '';

if(isset($_POST["export"]))
{
 if(empty($_POST["from_date"]))
 {
  $from_date_error = '<label class="text-danger">Start Date is required</label>';
 }
 else if(empty($_POST["to_date"]))
 {
  $to_date_error = '<label class="text-danger">End Date is required</label>';
 }
 else
 {
  $file_name = 'Order Data.csv';
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$file_name");
  header("Content-Type: application/csv;");

  $file = fopen('php://output', 'w');

  $header = array("id","ticket","c_date","c_time","name","agent_id","campaign","cust_messag","sup_message","assign_by","status"); 
  fputcsv($file, $header);

  $query = "
  SELECT * FROM cloudvistaticket
  WHERE c_date >= '".$_POST["from_date"]."' 
  AND c_date <= '".$_POST["to_date"]."' 
  ORDER BY c_date DESC
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $data = array();
   $data[] = $row["id"];
   $data[] = $row["ticket"];
   $data[] = $row["c_date"];
   $data[] = $row["c_time"];
   $data[] = $row["name"];
   $data[] = $row["agent_id"];
   $data[] = $row["campaign"];
   $data[] = $row["cust_message"];
   $data[] = $row["sup_message"];
   $data[] = $row["assign_by"];
   $data[] = $row["status"];
   fputcsv($file, $data);
  }
  fclose($file);
  exit;
 }
}

$query = "
SELECT * FROM cloudvistaticket 
ORDER BY c_date DESC;
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>

<html>
 <head>
  <title>Daterange Mysql Data Export to CSV in PHP</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Daterange Mysql Data Export to CSV in PHP</h1>
   <br />
   <div class="table-responsive">
    <br />
    <div class="row">
     <form method="post">
      <div class="input-daterange">
       <div class="col-md-4">
        <input type="text" name="from_date" class="form-control" readonly />
        <?php echo $from_date_error; ?>
       </div>
       <div class="col-md-4">
        <input type="text" name="to_date" class="form-control" readonly />
        <?php echo $to_date_error; ?>
       </div>
      </div>
      <div class="col-md-2">
       <input type="submit" name="export" value="Export" class="btn btn-info" />
      </div>
     </form>
    </div>
    <br />
    <table class="table table-bordered table-striped">
     <thead>
     <tr>
                     <th>id</th>
                    <th>Ticket NO</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Customer Name</th>
                    <th>Agent_id</th>
                    <th>Campaign</th>
                    <th>Customer Message</th>
                    <th>Support Message</th>
                    <th>Assign by</th>
                    <th>Status</th>
                </tr>
     </thead>
     <tbody>
      <?php
      foreach($result as $row)
      {
       echo '
       <tr>
           <td>'.$row["id"].'</td>
           <td>'.$row["ticket"].'</td>
           <td>'.$row["c_date"].'</td>
           <td>$'.$row["c_time"].'</td>
           <td>'.$row["name"].'</td>
           <td>'.$row["agent_id"].'</td>
           <td>'.$row["campaign"].'</td>
           <td>'.$row["cust_message"].'</td>
           <td>'.$row["sup_message"].'</td>
           <td>'.$row["assign_by"].'</td>
           <td>'.$row["status"].'</td>

       </tr>
       ';
      }
      ?>
     </tbody>
    </table>
    <br />
    <br />
   </div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });
});

</script>