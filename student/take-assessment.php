<?php include 'includes/check_user.php';

if (isset($_GET['id'])) {
include '../database/config.php';	
$exam_id = mysqli_real_escape_string($conn, $_GET['id']);
$record_found = 0;
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
	$subject = $row['subject'];
	$exam_name = $row['exam_name'];
	$deadline = $row['date'];
	$duration = $row['duration'];
	$passmark = $row['passmark'];
	$reexam = $row['re_exam'];
	$terms = $row['terms'];
	$status = $row['status'];
	$today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
	$dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');
	

	if ($status == "Inactive") {
	header("location:./");	
	}
    }
} else {
header("location:./");	
}
$quest = 0;
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $quest++;
    }
} else {

}


$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $record_found = 1;
	$score = $row['score'];
	$status = $row['status'];
	$take_date = $row['date'];
	$retake_date = $row['next_retake'];
	$today_date = date('Y/m/d');
	$retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d');
    $tc = strtotime($today_date);
	$rc = strtotime($retakeconv);
	$dc = strtotime($dcv);
    $td = ($tc - $rc)/86400;
	$dcc = ($tc - $dc)/86400;
	
    }
} else {
    
}


$conn->close();
}else{

header("location:./");	
}

$page = "exam";

include 'support/header.php';
include 'support/navbar.php';
include 'support/leftPanel.php';

 ?>

            <div class="page-inner">
                <div class="page-title">
                    <h3>Take Assessment</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="examinations.php">Assessments</a></li>
                            <li class="active"><?php echo "$exam_name"; ?></li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                          
                                <div class="row">
                           <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Examination Properties</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats">  
                                       <table class="table">
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <th scope="row">1</th>
                                                   <td>Exam Name</td>
                                                   <td><?php echo "$exam_name"; ?></td>
                                               </tr>
											     <tr>
                                                   <th scope="row">2</th>
                                                   <td>Subject</td>
                                                   <td><?php echo "$subject"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Deadline</td>
                                                   <td><?php echo "$deadline"; ?></td>
                                               </tr>
											   
											    <tr>
                                                   <th scope="row">4</th>
                                                   <td>Duration</td>
                                                   <td><?php echo "$duration"; ?> <b>min.</b></td>
                                               </tr>
											   
											  <tr>
                                                   <th scope="row">5</th>
                                                   <td>Next Re-take</td>
                                                   <td><?php 
												   if ($record_found == "1") {
													 echo "$retake_date";  
												   }else{
													 echo "$next_retake";  
												   }
												   
												   ?></td>
                                               </tr>
											   
											   <tr>
                                                   <th scope="row">6</th>
                                                   <td>Passmark</td>
                                                   <td><?php echo "$passmark"; ?>%</td>
                                               </tr>
											   
											   	<tr>
                                                   <th scope="row">6</th>
                                                   <td>Questions</td>
                                                   <td><b><?php echo "$quest"; ?></b></td>
                                               </tr>
                                              
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
   
                                </div>
                           
                        </div>
						
                           <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Terms and conditions</h3>
                                </div>
                                <div class="panel-body">
                                    <?php echo "$terms"; ?>
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Take Assessment</h3>
                                </div>
                                <div class="panel-body">
								<?php
								if ($record_found == "1") {
									
								if ($td >= 0){
									
								if ($dcc > 1){
								print '
								<div class="alert alert-warning" role="alert">
                                The exam is already expired.
                                </div>';
								}else{
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 1;
								print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Retake Assessment</a>
									
									<?php	
								}
                                
								}else{
                                print '
								<div class="alert alert-warning" role="alert">
                                You will be able to retake this exam on '.$retake_date.'
                                </div>';
								}								
									
								}else{
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 0;
								print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Begin Assessment</a>
									
									<?php
                  									
									
								}
								
								?>

									
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Assessment History</h3>
                                </div>
                                <div class="panel-body">
                                <?php
								if ($record_found == "1") {
								print '
                                 <div class="alert alert-info" role="alert">
                                  You attend this exam on <strong>'.$take_date.'</strong> , your score was <strong>'.$score.'%</strong>
                                    </div>';		
								
								}else{
								print '
                                 <div class="alert alert-info" role="alert">
                                  No records found.
                                    </div>';								
									
								}
								
								?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </main>

        
<?php include 'support/js.php' ?>
<?php include 'support/footer.php' ?>