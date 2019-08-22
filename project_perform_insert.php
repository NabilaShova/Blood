<?php 

$conn = mysqli_connect("localhost", "root", "", "srbd2");
if(!$conn){
  die("Connection Failed: ".mysqli_connect_error());
}

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: http://107.109.211.129/project_database_2019/srbd_login/wp-login.php");
    exit;
}

else if(isset($_SESSION['username']) && ($_SESSION['username'] == 'admin'))
{
    header("location: http://107.109.211.129/project_database_2019/home.php");
}

?>

<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Employee Database</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.animate {
    -webkit-animation: animatezoom 0.5s;
    animation: animatezoom 0.5s;  
    font-size: 16px;
}

.modal-content {
    background-color: #fefefe;   
    margin: 8% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */   
    width: 90%; /* Could be more or less, depending on screen size */
}

button {
    background-color: #CF000F;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
}

button:hover {
    opacity: 0.8;
}

div{
    font-size: 16px;
}

table{
border-style:solid;
border-width:2px;
border-spacing: 2px;
display: table;
text-align: center;
}
 table {
  width:100%;
  text-align: center;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
.navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 20px;
      letter-spacing: 2px;
  }
  .navbar-nav  li a:hover {
      color: blue !important;
  }

</style>
</head>

<body>

<?php
if(isset($_POST['submit'])){
    $knox=$_SESSION['username'];
for($i = 0; $i < count($_POST['type']); $i++)
{    
    $type = mysqli_real_escape_string($conn, $_POST['type'][$i]);
    $platform = mysqli_real_escape_string($conn, $_POST['platform'][$i]);
    $year = mysqli_real_escape_string($conn, $_POST['year'][$i]);
    $month = mysqli_real_escape_string($conn, $_POST['month'][$i]);
    
    $check2=mysqli_query($conn,"select * from users WHERE Knox_ID='$knox'");
    $checkrows2=mysqli_num_rows($check2);
    $check3=mysqli_query($conn,"select * from employee_performance WHERE Knox='$knox'");

   if($year == 0 || $month == 0) {
        
        header('location:user_perform.php?id0=$a');
   }

   else if($checkrows2>0){
    // while($row=mysqli_fetch_array($check3)){
    //   if($knox==$row['Knox'] && $type==$row['Type'] && $platform==$row['Platform'] && $year==$row['Year'])
    //   {
    //     header('location:user_perform.php?id=$x');
    //   }
    // }
        $sql = "INSERT INTO employee_performance(Knox, Type, Platform, Year, months)
            VALUES('$knox', '$type', '$platform', '$year', '$month')";
        if(mysqli_query($conn, $sql)) {

            header('location:user_perform.php?id1=$p');
        }
  }
    else {
            
            header('location:user_perform.php?id2=$q');
        }
}
}

?>
    
    </div> 
    