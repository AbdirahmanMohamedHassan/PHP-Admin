<?php require 'db.php'; 
ob_start();
session_start();

if(!isset($_SESSION["username"])){
		 $_SESSION['loginfirst']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Please login first.
                    </div>";
		 header("location:login.php");
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
	<link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- inbox style -->
    <link href="assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
    <link href="assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" /> 
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- Top menu page -->
		<?php include("topmenu.php") ?>
		<!-- end top menu page -->
        <!-- start page container -->
        <div class="page-container">
 			<!-- Sidebar menu page -->
			<?php include("sidemenu.php") ?>
			<!-- end sidebar menu page -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
					<div class="state-overview">
							<div class="row">
						        <div class="col-xl-3 col-md-6 col-12">
						          <div class="info-box bg-b-green">
						            <span class="info-box-icon push-bottom"><i class="material-icons">group</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Total Students</span>
						              <span class="info-box-number"><?php  
$sql="SELECT * FROM tb_user ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?>   </span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 45%"></div>
						              </div>
						              
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-xl-3 col-md-6 col-12">
						          <div class="info-box bg-b-yellow">
						            <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Total Short Courses</span>
						              <span class="info-box-number"><?php  
$sql="SELECT * FROM tb_shortcourse ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?>  </span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-xl-3 col-md-6 col-12">
						          <div class="info-box bg-b-blue">
						            <span class="info-box-icon push-bottom"><i class="material-icons">school</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Total Course</span>
						              <span class="info-box-number"><?php  
$sql="SELECT * FROM tb_course ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?>  </span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 85%"></div>
						              </div>
						             
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						        <div class="col-xl-3 col-md-6 col-12">
						          <div class="info-box bg-b-pink">
						            <span class="info-box-icon push-bottom"><i class="material-icons">person</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Studing students</span>
						              <span class="info-box-number"><?php  
$sql="SELECT * FROM tb_subscription where status='1' or status='2' ";

if ($result=$conn->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  // Free result set
  mysqli_free_result($result);
  }


?>  </span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 50%"></div>
						              </div>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <!-- /.col -->
						      </div>
						</div>
					<!-- end widget -->
                 
			
                     <!-- start new student list -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Student Course Registration List</header>
                                    
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>No</th>
														<th>Student Name</th>
														<th>Course </th>
														<th>Date</th>
														<th>Email</th>
														<th>Phone</th>
														<th>Status</th>
														<th>Amount</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													
													 <?php
						
$sql = "SELECT * FROM tb_subscription ORDER BY date DESC Limit 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
											<tr >
												<td ><?php echo$row["id"] ?></td>
												<td ><?php echo$row["f_name"] ?> <?php echo$row["l_name"] ?></td>
												<td ><?php echo$row["course_name"] ?></td>
												<td ><?php echo$row["date"] ?></td>
												<td ><?php echo$row["email"] ?></td>
												<td ><?php echo$row["phone"] ?></td>
												<td >
												<?php if($row["status"]=='0'){?>
												<span class="label label-sm label-danger">Not Approved</span>
												<?php }elseif ($row["status"]=='1'){?>
												<span class="label label-sm label-warning">Approved and Material Not Sent</span>
												<?php }elseif ($row["status"]=='2'){?>
												<span class="label label-sm label-success">Approved and Material Sent</span>
												<?php } ?>
												</td>
												<td ><?php echo$row["course_price"] ?></td>
												<td>
																		<a href="edit_payment.php?id=<?php echo$row["id"] ?>" class="btn btn-primary btn-xs">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<button class="btn btn-danger btn-xs">
																			<i class="fa fa-trash-o "></i>
																		</button>
																	</td>
											</tr>
<?php }} ?>
												</tbody>
											</table>
										</div>
									</div>	
									<div class="text-center">
										<a href="payments.php"><button  class="btn btn-outline-primary btn-round btn-sm">Load
											More</button></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end new student list -->
					
					
					        <!-- start new student list -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Student Course Registration List</header>
                                    
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>No</th>
														<th>Student Name</th>
														<th>Email </th>
														<th>Gender</th>
														<th>Phone</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													
													 <?php
						
$sql = "SELECT * FROM tb_user ORDER BY date DESC Limit 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
											<tr >
												<td ><?php echo$row["id"] ?></td>
												<td ><?php echo$row["name"] ?> <?php echo$row["sname"] ?></td>
												<td ><?php echo$row["email"] ?></td>
												<td ><?php echo$row["gender"] ?></td>
												<td ><?php echo$row["phone"] ?></td>
												<td ><?php echo$row["date"] ?></td>
												
											</tr>
<?php }} ?>
												</tbody>
											</table>
										</div>
									</div>	
									<div class="text-center">
										<a href="students.php"><button  class="btn btn-outline-primary btn-round btn-sm">Load
											More</button></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end new student list -->
					
					
					
					
					
					  <!-- start new contact us list -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>User messages left for us</header>
                                    
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>Email </th>
														<th>Subject</th>
														<th>Message</th>
														<th>Phone</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													
													 <?php
						
$sql = "SELECT * FROM tb_contact ORDER BY date DESC Limit 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
?>
											<tr >
												<td ><?php echo$row["id"] ?></td>
												<td ><?php echo$row["name"] ?> </td>
												<td ><?php echo$row["email"] ?></td>
												<td ><?php echo$row["subject"] ?></td>
												<td ><?php echo$row["message"] ?></td>
												<td ><?php echo$row["phone"] ?></td>
												<td ><?php echo$row["date"] ?></td>
												
											</tr>
<?php }} ?>
												</tbody>
											</table>
										</div>
									</div>	
								
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end new student list -->
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
    <script src="assets/plugins/sparkline/jquery.sparkline.js" ></script>
	<script src="assets/js/pages/sparkline/sparkline-data.js" ></script>
    <!-- Common js-->
	<script src="assets/js/app.js" ></script>
    <script src="assets/js/layout.js" ></script>
    <script src="assets/js/theme-color.js" ></script>
    <!-- material -->
    <script src="assets/plugins/material/material.min.js"></script>
    <!-- chart js -->
    <script src="assets/plugins/chart-js/Chart.bundle.js" ></script>
    <script src="assets/plugins/chart-js/utils.js" ></script>
    <script src="assets/js/pages/chart/chartjs/home-data.js" ></script>
    <!-- summernote -->
    <script src="assets/plugins/summernote/summernote.js" ></script>
    <script src="assets/js/pages/summernote/summernote-data.js" ></script>
    <!-- end js include path -->
  </body>
</html>