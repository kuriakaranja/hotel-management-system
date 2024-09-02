<?php 

$conn=new mysqli('localhost','root','','oasis');
//method to get the id of the selected booking 
$guest_id=$_GET['guest_id'];

$conn->query("DELETE from guests where guest_id='$guest_id'");

// returns you to the history page
header('location:guests.php');

?> 