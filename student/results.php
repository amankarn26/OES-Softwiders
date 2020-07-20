<?php 
$page = "result";

include 'includes/check_user.php'; 
include 'includes/check_reply.php';

include 'support/header.php';
include 'support/navbar.php';
include 'support/leftPanel.php';
?>

            <div class="page-inner">
                <div class="page-title">
                    <h3>My Results</h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                           <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Exam</th>
												<th>Student ID</th>
												<th>Student Name</th>
												<th>Score</th>
												<th>Date</th>
                                                <th>Status</th>
												<th>Next Retake</th>
                            
                                   
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Exam</th>
												<th>Student ID</th>
												<th>Student Name</th>
												<th>Score</th>
												<th>Date</th>
                                                <th>Status</th>
												<th>Next Retake</th>
                
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {

                                          print '
										       <tr>
                                                <td>'.$row['exam_name'].'</td>
												 <td>'.$row['student_id'].'</td>
												  <td>'.$row['student_name'].'</td>
												<td>'.$row['score'].'%</td>
                                                <td>'.$row['date'].'</td>
												<td>'.$row['status'].'</td>
                                                <td>'.$row['next_retake'].'</td>
										
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>


                 

                                    </div>
                                    </div>
                                </div>  
  
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
                
            </div>
        </main>
		<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
}
?>

        
<?php include 'support/js.php' ?>
		

		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    
<?php include 'support/footer.php' ?>