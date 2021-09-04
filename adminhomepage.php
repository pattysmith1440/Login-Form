<?php
  Session_start();

  if(!isset($_SESSION["police_id"]))
 {
    header("location:index.php");
 }

?>

<!doctype>
<?php
$server= "localhost";
$username= "root";
$password= "";
$dbname= "project db";
$Id = "";
$first_name = "";
$middle_name = "";
$surname = "";
$phone_number = "";
$date_of_birth = "";
$gender = "";
$country = "";
$city = "";
$email = "";
$criminal_id = "";
$type_of_crime = "";
$crime_committed = "";
$station = "";
$image = "";

   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

   //connect to mysqli database
   try{
     $data=Mysqli_connect($server,$username,$password,$dbname);

 }catch (Mysqli_Sql_Exxception $ex){
       echo("error in connecting");
   }

  //get data from the Form
  function getdata()
  {
    $data = array();
    $data[1] = $_POST['Id'];
    $data[2] = $_POST['first_name'];
    $data[3] = $_POST['middle_name'];
    $data[4] = $_POST['surname'];
    $data[5] = $_POST['phone_number'];
    $data[6] = $_POST['date_of_birth'];
    $data[7] = $_POST['gender'];
    $data[8] = $_POST['country'];
    $data[9] = $_POST['city'];
    $data[10] = $_POST['email'];
    $data[11] = $_POST['criminal_id'];
    $data[12] = $_POST['type_of_crime'];
    $data[13] = $_POST['crime_committed'];
    $data[15] = $_POST['station'];
    $data[15] = $_POST['image'];
    return $data;
  }

   //Search for data
  if(isset($_POST['Search']))
  {
     $info = getdata();
     $search_query="SELECT * FROM `criminal` WHERE Id='$info[1]'";
     $search_result=mysqli_query($conn, $search_query);
      if($search_result)
      {
         if(mysqli_num_rows($search_result))
         {
            while($rows = mysqli_fetch_array($seach_result))
            {
               $Id = $rows['Id'];
               $first_name = $rows['Id'];
               $middle_name = $rows['middle_name'];
               $surname = $rows['surname'];
               $phone_number = $rows['phone_number'];
               $date_of_birth = $rows['date_of_birth'];
               $gender = $rows['gender'];
               $country = $rows['country'];
               $city = $rows['City'];
               $email = $rows['email'];
               $criminal_id= $rows['criminal_id'];
               $type_of_crime = $rows['type_of_crime'];
               $crime_committed = $rows['crime_committed'];
               $station = $rows['station'];
               $image = $rows['image'];

            }
         }else{
              echo("RECORD NOT FOUND");
             }

      } else {
              echo("RESULT ERROR");
      }

  }

         //insert database
  if(isset($_POST['insert'])){
  $info = getdata();
  $insert_query = "INSERT INTO `criminal`(`id`, `first_name`, `middle_name`, `surname`, `phone_number`, `date_of_birth`, `gender`, `country`,
  `city`, `email`, `criminal_id`, `type_of_crime`, `crime_committed`, `station`, `image`) VALUES ([$info[1]],[$info[2]],[$info[3]],[$info[4]],
  [$info[5]],[$info[6]],[$info[7]],[$info[8]],[$info[9]],[$info[10]],[$info[11]],[$info[12]],[$info[13]],[$info[14]],[$info[15]])"

  try{
    $insert_result=mysqli_query($conn, $insert_query);
    if($insert_result)
    {
        if(mysql_affected_rows($conn) > 0){
            echo("DATA INSERTED SUCCESSFULLY");

      }else{
            echo("DATA INSERTION FAILED");
      }
    }
  }

}



 ?>
<html>
<head>
  <meta charset="utf-8">
  <center>
<h1>RECORDS</h1>
</head>
<body>
  <form method="POST" action="userhomepage.php">
    <input type="number" name="Id" placeholder="Enter Id Number" value="<?php echo($Id); ?>"><br><br>
    <input type="text"  name="fist_name" placeholder="First Name" value="<?php echo($first_name); ?>"><br><br>
    <input type="text"  name="middle_name" placeholder="Middle Name" value="<?php echo($middle_name); ?>"><br><br>
    <input type="text"  name"surname" placeholder="Surname" value="<?php echo($Id); ?>"><br><br>
    <input type="text"  name"phone_number" placeholder="Phone Number" value="<?php echo($phone_number); ?>"><br><br>
    <input type="text"  name"date_of_birth" placeholder="Date Of Birth" value="<?php echo($date_of_birth); ?>"><br><br>
    <input type="text"  name"gender" placeholder="Gender" value="<?php echo($gender); ?>"><br><br>
    <input type="text"  name"country" placeholder="Country" value="<?php echo($country); ?>"><br><br>
    <input type="text"  name"city" placeholder="City" value="<?php echo($city); ?>"><br><br>
    <input type="text"  name"email" placeholder="Example@gmail.com" value="<?php echo($email); ?>"><br><br>
    <input type="text"  name"criminal_id" placeholder="Criminal Id" value="<?php echo($criminal_id); ?>"><br><br>
    <input type="text"  name"typeofcrime" placeholder="Type Of Crime" value="<?php echo($type_of_crime); ?>"><br><br>
    <input type="text"  name"crime_committed" placeholder="Crime Committed" value="<?php echo($crime_committed); ?>"><br><br>
    <input type="text"  name"station" placeholder="Station" value="<?php echo($station); ?>"><br><br><br>
    <img src="'{$data['image']}' width='40%'  height='40%' "; value="<?php echo($image); ?>" ><br><br><br>

      <div>
        <input type="submit"  name"insert" value="Add">
        <input type="submit"  name"Search" value="Find">
        <input type="submit"  name"Update" value="Update">
        <input type="submit"  name"Delete" value="Delete">
        <a href="logout.php">LOGOUT</a>
      </div>
</form>
</center>

</body>
</html>
