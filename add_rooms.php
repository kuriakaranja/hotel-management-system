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
     
    .entry{

   background-color:rgba(0, 0, 0, 0.555);
  padding:20px;
  margin-left:230px;
  opacity:1;
  margin-top:3%;
  width:65%;
  border-radius: 5px;

    }
      
  h3{
    
    color:yellow;
   
   }
   
   #submit{
    
    padding:10px;
    margin-left:80px;
    background-color: green;
    color:yellow;
    border-radius: 5px;

   }

   #inputs{
      
      width: 200px;
     padding:6px;
     border-radius: 5px;
      border-color:chocolate;
      margin:3%

   }
  .label{
      color:yellow;

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
       
       <h3>MENU</a></h3><hr>
        <ul>
            
          
            <li><a href="add_rooms.php">Add rooms</a></li>

            <li><a href="updaterooms.php">Update Room details</a></li>

            <li><a href="notifications.php">Send notifications</a></li>
            
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

<form  method="POST"  action="add_rooms.php" class="entry"  enctype="multipart/form-data">


<h3>add rooms</h3><hr>


 <div>
 <label  class="label">Room No:</label>
<input type="text" id="inputs"  placeholder="Room no"   name="room_no"/>
 


 
 <label  class="label">Room Type:</label>
<input type="text"   id="inputs" placeholder="Room type"  name="room_type"/><br>


 
 <label  class="label">Price</label>
<input type="text"   id="inputs" placeholder="price" name="price" />



 <label  class="label">Room Details </label>
<textarea  id="inputs"    name="room_details"></textarea><br>
 

 <label class="label">Image</label>
<input type="file"   id="inputs"  name="image" />
 

<input type="submit" id="submit" value="Add Room"   name="add_room"/>
 
</div>


</form>

</body>
<?php

$conn=new mysqli('localhost','root','','oasis');

// posting data to table rooms
if(isset($_POST['add_room'])){

$room_no=$_POST['room_no'];
$room_type=$_POST['room_type'];
$price=$_POST['price'];
$room_details=$_POST['room_details'];

$image=$_FILES['image']['name'];



// checking whether the room number exists to avoid double entry
$query=$conn->query("SELECT * FROM rooms where room_no='$room_no'");

if(mysqli_num_rows($query))

{
echo "<center><h3 style='color:yellow'>Room No is already added</h3></center>";    
}

//if room no is not available post into the database
else {

$conn->query("INSERT INTO rooms(room_no,room_type,price,room_details,image) VALUES('$room_no','$room_type','$price','$room_details','$image')");


if($conn)

    {
    
       echo " <br><center><font color= 'green' size='5'>Room added successfully</center></font>";
    
    }
    
   else{
    
       echo " <br><center><font color= 'red' size='5'>Error occured</center></font>";
    }


}

}
?>


</body>
</html>