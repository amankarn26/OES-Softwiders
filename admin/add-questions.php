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

$page = "";


include 'support/header.php';
include 'support/navbar.php';
include 'support/leftPanel.php';
?>

            <div class="page-inner">
                <div class="page-title">
                    <h3>Add Questions - <?php echo "$exam_name"; ?></h3>



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
                                                <form action="pages/add_question.php?type=mc" method="POST">
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
                                                <td><input type="radio" name="answer" class="radioButton" value="option1" required></td>
                            
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 2</label>
                                                <input type="text" class="form-control" placeholder="Enter option 2" name="opt2" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" class="radioButton" value="option2" required></td>
                
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 3</label>
                                                <input type="text" class="form-control" placeholder="Enter option 3" name="opt3" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" class="radioButton" value="option3" required></td>
                                
                                            </tr>
											
											<tr>
                                                <th scope="row">3</th>
                                                <td>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Option 4</label>
                                                <input type="text" class="form-control" placeholder="Enter option 4" name="opt4" required autocomplete="off">
                                                </div>
												</td>
                                                <td><input type="radio" name="answer" class="radioButton" value="option4" required></td>
                                
                                            </tr>
                                        </tbody>
                                    </table>
									<input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">
									 <button type="submit" class="btn btn-primary">Submit</button>
												

												
												</form>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                         <form action="pages/add_question.php?type=fib" method="POST">
												<div class="form-group">
                                                <label for="exampleInputEmail1">Question</label>
                                                <input type="text" class="form-control" placeholder="Enter question" name="question" required autocomplete="off">
                                                </div>
												<div class="form-group">
                                                <label for="exampleInputEmail1">Answer</label>
                                                <input type="text" class="form-control" placeholder="Enter answer" name="answer" required autocomplete="off">
                                                </div>
                                         <input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">
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

        <div class="cd-overlay"></div>

        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        
		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    </body>

</html>