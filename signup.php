<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "partytreats";

$conn = new mysqli($servername, $username, $password, $dbname);

 if (!$conn) {
    die("failed". mysqli_connect_error());
 }   else {
    echo"db is ok";
 }

 if (isset($_POST['save'])) {
    $Name= $_POST['Name'];
    $Gender= $_POST['Gender'];
    $Age= $_POST['Age'];
    $Birthdate= $_POST['Birthdate'];
    $Email= $_POST['Email'];
    $Password= $_POST['Password'];
    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
    $sql_query = "INSERT INTO users (Name,Gender,Age,Birthdate,Email,Password)
	 VALUES ('$Name','$Gender','$Age','$Birthdate','$Email','$hashed_password')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "User details inputted successfully !";
      header("Location: partycschedule.html");
            exit();
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);

    } 
?>