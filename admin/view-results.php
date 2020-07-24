<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';

if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = $_GET['eid'];
$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
    }
} else {

}
$conn->close();
	
}else{
	
header("location:./");	
}

$page = "result";

include 'support/header.php';
include 'support/navbar.php';
include 'support/leftPanel.php';
?>

            <div class="page-inner">
                <div class="page-title">
                    <h3><?php echo "$exam_name" ?> Results</h3>



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
										   $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
												<th>Student ID</th>
												<th>Exam Name</th>
                                                <th>Score</th>
                                                <th>Status</th>
												<th>Date</th>
												<th>RE Exam</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Student Name</th>
												<th>Student ID</th>
												<th>Exam Name</th>
                                                <th>Score</th>
                                                <th>Status</th>
												<th>Date</th>
												<th>RE Exam</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
                                          print '
										       <tr>
                                                <td>'.$row['student_name'].'</td>
												<td>'.$row['student_id'].'</td>
                                                <td>'.$row['exam_name'].'</td>
                                                <td><b>'.$row['score'].'%</b></td>
												<td>'.$row['status'].'</td>
												<td>'.$row['date'].'</td>
												<td>'.$row['next_retake'].'</td>
												<td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                  
													<li><a'; ?> onclick = "return confirm('Reactivate exam for <?php echo $row['student_name']; ?> ?')" <?php print ' href="pages/re-activate.php?rid='.$row['record_id'].'&eid='.$exam_id.'">Re-activate</a></li>
									
													
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        There is No result found.
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

        
<?php include("support/js.php") ?>
		

		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    
<?php include("support/footer.php")?>