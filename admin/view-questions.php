<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);	

$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
    }
} else {
header("location:./");	
}

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
                    <h3>View Examination</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Home</a></li>
                            <li><a href="examinations.php">Examinations</a></li>
                            <li class="active"><?php echo "$exam_name"; ?></li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="tabs-below" role="tabpanel">
                                       
                                            <div class="tab-content">
											<?php 
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            $qno = 1;
                                            while($row = $result->fetch_assoc()) {
												$qs = $row['question'];
												$type = $row['type'];
												$op1 = $row['option1'];
												$op2 = $row['option2'];
												$op3 = $row['option3'];
												$op4 = $row['option4'];
                                            if ($type == "FB") {
											if ($qno == "1") {
											print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="'.$qno.'"  class="form-control" placeholder="Enter your answer">
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
											 
                                             </div>
											';	
											}else{
											print '
											<div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="'.$qno.'"  class="form-control" placeholder="Enter your answer">
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';		
											}

											$qno = $qno + 1;	
											}else{
											
											if ($qno == "1") {

											print '
											<div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op1.'> '.$op1.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op2.'> '.$op2.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op3.'> '.$op3.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op4.'> '.$op4.'</p>
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';	
											}else{
											print '
											<div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op1.'> '.$op1.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op2.'> '.$op2.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op3.'> '.$op3.'</p>
											 <p><input type="radio" class="radioButton" name="'.$qno.'"  class="form-control" value='.$op4.'> '.$op4.'</p>
											 <hr>
											 <a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'"><i class="fa fa-pencil"></i></a>
											 <a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
                                             </div>
											';		
											}

											$qno = $qno + 1;	

											
											}

                                            }
                                            } else {
 
                                            }
											
											?>

                                            </div>
                 
											
                                            <ul class="nav nav-tabs" role="tablist">
											<?php 
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            $qno = 1;
                                            while($row = $result->fetch_assoc()) {
											if ($qno == "1") {
											print '<li role="presentation" class="active"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">Q'.$qno.'</a></li>';	
											}else{
											print '<li role="presentation"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">Q'.$qno.'</a></li>';		
											}

											$qno = $qno + 1;
                                            }
                                            } else {
 
                                            }
											
											?>
                      
                                            </ul>
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