<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
// $student_id = 'S'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
$student_id =  mysqli_real_escape_string($conn, str_replace(' ', '', ucwords($_POST['enum'])));;
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$sql = "SELECT * FROM tbl_users WHERE email = '$email' OR phone = '$phone' OR user_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    	$sem = $row['email'];
		$sph = $row['phone'];
		$sen = $row['user_id'];
		if ($sem == $email) {
	 		header("location:../students.php?rp=1189");	
		}
		else if ($sph == $phone) {
			header("location:../students.php?rp=2074");	
		}
		else if ($sen == $student_id) {
			header("location:../students.php?rp=5223");	
		}
		else{
		
		}
	
    }
} 
else {

	$new_password = get_rand_alphanumeric(10);
	$encpass = md5($new_password);

	$sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, dob, address, email, phone, department, category, login)
	VALUES ('$student_id', '$fname', '$lname', '$gender', '$dob', '$address', '$email', '$phone', '$department', '$category', '$encpass')";

	if ($conn->query($sql) === TRUE) {

		$message = "Hello $fname $lname, You are now a member of the <b>Online Examination System</b>. We are sending you a username and password which is useful for you to manage an exam or your account. Please do not share this username and password with anyone. <br /><br /><hr /><br /><b style='font-size:20px;'>Username : </b><b style='font-size:20px;color:red;background-color:lightgrey;'>$student_id</b><br /><b style='font-size:20px;'>Password : </b><b style='font-size:20px;color:red;background-color:lightgrey;'>$new_password</b><br /><hr /><br /><br /><br /><br /><br /> Thanking You.";  

		$to = "$email";
		$subject = "Welcome in Online Examination System";
		
		$header = "From:aman@softwiders.com \r\n";
		$header .= "Cc:contact@softwiders.com \r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html\r\n";
		
		$retval = mail ($to,$subject,$message,$header);

		if($retval == true) {
			header("location:../students.php?rp=6310");
		} else {
			header("location:../students.php?rp=6320");
		}
	} else {
	header("location:../students.php?rp=9157");
	}


}

$conn->close();
?>