<?php
include 'config.php';
if(isset($_POST['submit']))
{
  $ticket = $_POST['ticket'];
  $status = $_POST['status'];
  $sup_message = $_POST['sup_message'];
  $assign_by = $_POST['assign_by'];

  $sql = "UPDATE cloudvistaticket SET status='$status', sup_message='$sup_message',assign_by='$assign_by' WHERE `ticket`='$ticket'";
  

  if(mysqli_query($conn, $sql)){
      header('Location: ticket.php?ticket='.$ticket.'');
  } else {
      header('Location: ticket.php?ticket='.$ticket.'');
  }

}


 ?>
