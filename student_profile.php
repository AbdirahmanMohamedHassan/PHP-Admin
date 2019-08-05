<?php require 'db.php'; 
ob_start();
session_start();


$result = $mysqli->query("SELECT * FROM tb_user WHERE id='$_GET[id]' AND email='$_GET[email]'");
		   
			if ( $result->num_rows == 0  ){ // User doesn't exist

	 $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Sorry wrong URL.
                    </div>";
	header("location: students.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    
    <title>SIOS | Admin Panel</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- Theme Styles -->
    <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
		<?php include("topmenu.php")?>
        <!-- end header -->
        
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			<?php include("sidemenu.php") ?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Student Profile</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Student</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Student Profile</li>
                            </ol>
                        </div>
                    </div>
													  							 	 <?php
						

$sql = "SELECT * FROM tb_user WHERE id='$_GET[id]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		

?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="profile-userpic">
                                                <img src="../<?php echo$row["image"] ?>" style="max-height:150px;min-height:150px"class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"><?php echo$row["name"] ?> <?php echo$row["sname"] ?> </div>
                                        </div>
                                        
                                        <!-- END SIDEBAR USER TITLE -->
                                        
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>About Student</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                          <ul class="list-group list-group-unbordered">
		
                                            <li class="list-group-item">
                                                <b>Gender </b>
                                                <div class="profile-desc-item pull-right"><?php echo$row["gender"] ?></div>
                                            </li>
                                             <li class="list-group-item">
                                                <b>Email </b>
                                                <div class="profile-desc-item pull-right"><?php echo$row["email"] ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone</b>
                                                <div class="profile-desc-item pull-right"><?php echo$row["phone"] ?></div>
                                            </li>
											<li class="list-group-item">
                                                <b>Date Joined</b>
                                                <div class="profile-desc-item pull-right"><?php echo$row["date"] ?></div>
                                            </li>
<?php }} ?>
                                        </ul>
                                       
                                    </div>
                                </div>
                                <!--div class="card">
                                    <div class="card-head card-topline-aqua">
                                        <header>Address</header>
                                    </div>
                                    <div class="card-body no-padding height-9">
                                        <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <p>456, Pragri flat, varacha road, Surat
                                            <br> Gujarat, India.</p>
                                    </div>
                                </div>
                                    </div>
                                </div-->
                                
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                     <div class="card">
                                         <div class="card-topline-aqua">
                                             <header></header>
                                         </div>
											<div class="white-box">
					                            <!-- Nav tabs -->
					                            <div class="p-rl-20">
						                            <ul class="nav customtab nav-tabs" role="tablist">
						                                <li class="nav-item"><a href="#tab1" class="nav-link active"  data-toggle="tab" >Student Certificates</a></li>
						                                <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">Student Short courses</a></li>
						                                <li class="nav-item"><a href="#tab3" class="nav-link" data-toggle="tab">Student Diploma Program</a></li>
						                            </ul>
					                            </div>
					                            <!-- Tab panes -->
					                            <div class="tab-content">
					                                <div class="tab-pane active fontawesome-demo" id="tab1">
															<div id="biography" >
							                                   																 <?php
						
$sql0 = "SELECT * FROM tb_certificates";
$result0 = $conn->query($sql0);

	while($row = $result0->fetch_assoc()) {
?>
															   
							                                    <h4 class="font-bold"><?php echo$row["certificate_name"] ?></h4>
							                                    <hr>
				 <?php
		$course=$row["certificate_code"];				
$sql1 = "SELECT * FROM tb_course,tb_subscription where tb_course.course_code = tb_subscription.course_code and tb_course.certificate_code='$course' and tb_subscription.email='$_GET[email]'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()) {
?>
							                                    <ul>
							                                        <li><?php echo$row["course_name"] ?></li>
							                                    </ul>
<?php }}else{?>

							                                        <center style="color:red;font-size:18px">Student hasnt enrolled this certificate yet.</center>
							                                    
<?php } ?>
							                                    <br>
					
<?php } ?>
							                                    <br>
							                                </div>
													</div>
					                              
												   <div class="tab-pane fontawesome-demo" id="tab2">
															<div id="biography" >
							                                   																 <?php
						
$sql2 = "SELECT * FROM tb_shortcourse";
$result2 = $conn->query($sql2);

	while($row = $result2->fetch_assoc()) {
?>
															   
							                                    <h4 class="font-bold"><?php echo$row["course_name"] ?></h4>
							                                    <hr>
				 <?php				
$sql3 = "SELECT * FROM tb_shortcourse,tb_subscription where tb_shortcourse.course_code = tb_subscription.course_code and tb_subscription.email='$_GET[email]'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
	while($row = $result3->fetch_assoc()) {
?>
							                        
								                                    <center style="color:green;font-size:18px">Student has enrolled this Short Course.</center>
							                                  
<?php }}else{?>

							                                        <center style="color:red;font-size:18px">Student hasnt enrolled this Short Course yet.</center>
							                                    
<?php } ?>
							                                    <br>
					
<?php } ?>
							                                    <br>
							                                </div>
													</div>
												  
												  
												  
												  
												    <div class="tab-pane fontawesome-demo" id="tab3">
															<div id="biography" >
							                                   																 <?php
						
$sql4 = "SELECT * FROM tb_diploma";
$result4 = $conn->query($sql4);

	while($row = $result4->fetch_assoc()) {
?>
															   
							                                    <h4 class="font-bold"><?php echo$row["diploma_name"] ?></h4>
							                                    <hr>
				 <?php
		$course=$row["diploma_code"];				
$sql5 = "SELECT * FROM tb_diplomacourse,tb_subscription where tb_diplomacourse.course_code = tb_subscription.course_code and tb_diplomacourse.diploma_code='$course' and tb_subscription.email='$_GET[email]'";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
	while($row = $result5->fetch_assoc()) {
?>
							                                    <ul>
							                                        <li><?php echo$row["course_name"] ?></li>
							                                    </ul>
<?php }}else{?>

							                                        <center style="color:red;font-size:18px">Student hasnt enrolled this diploma yet.</center>
							                                    
<?php } ?>
							                                    <br>
					
<?php } ?>
							                                    <br>
							                                </div>
													</div>
					                              
												  
												  
												  
												  
												  
												  
					                            </div>
					                        </div>
                                         </div>
                                     </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>
                        </div>
                    </div>
                <!-- end page content -->
               
            </div>
            <!-- end page container -->
            <!-- start footer -->
            <?php include("footer.php") ?>
            <!-- end footer -->
        </div></div>
        <!-- start js include path -->
        <script src="assets/plugins/jquery/jquery.min.js" ></script>
        <script src="assets/plugins/popper/popper.js" ></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
		<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- bootstrap -->
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
        <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
        <!-- Common js-->
		<script src="assets/js/app.js" ></script>
        
        <script src="assets/js/layout.js" ></script>
		<script src="assets/js/theme-color.js" ></script>
		<!-- Material-->
		<script src="assets/plugins/material/material.min.js"></script>
        <!-- end js include path -->
</body>

</html>