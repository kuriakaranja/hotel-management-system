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
      
  h3,form{
    
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
            
    <?php 
                    
                    // here codes are fetching name of the staff and dispaly it on the navbar
                     
                    session_start();

                    $conn=new mysqli('localhost','root','','oasis');
          
                              $query = $conn->query("SELECT * from staff where staff_id ='$_SESSION[staff_id]'")or die (mysqli_errno ());
                              $row = $query->fetch_array();
          
                          ?>
                  
                    <p>WELCOME: <?php echo $row['name'];?></p>
                   
          
                  </div> 
    
                    
            </div> 
       
      

        </form>

    
        
    </div>
  </div>
</div>
 <div>
        
       <form class="entry" method="POST"   action="mail.php">
            <h3>Send notifications</h3><hr>

            <label class="form">Guest Email:</label>
              <input type="text"  id="inputs"   name="email">
              
              <label class="form">Subject</label>
              <input type="text" id="inputs"  name="subject"><br>
              
              
              <label  class="label">Message.</label><br>
              <textarea  id="inputs"    name="message"></textarea><br>


              <input type="submit" id="submit" value="send"   name="send"/>

</body>





</html>