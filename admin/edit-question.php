<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';

include '../database/config.php';
if (isset($_GET['id'])) {
$question_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM tbl_questions WHERE question_id = '$question_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $type = $row['type'];
	$question = $row['question'];
	if ($type == "FB") {
	$ans = $row['answer'];
	$act = "tab2";
	}else{
	$opt1 = $row['option1'];
	$opt2 = $row['option2'];
	$opt3 = $row['option3'];
	$opt4 = $row['option4'];
	$ans = $row['answer'];
	}
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
                    <h3>Edit Questions : <?php echo "$question_id"; ?></h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                 <?php
								 if ($type == "MC") {
									 print '
									  <form action="pages/update_question.php?type=mc" method="POST">
												<div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                <input type="text" class="form-control" value="'.$question.'" placeholder="Enter question" name="question" required autocomplete="off">
                                                </div>
												
                                      <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="100">Option No.</th>
                                                <th>Option</th>
                                                <th  width="100" >Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" >1</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 1</label>
                                                <input type="text" value="'.$opt1.'" class="form-control" placeholder="Enter option 1" name="opt1" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio"'; if ($ans == "option1") { print ' checked '; } print ' name="answer" value="option1" required></td>
                            
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 2</label>
                                                <input type="text" class="form-control" value="'.$opt2.'" placeholder="Enter option 2" name="opt2" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio"'; if ($ans == "option2") { print ' checked="true" '; } print ' name="answer" value="option2" required></td>
                
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 3</label>
                                                <input type="text" class="form-control" value="'.$opt3.'" placeholder="Enter option 3" name="opt3" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio"'; if ($ans == "option3") { print ' checked="true" '; } print ' name="answer" value="option3" required></td>
                                
                                            </tr>
											
											<tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 4</label>
                                                <input type="text" class="form-control" value="'.$opt4.'" placeholder="Enter option 4" name="opt4" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio"'; if ($ans == "option4") { print ' checked="true" '; } print ' name="answer" value="option4" required></td>
                                
                                            </tr>
                                        </tbody>
                                    </table>
									<input type="hidden" name="type" value="MC">
									<input type="hidden" name="question_id" value="'.$question_id.'">
									
									 <button type="submit" class="btn btn-primary">Submit</button>
												

												
												</form>';
									 
								 }else{
									print '
                                         <form action="pages/update_question.php?type=fib" method="POST">
												<div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                <input type="text" class="form-control"  value="'.$question.'" placeholder="Enter question" name="question" required autocomplete="off">
                                                </div>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Answer</label>
                                                <input type="text" class="form-control"  value="'.$ans.'" placeholder="Enter answer" name="answer" required autocomplete="off">
                                                </div>
                                         <input type="hidden" name="question_id"  value="'.$question_id.'">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>';									
									 
								 }
								 
								 ?>
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
