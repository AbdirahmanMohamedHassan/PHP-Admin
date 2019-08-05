<?php require 'db.php'; 
ob_start();
session_start();

if(!isset($_SESSION["username"])){
		 $_SESSION['loginfirst']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Please login first.
                    </div>";
		 header("location:login.php");
}?>
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
    <!-- data tables -->
    <link href="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
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
		<!-- Top menu -->
		<?php include("topmenu.php") ?>
		<!-- End top menu -->
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			<?php include ("sidemenu.php") ?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">All Diploma List</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Diplomas</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">All Diplomas List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                           <div class="card-box">
                               <div class="card-head">
                                   <header>All Diplomas</header>
								   <a href="add_diploma.php"><button style="float:right" type="button" href="edit_certificate.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-success">Add Diploma</button></a>
			                        	    
                               </div>
                               <div class="card-body ">
							   <?php 
   if( isset($_SESSION['adminmessage']) AND !empty($_SESSION['adminmessage']) ){
        echo $_SESSION['adminmessage'];  
unset( $_SESSION['adminmessage'] );		
	}

?>  
                               	<!-- start course list -->
		                     <div class="row">
							 <?php
						
$sql = "SELECT diploma_name,diploma_code,image,date FROM tb_diploma";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		

?>
								<div class="col-lg-6 col-md-6 col-12 col-sm-6"> 
									<div class="blogThumb">
										<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo$row["image"] ?>"></div>
			                        	<div class="course-box">
			                        	<h4><?php echo$row["diploma_name"] ?></h4>
				                            <div class="text-muted"><span class="m-r-10"><?php echo$row["date"] ?></span> 
				                            </div>
				                            
				                            <a href="edit_diploma.php?diploma=<?php echo$row["diploma_code"] ?>"><button type="button" href="edit_certificate.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Edit Diploma</button></a>
			                        	    <a href="diploma_course.php?diploma=<?php echo$row["diploma_code"] ?>"><button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">View courses</button></a>
										   <form action="" method=POST>
										   <button value="<?php echo $row["diploma_code"] ?>" type="submit" name="delete" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-danger">Delete Diploma</button>
			                        	</form>
										</div>
			                        </div>	
		                    	</div>
<?php }}else if ($result->num_rows == 0) {
echo "<center><h2>no Diploma avaliabe</h2></center>";}?>
			                   
							   <?php if(isset($_POST['delete'])){
										$id = $mysqli->escape_string($_POST['delete']);
	
	$result = $mysqli->query("SELECT * FROM tb_diplomacourse WHERE diploma_code='$id'") or die($mysqli->error());

						if ( $result->num_rows > 0 ) {
$sql = "delete tb_diploma,tb_diplomacourse from tb_diploma,tb_diplomacourse WHERE tb_diploma.diploma_code='$id' AND tb_diplomacourse.diploma_code='$id'";
						}
						else{
$sql = "delete from tb_diploma WHERE diploma_code='$id' ";						
						}
   if ( $mysqli->query($sql) ){
		$_SESSION['adminmessage']= " <div class='alert alert-success'>
        <strong>Well done!</strong> You successfully Deleted the diploma.
                    </div>";
		 header("location:all_diplomas.php");
	}
else {
   $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Warning!</strong> You weren't successful Deleting the diploma.
                    </div>";
header("location:all_diplomas.php");
    }
	
										}?>
					        </div>
	        				<!-- End course list -->
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php")?>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <script src="assets/plugins/popper/popper.js" ></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <!-- data tables -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js" ></script>
 	<script src="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
    <script src="assets/js/pages/table/table_data.js" ></script>
    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
	<script src="assets/js/theme-color.js" ></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
     <!-- end js include path -->
</body>
</html>