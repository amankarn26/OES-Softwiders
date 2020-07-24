
<div class="cd-overlay"></div>

<script>
    document.onkeypress = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
            return false;  
        }  
    }  
    document.onmousedown = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
            return false;  
        }  
    }  
    document.onkeydown = function (event) {  
        event = (event || window.event);  
        if (event.keyCode == 123) {  
            return false;  
        }  
    }  
</script>
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



<?php if($page == "index" || $page == "profile") echo '

<script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="../assets/plugins/curvedlines/curvedLines.js"></script>
<script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
<script src="../assets/js/modern.js"></script>
<script src="../assets/js/canvasjs.min.js"></script>

' ?>

    
<?php if($page == "categories" || $page == "departments" || $page == "exam" || $page == "notice" || $page == "student" || $page == "question" || $page == "result" || $page == "subject") echo '




<script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
<script src="../assets/plugins/moment/moment.js"></script>
<script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../assets/js/modern.min.js"></script>
<script src="../assets/js/pages/table-data.js"></script>



' ?>

<?php if($page == "exam" || $page == "student" || $page == "result") echo '




<script src="../assets/plugins/select2/js/select2.min.js"></script>
<script src="../assets/plugins/summernote-master/summernote.min.js"></script>
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="../assets/js/pages/form-elements.js"></script>



' ?>

<?php if($page == "subject") echo '




<script src="../assets/plugins/select2/js/select2.min.js"></script>



' ?>