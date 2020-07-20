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
                    <h3>Admin Dashboard</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Home</a></li>
                            <li class="active">Admin Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($departments); ?></p>
                                        <span class="info-box-title">DEPARTMENTS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-folder"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($students); ?></p>
                                        <span class="info-box-title">STUDENTS</span>
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
                                        <p><span class="counter"><?php echo number_format($examination); ?></span></p>
                                        <span class="info-box-title">EXAMINATIONS</span>
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
                                        <p class="counter"><?php echo number_format($subjects); ?></p>
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
                                        <p class="counter"><?php echo number_format($categories); ?></p>
                                        <span class="info-box-title">CATEGORIES <?php echo "$fp $pp"; ?></span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-tag"></i>
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
                                        <p><span class="counter"><?php echo number_format($questions); ?></span></p>
                                        <span class="info-box-title">QUESTIONS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-question"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="info-box-stats">
                                        <p class="counter"><?php echo number_format($banned_students); ?></p>
                                        <span class="info-box-title">BLACKLIST STUDENTS</span>
                                    </div>
                                    <div class="info-box-icon">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="visitors-chart">
                                            <div class="panel-body">
                                            <div id="chartContainer"  style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
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

        <?php include("support/js.php") ?>

		 <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", 
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Piechart presentation of students assessments in FAIL and PASS"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 14,
		indexLabel: "{label} - {y}",
		dataPoints: [
			{ y: <?php echo "$std_pass"; ?>, label: "Student Passing Exams" },
			{ y: <?php echo "$std_fails"; ?>, label: "Student Failing Exams" }

		]
	}]
});
chart.render();

}
</script>
        
        <?php include("support/footer.php")?>