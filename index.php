<?php

$host= "localhost";
$user= "root";
$password= "";
$db= "login db";


Session_start();

$data=Mysqli_connect($host,$user,$password,$db);
if ($data===false)
{
  die("connection_error");
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{

  $police_id=$_POST["police_id"];
  $password=$_POST["password"];

  $sql="select * from users where police_id='".$police_id."' AND password='".$password."' ";

  $result=mysqli_query($data,$sql);

  $row=mysqli_fetch_array($result);

  if($row["usertype"]=="admin")
  {
    $_SESSION["police_id"]=$police_id;
    header("location:adminhomepage.php");
  }

  elseif ($row["usertype"=="user"])
  {
    $_SESSION["police_id"]=$police_id;
    header("location:userhomepage.php");
  }
  else
  {
    echo "police_id or password incorrect";
  }
}


?>

<!doctype html>
<html>
<head>
  <title> Login form </title>

</head>
<body>
  <center>

     <div style ="background-color: gray; min-height: 70vh; width: 500px"  >
      <br><br>
      <h1> LOGIN PAGE </h1>
      <br>

    <form  action="#"  method="POST">
        <div>
           <label> POLICE_ID </label>
           <br>
           <input type="text"  name="police_id" placeholder="Enter Police_Id" required>
        </div>
        <br><br>

    <div>
          <label> PASSWORD </label>
           <br>
          <input type="password"  name="password" placeholder="Enter Password" required>
        </div>
        <br><br>

        <div>
          <button type="submit">LOGIN</button>
        </div>
        <br><br>
      </div>
    </center>

  </body>
  </html>
