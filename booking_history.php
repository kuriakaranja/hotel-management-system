<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="styles.css">
</head>
<?php

session_start();

$conn=new mysqli('localhost','root','','oasis');

$email=$_SESSION['guests_logged_in'];


?>

<style>

body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('view.jpg');
      

      }


      table{

font-family:arial,sans-serif;
border-collapse: collapse;
width:75%;
margin-left:0.5%;
background-color:tan;
margin-top:1%;
}

td,th{
    border: 1px solid #dddddd;
    text-align:centre;
    padding:4px;
    
    
}


th,h2{
background-color:rgb(4, 4, 83);
color:white;

}





      </style>


<body>

<div class="wrapper">
    <div class="sidebar">
        <h3>MENU</h3><hr>
        <ul>
            
            
        <li><a href="room-booking.php">Book Room</a></li>
            
            <li><a href="booking_history.php">Booking History</a></li>
            
            <li><a href="experience.php">Hotel Experience</a></li>

        
             <li><a href="logout.php">Logout</a></li>


        </ul> 
        
    </div>
    <div class="main_content">
    <div class="header">
            
    <?php


$conn=new mysqli('localhost','root','','oasis');

$query = $conn->query("SELECT * from guests WHERE guest_id ='$_SESSION[guest_id]'") or die (mysqli_errno());
$result = $query->fetch_array();

?>
 
 <p>WELCOME: <?php echo $result['name'];?></p>
             
   

</div>
  
    


<center><h2>History of Booking</h2></center>


<center><table style="width:75%">
  <tr>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>MOBILE</th>
    <th>ID_NUMBER</th>
    <th>ROOM TYPE</th>
    <th>CHECKING_DATE</th>
    <th>CHECKOUT_DATE</th>
    <th>Action</th>

  </tr>

  <tbody>
<?php

$conn=new mysqli('localhost','root','','oasis');

// filtering booking history of the guest by login email
$query=$conn->query("SELECT * FROM bookings WHERE email='$email'");
while($row=$query->fetch_array()){
    
    $booking_id=$row['booking_id'];

?>

  <tr>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['mobile'];?></td>
    <td><?php echo $row['id_no'];?></td>
    <td><?php echo $row['room_type'];?></td>
    <td><?php echo $row['checkin_date'];?></td>
    <td><?php echo $row['checkout_date'];?></td>

    
<td>

<a href="cancelbooking.php<?php echo '?booking_id='.$booking_id;?>" 
onclick="return confirm('Do you want to cancel booking?')" style='color:darkred '>cancel</a>

</td>


<?php
    }
    ?>
  </tr>


</tbody>
</table></center>


</body>
</html>