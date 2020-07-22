<?php
//include database configuration file
include '../../database/config.php';

//get records from database
$query = $conn->query("SELECT user_id,first_name, last_name, gender, dob, address, email, phone, department,category, acc_stat FROM `tbl_users` WHERE role = 'student'");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "members_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Enrollment ID', 'First Name', 'Last Name', 'Gender', 'DOB', 'Address', 'Email', 'Phone', 'Academics', 'Courses', 'Status');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($row['user_id'], $row['first_name'], $row['last_name'], $row['gender'], $row['dob'], $row['address'], $row['email'], $row['phone'], $row['department'], $row['category'], $row['acc_stat']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>