<?php
include "config.php";
function cleanData(&$str)
{
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\r?\n/", "\\n", $str);
  if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}
$filename = 'Masterdata_'.time().'.csv';

// POST values
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

// Select query
$query = "SELECT * FROM cloudvistaticket ORDER BY id asc";

if(isset($_POST['from_date']) && isset($_POST['to_date'])){
	$resultz = mysqli_query($conn,"SELECT * FROM cloudvistaticket where c_date between '".$from_date."' and '".$to_date."' ORDER BY id asc");
}
//$rowz = mysqli_fetch_assoc($resultz);
//$resultz = mysqli_query($con,$query);
$employee_arr = array();

// file creation
$file = fopen($filename,"w");

$employee_arr = array("id","ticket","c_date","c_time","name","agent_id","campaign","cust_messag","sup_message","assign_by","status"); 
fputcsv($file,$employee_arr);   
while($rowz = mysqli_fetch_assoc($resultz))
{
    $id = $rowz['id'];
    $ticket = $rowz['ticket'];
    $c_date =$rowz['c_date'];
    $c_time =$rowz['c_time'];  
    $name = $rowz['name'];
    $agent_id = $rowz['agent_id'];
    $campaign = $rowz['campaign'];
    $cust_message = $rowz['cust_message'];
    $sup_message = $rowz['sup_message'];
    $assign_by = $rowz['assign_by'];
    $status = $rowz['status'];
    // Write to file 
    $employee_arr = array($id, $ticket,$c_date,$c_time,$name,$agent_id,$campaign,$cust_message,$sup_message,$assign_by,$status);
    fputcsv($file,$employee_arr);   
}

fclose($file); 

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv; "); 

readfile($filename);

// deleting file
unlink($filename);
exit();
?>
