<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="styles.css">
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
margin-left:1%;
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



/* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  margin-left:25%;
}



/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  
  background-color:black;
  
}

/* Links inside the dropdown */
.dropdown-content a {
  color:yellow;
  padding: 12px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color:blue;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}



</style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h3>MENU</h3><hr>
        <ul>
            
          
            <li><a href="add_rooms.php">Add rooms</a></li>

            <li><a href="updaterooms.php">Update Room details</a></li>
            
            <li><a href="logout.php">Logout</a></li>
        
        </ul> <br><br>

   <div class="dropdown">
  <button class="dropbtn">Reports</button>
  <div class="dropdown-content">
    <a href="booking.php">Bookings</a>
    <a href="guests.php">Registered guests</a>
    <a href="feedback.php">Guest Feedback</a>
  </div>
</div>
        
    </div>
    <div class="main_content">
    <div class="header">
            
    <p>welcome</p>
                    
            </div> 
       
       <div>
    
    </div>
  </div>
</div>



<center><h2>All Bookings</h2></center>


<center><table style="width:68%">
  <tr>

    <th>NAME</th>
    <th>EMAIL</th>
    <th>MOBILE</th>
    <th>ID_NUMBER</th>
    <th>ROOM TYPE</th>
    <th>CHECKING_DATE</th>
    <th>CHECKOUT_DATE</th>
    <th>ACTION</th>



  </tr>

  <tbody>
<?php

$conn=new mysqli('localhost','root','','oasis');

$query=$conn->query("SELECT * FROM bookings ORDER BY booking_id asc");
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
onclick="return confirm('Do you want to cancel booking?')" style='color:darkred '>DELETE</a>

</td>

 

<?php
    }
    ?>
  </tr>


</tbody>
</table></center>
</body>
</html>