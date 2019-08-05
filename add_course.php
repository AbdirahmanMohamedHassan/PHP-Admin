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
                                <div class="page-title">Add Course</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Course</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Course</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                							
                                <div class="card-body" id="bar-parent">
                                    <form action="" method=POST id="form_sample_1" class="form-horizontal" enctype="multipart/form-data">
                                        <div class="form-body">
			<?php 
   if( isset($_SESSION['adminmessage']) AND !empty($_SESSION['adminmessage']) ){
        echo $_SESSION['adminmessage'];  
unset( $_SESSION['adminmessage'] );		
	}

?>  
                                        <div class="form-group row">
                                                <label class="control-label col-md-3">Course Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="course_name" placeholder="enter course name" class="form-control input-height" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Course Code
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="course_code" placeholder="enter course code" class="form-control input-height" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Course Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea id="summernote" style="tabsize:2;height:100" name="course_description" placeholder="course details" class="form-control-textarea" rows="5" ></textarea>
                                                </div>
                                            </div>
											  <div class="form-group row">
                                                <label class="control-label col-md-3">Professor Name
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="course_professor">
                                                        <option value="">Select...</option>
															 <?php
						
$sql = "SELECT professor_last,professor_name,professor_id FROM tb_professor ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
                                                        <option value="<?php echo$row["professor_id"] ?>"><?php echo$row["professor_name"] ;echo "\r\n"; echo $row["professor_last"] ?></option>
<?Php }} ?>
                                                    </select>
                                                </div>
                                            </div>
											  <div class="form-group row">
                                                <label class="control-label col-md-3">Course Duration
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="course_duration" placeholder="Course Duration" class="form-control input-height" /> </div>
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-3">Course Price
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="course_price" placeholder="Course Price" class="form-control input-height" /> </div>
                                            </div>
											<div class="form-group row">
                                                <label class="control-label col-md-3">Course level
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="course_level" placeholder="Course level" class="form-control input-height" /> </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Profile Picture
                                                </label>
                                                <div class="compose-editor">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content -->
            <?php
if(isset($_POST['submit'])){
	$certificate_code=$_GET['certificate'];
	if( empty($_POST['course_name']) || empty($_POST['course_code']) || empty($_POST['course_description']) || empty($_POST['course_professor']) || empty($_POST['course_duration'])
		|| empty($_POST['course_price']) || empty($_POST['course_level'])) {
		$_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Fill out all the information please.
                    </div>";
		 header("location:add_course.php?certificate=$certificate_code");
	}else{
		
		$result = $mysqli->query("SELECT * FROM tb_shortcourse,tb_course,tb_diplomacourse WHERE tb_shortcourse.course_code='$_POST[course_code]' OR tb_course.course_code='$_POST[course_code]' OR tb_diplomacourse.course_code='$_POST[course_code]'");
		      
			if ( $result->num_rows > 0  ){ // User doesn't exist

	 $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> This course code has already been used.
                    </div>";
	header("location: add_course.php?certificate=$certificate_code");
}
else{
$course_name = $mysqli->escape_string($_POST['course_name']);
$course_code = $mysqli->escape_string($_POST['course_code']);
$course_description = $mysqli->escape_string($_POST['course_description']);
$course_professor = $mysqli->escape_string($_POST['course_professor']);
$course_duration = $mysqli->escape_string($_POST['course_duration']);
$course_price = $mysqli->escape_string($_POST['course_price']);
$course_level = $mysqli->escape_string($_POST['course_level']);


 $date=  date("Y-m-d"); 
 
 if ($_FILES['image']['tmp_name'] == "")
	{
			$filepath="images/user.png";
	}
	else
	{
		$filetemp=$_FILES['image']['tmp_name'];
		$filename=$_FILES['image']['name'];
		$filetype=$_FILES['image']['type'];
		$filepath="images/".$filename;
	    move_uploaded_file($filetemp,$filepath);
	}
	
// active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO tb_course (course_name,course_code,course_description,course_professor,course_duration,course_price,course_level,course_image,certificate_code,course_date) " 
            . "VALUES ('$course_name','$course_code','$course_description','$course_professor','$course_duration','$course_price','$course_level','$filepath','$certificate_code','$date')";
echo $sql;
    // Add user to the database
    if ( $mysqli->query($sql) ){
		$_SESSION['adminmessage']= " <div class='alert alert-success'>
        <strong>Well done!</strong> You successfully added a new certificate, it will be appear on the website.
                    </div>";
		 header("location:certificate_course.php?certificate=$certificate_code");
	}
else {
   $_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Warning!</strong> You weren't successful in adding a new certificate.
                    </div>";
header("location:certificate_course.php?certificate=$certificate_code");
    }
}}}
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