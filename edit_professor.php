<?php require 'db.php'; 
ob_start();
session_start();

if(!isset($_SESSION["username"])){
		 $_SESSION['loginfirst']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Please login first.
                    </div>";
		 header("location:login.php");
}

$result = $mysqli->query("SELECT * FROM tb_professor WHERE professor_id='$_GET[professor_code]'");
		   
			if ( $result->num_rows == 0  ){ // User doesn't exist

	 $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Sorry wrong URL.
                    </div>";
	header("location: all_professors.php");
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
    <!-- bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- Theme Styles -->
    <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- favicon  -->
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
                                <div class="page-title">Add Professor</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Professor</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Professor</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                               <div class="card-body" id="bar-parent">
							                       <?php 
   if( isset($_SESSION['adminmessage']) AND !empty($_SESSION['adminmessage']) ){
        echo $_SESSION['adminmessage'];  
unset( $_SESSION['adminmessage'] );		
	}

?>
														 <?php
						
$sql = "SELECT professor_id,professor_name,professor_last,professor_gender,professor_number,professor_email,professor_image,professor_location,professor_background FROM tb_professor where professor_id='$_GET[professor_code]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
                                   <form action="" method=POST id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
                                        <div class="form-group row">
                                                <label class="control-label col-md-3">First Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="professor_name" data-required="1" value="<?php echo$row["professor_name"] ?>" class="form-control input-height" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Last Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="professor_last" data-required="1" value="<?php echo$row["professor_last"] ?>" class="form-control input-height" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        
                                                        <input type="text" class="form-control input-height" name="professor_email" value="<?php echo$row["professor_email"] ?>"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="professor_gender">
                                                        <option value="">Select...</option>
                                                        <option value="Male" <?php if ($row["professor_gender"] == "Male"){ echo 'selected="selected"';} ?>>Male</option>
                                                        <option value="Female" <?php if ($row["professor_gender"] == "Female"){ echo 'selected="selected"';} ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="professor_number" type="text" value="<?php echo$row["professor_number"] ?>" class="form-control input-height" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Location
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="professor_location" data-required="1" value="<?php echo$row["professor_location"] ?>" class="form-control input-height" /> </div>
                                            </div>
											<div class="form-group row">
												<label class="control-label col-md-3">Background of Professor 
												</label>
												<div class="col-md-5">
													<textarea id="summernote" style="tabsize:2;height:100" name="professor_background" class="form-control-textarea" placeholder="Education" rows="5"><?php echo$row["professor_background"] ?></textarea>
												</div>
											</div>
											 <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="compose-editor">
													<input type="hidden" name="notselected" value="<?php echo $row['professor_image'] ?>">
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
										</div>
                                    </form>
<?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
                <?php
if(isset($_POST['submit'])){
	
	if( empty($_POST['professor_name']) || empty($_POST['professor_last']) || empty($_POST['professor_email']) || empty($_POST['professor_gender'])
		|| empty($_POST['professor_number'])|| empty($_POST['professor_location'])|| empty($_POST['professor_background'])) {
		$_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Fill out all the information please.
                    </div>";
		 header("location:add_professor.php");
	}else{
$professor_name = $mysqli->escape_string($_POST['professor_name']);
$professor_last = $mysqli->escape_string($_POST['professor_last']);
$professor_email = $mysqli->escape_string($_POST['professor_email']);
$professor_gender = $mysqli->escape_string($_POST['professor_gender']);
$professor_number = $mysqli->escape_string($_POST['professor_number']);
$professor_location = $mysqli->escape_string($_POST['professor_location']);
$professor_background = $mysqli->escape_string($_POST['professor_background']);
$notselected = $mysqli->escape_string($_POST['notselected']);

 $date=  date("Y-m-d"); 
 
 if ($_FILES['image']['tmp_name'] == "")
	{
			$filepath=$notselected;
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
    $sql = "UPDATE tb_professor SET professor_name='$professor_name',professor_last='$professor_last',professor_email='$professor_email',professor_gender='$professor_gender',
	professor_number='$professor_number',professor_location='$professor_location',professor_background='$professor_background',professor_image='$filepath' where professor_id='$_GET[professor_code]'";
    // Add user to the database
    if ( $mysqli->query($sql) ){
		$_SESSION['adminmessage']= " <div class='alert alert-success'>
        <strong>Well done!</strong> You successfully updated a the professor.
                    </div>";
		 header("location:all_professors.php");
	}
else {
   $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Warning!</strong> You weren't successful in updating the professor.
                    </div>";
header("location:all_professors.php");
    }
}}
?>
        </div>
        <!-- end page container -->
        <!-- start footer -->
        <?php include("footer.php") ?>
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
    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
	<script src="assets/js/theme-color.js" ></script>
	<!-- Material -->
	<script src="assets/plugins/material/material.min.js"></script>
    <!-- summernoe -->
    <script src="assets/plugins/summernote/summernote.js" ></script>
    <script src="assets/js/pages/summernote/summernote-data.js" ></script>
     <!-- end js include path -->
</body>
</html>