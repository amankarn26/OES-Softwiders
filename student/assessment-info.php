<?php include 'includes/check_user.php';
if (isset($_SESSION['record_id'])) {
$record_id = $_SESSION['record_id'];
include '../database/config.php';

$sql = "SELECT * FROM tbl_assessment_records WHERE record_id = '$record_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
	$score = $row['score'];
	$status = $row['status'];
	$next_retake = $row['next_retake'];
	$taking_date = $row['date'];
    }
} else {
    header("location:./");
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
                    <h3>Assessment Results</h3>
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
                                    <h4 class="panel-title">Results Information</h4>
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
                                                   <td>Student_name</td>
                                                   <td><?php echo "$myfname $mylname"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Score</td>
                                                   <!-- <td><?php //echo "$score"; ?>%</td> -->
                                                   <td>Get your score from the Your Institute</td>
                                               </tr>

											   
											  <tr>
                                                   <th scope="row">4</th>
                                                   <td>Next Re-take</td>
                                                   <td><?php echo "$next_retake";?></td>
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
                                    <h3 class="panel-title">Status</h3>
                                </div>
                                <div class="panel-body">
                                <?php
								if ($status == "PASS") {
								print '
                                <div class="alert alert-success" role="alert">
                                        Well done! You have pass this examination.
                                    </div>';								
								}else{
																print '
                                <div class="alert alert-danger" role="alert">
                                       You have fail to pass this examination.
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