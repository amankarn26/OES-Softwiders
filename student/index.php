<?php 

$page = "index";

include 'includes/check_user.php'; 
include 'includes/fetch_records.php';

include 'support/header.php';
include 'support/navbar.php';
include 'support/leftPanel.php';

?>

            <div class="page-inner">
                <div class="page-title">
                    <h3>Student Dashboard</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Home</a></li>
                            <li class="active">Student Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($students_in_my_class); ?></p>
                                        <span class="info-box-title">STUDENTS IN MY CLASS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-user"></i>
                                    </div>
     
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p><span class="counter"><?php echo number_format($active_examinations); ?></span></p>
                                        <span class="info-box-title">ACTIVE EXAMINATIONS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-book-open"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($my_subjects); ?></p>
                                        <span class="info-box-title">SUBJECTS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-docs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($passed_exam); ?></p>
                                        <span class="info-box-title">PASSED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-like"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($notice); ?></p>
                                        <span class="info-box-title">NOTICE</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-list"></i>
                                    </div>
     
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p><span class="counter"><?php echo number_format($failed_exam); ?></span></p>
                                        <span class="info-box-title">FAILED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-dislike"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($locked_exams); ?></p>
                                        <span class="info-box-title">LOCKED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($attended_exams); ?></p>
                                        <span class="info-box-title">ATTENDED EXAMS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Notice</h4>
                                </div>
                                <div class="panel-body">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <?php
							include '../database/config.php';
							$sql = "SELECT * FROM tbl_notice ORDER by id DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                           $tabno = 1;
                            while($row = $result->fetch_assoc()) {
                            print '
							<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading'.$tabno.'">
                            <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$tabno.'" aria-expanded="false" aria-controls="collapse'.$tabno.'">
                            '.$row['title'].'
                            </a>
                            </h4>
                            </div>
                            <div id="collapse'.$tabno.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$tabno.'">
                            <div class="panel-body">
                            '.$row['description'].'
							<hr><i class="fa fa-calendar"></i> '.$row['post_date'].' | <i class="fa fa-refresh"></i> '.$row['last_update'].'
                            </div>
                            </div>
                            </div>';
					       $tabno++;
                             }
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
        </main>

        


<?php include 'support/js.php' ?>
<?php include 'support/footer.php' ?>