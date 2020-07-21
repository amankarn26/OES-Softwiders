<?php
include '../includes/check_user.php';
include '../../database/config.php';

$old_password = md5($_POST['oldPass']);
$new_password = md5($_POST['pass1']);

$sqlSelect = "SELECT * FROM tbl_users WHERE user_id='$myid'";
$resultSelect = $conn->query($sqlSelect);

if ($resultSelect->num_rows > 0) {

    while($row = $resultSelect->fetch_assoc()) {
    	$ops = $row['login'];
		
		if ($ops == $old_password) {
         $sql = "UPDATE tbl_users SET login='$new_password' WHERE user_id='$myid'";

         if ($conn->query($sql) === TRUE) {
            header("location:../profile.php?rp=7823");
         } else {
            header("location:../profile.php?rp=1298");
         }
		}
		else{
         header("location:../profile.php?rp=2303");	
		}
	
    }
}



$conn->close();
?>
