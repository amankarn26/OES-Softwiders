<?php 


$page = "question";

include 'includes/check_user.php'; 
include 'includes/check_reply.php';

include 'support/header.php';
include 'support/navbar.php';
include 'support/leftPanel.php';
?>

            <div class="page-inner">
                <div class="page-title">
                    <h3>Add Questions</h3>



                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div role="tabpanel">
                                   
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Multiple Choice</a></li>
                                                <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Filling Blanks</a></li>
                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                                <form action="pages/add_question2.php?type=mc" method="POST">
											<div class="form-group">
                                            <label for="exampleInputEmail1">Exam Name</label>
										    <select class="form-control" name="exam" required>
											<option value="" selected disabled>-Select exam</option>
										 	<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_examinations ORDER BY exam_name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['exam_id'].'">'.$row['exam_name'].'</option>';
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select></div>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                <input type="text" class="form-control" placeholder="Enter question" name="question" required autocomplete="off">
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
                                                <input type="text" class="form-control" placeholder="Enter option 1" name="opt1" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" value="option1" class="radioButton" required></td>
                            
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 2</label>
                                                <input type="text" class="form-control" placeholder="Enter option 2" name="opt2" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" value="option2" class="radioButton" required></td>
                
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 3</label>
                                                <input type="text" class="form-control" placeholder="Enter option 3" name="opt3" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" value="option3" class="radioButton" required></td>
                                
                                            </tr>
											
											<tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 4</label>
                                                <input type="text" class="form-control" placeholder="Enter option 4" name="opt4" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" value="option4" class="radioButton" required></td>
                                
                                            </tr>
                                        </tbody>
                                    </table>
							
									 <button type="submit" class="btn btn-primary">Submit</button>
												

												
												</form>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                         <form action="pages/add_question2.php?type=fib" method="POST">
										 	<div class="form-group">
                                            <label for="exampleInputEmail1">Exam Name</label>
										    <select class="form-control" name="exam" required>
											<option value="" selected disabled>-Select exam</option>
										 	<?php
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_examinations ORDER BY exam_name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['exam_id'].'">'.$row['exam_name'].'</option>';
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select></div>

												<div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                <input type="text" class="form-control" placeholder="Enter question" name="question" required autocomplete="off">
                                                </div>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Answer</label>
                                                <input type="text" class="form-control" placeholder="Enter answer" name="answer" required autocomplete="off">
                                                </div>
                                       
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