<?php

$conn = mysqli_connect('localhost','root','','');
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
    //echo "conn failed";
} 
else
{
	//echo "connected successfully";
}
if(!mysqli_select_db($conn,'thedavincicode')){
	//echo'database not selected';
}
else
{
	//echo "database selected";
}
$team_name=$leader_name=$email=$phone_no='';
// Before using $_POST['value'] 
if (isset($_POST['team_name'])) 
{ 
$team_name = $_POST['team_name'];
} 
if (isset($_POST['leader_name'])) 
{ 
$leader_name = $_POST['leader_name'];
} 
if (isset($_POST['email'])) 
{ 
$email = $_POST['email'];
} 
if (isset($_POST['phone_no'])) 
{ 
$phone_no = $_POST['phone_no'];

} 
    if(isset($_POST) & !empty($_POST)){
	$team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
 	$sql = "SELECT * FROM `resgistration` WHERE team_name='$team_name'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		echo "Team Name Not Available";
	}
	else{
		echo "Team Name Available";
	        }

	}		
	        if (isset($_POST['submit'])){
             $sql = "INSERT INTO resgistration (team_name,leader_name,email,phone_no) VALUES ('$team_name','$leader_name','$email',$phone_no)";
			if (!mysqli_query($conn,$sql)) {
			    echo "Not registered!";
			} else {
			    echo "registered";
			}
			header("refresh:2; url=index2.html");
			$conn->close();
			}      
?>
