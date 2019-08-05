<?php require 'db.php'; 
ob_start();
session_start();

if(!isset($_SESSION["username"])){
		 $_SESSION['loginfirst']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Please login first.
                    </div>";
		 header("location:login.php");
}

$result = $mysqli->query("SELECT * FROM tb_diploma WHERE diploma_code='$_GET[diploma]'");
		   
			if ( $result->num_rows == 0  ){ // User doesn't exist

	 $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Sorry wrong URL.
                    </div>";
	header("location: all_diplomas.php");
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
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- Theme Styles -->
    <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />	
    <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/pages/formlayout.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" /> 
</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
		<?php include("topmenu.php") ?>
        <!-- end header -->
       
        <!-- start page container -->
        <div class="page-container">
 			<!-- start sidebar menu -->
 			<?php include("sidemenu.php")?>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Certificate</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Certificate</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit certificate</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Certificate Details</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                </div>
                                <div class="card-body" id="bar-parent">
                                     <form action="" method=POST id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
																	 <?php
						
$sql = "SELECT * FROM tb_diploma where diploma_code='$_GET[diploma]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
                                        <div class="form-group row">

                                                <label class="control-label col-md-3">Diploma Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="diploma_name" value="<?php echo$row["diploma_name"] ?>" class="form-control input-height" required/> </div>
                                           
										   </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Diploma Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="diploma_code" value="<?php echo$row["diploma_code"] ?>" class="form-control input-height" disabled> </div>
                                         
											</div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Diploma Details
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="diploma_description" class="form-control-textarea" rows="5" ><?php echo$row["diploma_description"] ?></textarea>
                                                </div>
                                            
											</div>
                                          
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Diploma image
                                                </label>
                                                <div class="compose-editor">
												<input type="hidden" name="notselected" value="<?php echo $row['image'] ?>">
                                                  <input type="file" name="image" id="fileToUpload"   class="default" multiple>
                                              </div>
                                            </div>
											<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <input type="submit" name="submit" class="btn btn-info">
                                                    <button type="button" class="btn btn-default">Cancel</button>
                                                </div>
                                            	</div>
                                       		 </div>
<?php }} ?>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
           <?php
if(isset($_POST['submit'])){
	
	if( empty($_POST['diploma_name']) || empty($_POST['diploma_description'])) {
		$_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Fill out all the information please.
                    </div>";
		 header("location:edit_certificate.php");
	}else{
$diploma_name = $mysqli->escape_string($_POST['diploma_name']);
$diploma_code = $mysqli->escape_string($_POST['diploma_code']);
$diploma_description = $mysqli->escape_string($_POST['diploma_description']);
$notselected = $mysqli->escape_string($_POST['notselected']);
 $date=  date("Y-m-d"); 
 
 if ($_FILES['image']['tmp_name'] == "")
	{
				$filepath= $notselected;
	}
	else
	{
		$filetemp=$_FILES['image']['tmp_name'];
		$filename=$_FILES['image']['name'];
		$filetype=$_FILES['image']['type'];
		$filepath="images/".$filename;
	    move_uploaded_file($filetemp,$filepath);
	}
	
	$code = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
// active is 0 by DEFAULT (no need to include it here)

			$sql="UPDATE tb_diploma SET diploma_name='$diploma_name', diploma_description='$diploma_description', image='$filepath' WHERE diploma_code= '$_GET[diploma]'";
echo $sql;
    // Add user to the database
    if ( $mysqli->query($sql) ){
		$_SESSION['adminmessage']= " <div class='alert alert-success'>
        <strong>Well done!</strong> You successfully updated the diploma, it will be appear on the website.
                    </div>";
		 header("location:all_diplomas.php");
	}
else {
   $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Warning!</strong> You weren't successful in updating the diploma.
                    </div>";
header("location:all_diplomas.php");
    }
}}
?>
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
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" ></script>
    <script src="assets/plugins/jquery-validation/js/additional-methods.min.js" ></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
    <script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"  charset="UTF-8"></script>
    <script src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js"  charset="UTF-8"></script>
    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/pages/validation/form-validation.js" ></script>
    <script src="assets/js/layout.js" ></script>
	<script src="assets/js/theme-color.js" ></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
     <!-- end js include path -->
</body>
</html>