<?php
  session_start();




   if(empty($_SESSION['uname']) && empty ($_SESSION['psw'])){

    echo"<script>
    
    window.location= 'index.php';
    alert('you need to log in first');
    </script>
    ";
    
   }



?>






<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
<link href="style.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<?php

$conn = mysqli_connect("localhost", "root", "", "logintest");
if(!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}

$sql="SELECT * FROM feedback   ";
 $result=mysqli_query($conn, $sql);
 
?>

	<?php 
	  while($row=mysqli_fetch_array($result))
	  {
	 
  echo '<div class="nw">';
 
	echo '<table><tr ><td width="350"> Name</td>';
	  echo '<td> '.$row['name'].'</td>' ;
	echo '</tr>';
	echo '<tr><td>Contact Number</td>';
	  echo '  <td>'.$row['contact'].'</td>' ;
	  echo '</tr>';
	  /*echo '<tr><td>Gender</td>';
	   echo ' <td> '.$row['gender'] .'</td>';
	  echo '</tr><tr><td>Blood Group</td>';
	  echo ' <td> '.$row['bloodgroup'].'</td>' ;
	  echo '</tr><tr><td>Last Donated Date</td>';
	  echo '  <td>'.$row['ldd'].'</td>' ;
	  echo '</tr><tr><td>Location</td>';
	  echo ' <td> '.$row['address'] .'</td>';
	  echo '</tr>';*/
	  echo '<tr><td>Feedback</td>';
	  echo '  <td>'.$row['feedback'].'</td>' ;
	  echo '</tr>';
	  echo '</table>';
    echo '</div>';
	echo '</br>';
	}
	
	mysqli_close($conn);
	
	  ?>
   
    
  