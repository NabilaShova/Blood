<?php 


session_start();




   if(empty($_SESSION['uname']) && empty ($_SESSION['psw'])){

    echo"<script>
    
    window.location= 'index.php';
    alert('you need to log in first');
    </script>
    ";
    
   }



$conn = mysqli_connect("localhost", "root", "", "logintest");
if(!$conn){
	die("Connection Failed: ".mysqli_connect_error());
}

$subject = $_POST['subject'];
$post = $_POST['post'];

 /*$usercheck = $uname;
 $qry = "SELECT uname FROM user WHERE uname = '$usercheck'";
 $check = mysqli_query($conn, $qry) 

or die(mysqli_error());

 $check2 = mysqli_num_rows($check);*/


if ($subject=="" or $post=="")
{
echo "All fields must be entered, hit back button and re-enter information";
}
/*elseif ($check2 != 0) {

 	//echo '<script type="text/javascript">alert("Sorry, the username '.$_POST['uname'].' is already in use.")</script>';
    
    echo '<script type="text/javascript">'; 
    echo 'alert("Sorry, the username '.$_POST['uname'].' is already in use!");'; 
    echo 'document.location.href = "index.php";';
    echo '</script>';
    //header( 'Location: index.php' ) ;

 				}
elseif($_POST['psw'] != $_POST['cpsw']) {

 	//echo '<script type="text/javascript">alert("Your passwords did not match. ");</script>';
    
    echo '<script type="text/javascript">'; 
    echo 'alert("Sorry, your passwords did not match! ");'; 
    echo 'document.location.href = "index.php";';
    echo '</script>';
    //die('Your passwords did not match. ');

 	}*/

else{
$sql="INSERT INTO announcement (annsubject, annpost)
VALUES
('$subject','$post')";

 mysqli_query($conn, $sql);

 header( 'Location: admin.php' ) ;
}
 mysqli_close($conn);
?>
