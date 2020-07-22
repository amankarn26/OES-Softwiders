<?php
include '../includes/uniques.php';
include '../database/config.php';
$myid = mysqli_real_escape_string($conn, $_POST['user']);

$sql = "SELECT * FROM tbl_users WHERE user_id = '$myid' OR email = '$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $myuserid = $row['user_id'];
    $myemail = $row['email'];
    $myfname = $row['first_name'];
    $mylname = $row['last_name'];
    $myfullname = "$myfname $mylname";
    $new_password = get_rand_alphanumeric(10);
    $encpass = md5($new_password);
    $sql = "UPDATE tbl_users SET login='$encpass' WHERE user_id='$myuserid'";

        if ($conn->query($sql) === TRUE) {  

        $message = "Hello $myfullname, we received a request for your new password for the <b>Online Examination System</b> account, therefore your password have been changed to <br><b style='font-size:20px;color:red;background-color:lightgrey;'>$new_password</b>";  

        $to = "$myemail";
        $subject = "Online Examination System Password Reset";
        
        $header = "From:aman@softwiders.com \r\n";
        $header .= "Cc:contact@softwiders.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);

        if($retval == true) {
            header("location:../?rp=1804");
        } else {
            echo "Message could not be sent...";
            header("location:../?rp=1100");
        }


    } 
    else {
        header("location:../forgot_pw.php?rp=1100");
    }

	
    }
} 
else {
header("location:../forgot_pw.php?rp=8924");
}
$conn->close();






