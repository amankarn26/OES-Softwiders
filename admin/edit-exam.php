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
     $excate = $row['category'];
	 $exsubject = $row['subject'];
	 $exname = $row['exam_name'];
	 $exdate = $row['date'];
	 $exduration = $row['duration'];
	 $expassmark = $row['passmark'];
	 $exreex = $row['re_exam'];
	 $exterms = $row['terms'];
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
                    <h3>Edit Exam - <?php echo "$exname"; ?></h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                         <form action="pages/update_exam.php" method="POST">
										<div class="form-group">
                                            <label for="exampleInputEmail1">Exam Name</label>
                                            <input type="text" class="form-control" value="<?php echo"$exname"; ?>" placeholder="Enter exam name" name="exam" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Exam Duration (Minutes)</label>
                                            <input type="number" class="form-control" value="<?php echo"$exduration"; ?>" placeholder="Enter exam duration" name="duration" required autocomplete="off">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Passmark (%)</label>
                                            <input type="number" class="form-control" value="<?php echo"$expassmark"; ?>" placeholder="Enter passmark" name="passmark" required autocomplete="off">
                                        </div>
										<div class="form-group hide">
                                            <label for="exampleInputEmail1">RE exam (if you take exam then show it again after some days)</label>
                                            <input type="number" class="form-control" value="200" placeholder="Enter days to attempt" name="attempts" required autocomplete="off">
                                        </div>
									<div class="form-group">
                                    <label >Deadline</label>
                                    <input type="text" class="form-control date-picker" value="<?php echo"$exdate"; ?>" name="date" required autocomplete="off" placeholder="Select deadline">
                                    </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Subject</label>
                                            <select class="form-control" name="subject" required>
											<option value="" selected disabled>-Select subject</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_subjects WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
											if ($exsubject == $row['name']) {
											print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';	
											}else{
											print '<option value="'.$row['name'].'">'.$row['name'].'</option>';	
											}
                                            
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Select Course</label>
                                            <select class="form-control" name="category" required>
											<option value="" selected disabled>-Select Course-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                          	if ($excate == $row['name']) {
											print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';	
											}else{
											print '<option value="'.$row['name'].'">'.$row['name'].'</option>';	
											}
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
									
									
									<div class="form-group">
                                            <label for="exampleInputEmail1">Terms and conditions</label>
                                            <textarea style="resize: none;" rows="6" class="form-control" placeholder="Enter Terms and conditions" name="instructions" required autocomplete="off"><?php echo"$exterms"; ?></textarea>
                                     </div>
									 <input type="hidden" name="examid" value="<?php echo "$exam_id"; ?>">


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
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