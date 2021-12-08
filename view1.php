<?php
error_reporting(0);
include("config.php");
if(count($_POST)>0) {
$ticket=$_POST['ticket'];
$resultz = mysqli_query($conn,"SELECT * FROM cloudvistaticket where ticket='$ticket'");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<meta charset="utf-8">
<meta name = "viewport" content="width=device-width, initial-scale=1">
<style>
.btnl {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 20px 36px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>

</head>
<center>
<body bgcolor="lightblue">
</br>
</br>
</br>
</br>

<table border= 1px solid black cellpadding="1px" cellspacing="1px" style="margin-left:3px" onmouseover="">
<tr>
<td><h3 style=font-family:cursive;>name</h3></td>
<td><h3 style=font-family:cursive;>agent_id</h3></td>
<td><h3 style=font-family:cursive;>campaign</h3></td>
<td><h3 style=font-family:cursive;>customer message</h3></td>
<td><h3 style=font-family:cursive;>support message</h3></td>
<td><h3 style=font-family:cursive;>status</h3></td>
<td><h3 style=font-family:cursive;>assgin_by</h3></td>


</tr>
<?php
$i=0;
while($rowz = mysqli_fetch_array($resultz)) {
?>
<tr>
<td><h3><?php echo $rowz["name"]; ?></h3></td>
<td><h3><?php echo $rowz["agent_id"]; ?></h3></td>
<td><h3><?php echo $rowz["campaign"]; ?></h3></td>
<td><h3><?php echo $rowz["cust_message"]; ?></h3></td>
<td><h3><?php echo $rowz["sup_message"]; ?></h3></td>
<td><h3 align="center"><?php echo $rowz["status"]; ?></h3></td>
<td><h3><?php echo $rowz["assign_by"]; ?></h3></td>

</tr>

<?php
$i++;
}
?>
</table>
    <tr>
      </br>
      </br>
 
  <td><h5></h5> <form name="back"  method="post" action="index.php">
    <input type="submit" name="back" id="back" value="back" class="btnl" />
</form></td>
    <td>
  </td>
</tr>

</center>
</body>
</html>