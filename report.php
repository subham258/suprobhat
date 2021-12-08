<?php 
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Data report date wise</title>
     
        <link href="style.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        
    </head>
    <body>
        <div >
            
            <form method='post' action='download.php'>

                <!-- Datepicker -->
                <input type='text' class='datepicker' placeholder="From date" name="from_date" id='from_date' readonly>
                <input type='text' class='datepicker' placeholder="To date" name="to_date" id='to_date' readonly>

                <!-- Export button -->
                <input type='submit'color='#EB1C0B'; value='Export'  name='Export'>
            </form>  
            <table border='1' style='border-collapse:collapse'; bgcolor='#0BD0EB';>
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
                <?php 
               // $query = "SELECT * FROM employee ORDER BY id asc";
               // $result = mysqli_query($con,$query);
                //$employee_arr = array();
               // while($row = mysqli_fetch_assoc($result)){
                   /* $id = $row['id'];
                    $emp_name = $row['emp_name'];
                    $salary = $row['salary'];
                    $gender = $row['gender'];
                    $city = $row['city'];
                    $email = $row['email'];
                    $date_of_joining = $row['date_of_joining'];
                    $employee_arr[] = array($id,$emp_name,$salary,$gender,$city,$email,$date_of_joining);*/
                   // $ticket = $_GET['ticket'];
$resultz = mysqli_query($conn,"SELECT * FROM cloudvistaticket order by id asc");
$rowz = mysqli_fetch_assoc($resultz);
$employee_arr = array();
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
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $ticket; ?></td>
                        <td><?php echo $c_date; ?></td>
                        <td><?php echo $c_time; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $agent_id; ?></td>
                        <td><?php echo $campaign; ?></td>
                        <td><?php echo $cust_message; ?></td>
                        <td><?php echo $sup_message; ?></td>
                        <td><?php echo $assign_by; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            
            
        </div>

        <!-- Script -->
        <script type='text/javascript' >
        $(document).ready(function(){

            // From datepicker
            $("#from_date").datepicker({ 
                dateFormat: 'yy-mm-dd',changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#to_date").datepicker("option", "minDate", dt);
                }
            });

            // To datepicker
            $("#to_date").datepicker({
                dateFormat: 'yy-mm-dd',changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#from_date").datepicker("option", "maxDate", dt);
                }
            });
        });
        </script>
    </body>
</html>