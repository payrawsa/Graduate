<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width">
	<title>TA Feedback Review</title>
	<link href="bootstrap.min.css" rel="stylesheet">
	<link href="UI-layout.css" rel="stylesheet">
	<link href="button.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="course_menu/jquery.js"></script>

</head>
<?php include "../sql_connection.php"; ?>

<body>
	<div class="imagebg"></div>

	<div id="wrapper">

		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<a href="#">
            Main Menu
                    </a>
				</li>
				<img src="bulls.jpg" width="100%" height="100%" style="bottom:0;">

				<li>
					<a href="index.php">Dashboard</a>
				</li>
				<li>
					<a href="Manage-Courses.php">Manage Courses</a>
				</li>
				<li>
					<a href="Review-Feedback.php">Review Feedback</a>
				</li>
				<li>
					<a href="TA-Progress.php">TA Progress Overview</a>
				</li>
			</ul>
		</div>
		<div id="page-content-wrapper" style="   background:#001A33;">
			<div class=container>
				<div class=row>
					<!--<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="  background: #e4e4e4; color:black; padding-top: 10px">Toggle Menu</a>-->

					<div class="col">
						<h1 style="text-align:center; color:white; font:38px/1.1 Georgia,serif">Review Feedback</h1>
					</div>

				</div>
			</div>


		</div>
		<div class="page-template-default page page-id-373 wpb-js-composer js-comp-ver-5.4.7 vc_responsive fac-touch-device" style="padding:30px">

			<div class="vc_tta-container" data-vc-action="collapse">
				<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-juicy-pink vc_tta-style-outline vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-tabs-position-left vc_tta-controls-align-left ">
					<div class="vc_tta-tabs-container">

						<!-- setup tabs here -->

						<ul class="vc_tta-tabs-list">

							<?php
session_start();
    $ubit=$_SESSION['ubit'];	

					$sql = "SELECT cid FROM professor_table WHERE ubit = '".$ubit."'";
			    		$result = $conn->query($sql);
			    		while($row = $result->fetch_assoc()) {

								$cid= $row["cid"];
echo '<li class="vc_tta-tab " data-vc-tab=""><a href="#'.$cid.'" data-vc-tabs="" data-vc-container=".vc_tta"><span class="vc_tta-title-text">"'.$cid.'"</span></a></li>';
			    		}
						?>

						</ul>
					</div>
					<div class="vc_tta-panels-container">
						<div class="vc_tta-panels">


							<?php

					$sql = "SELECT cid FROM professor_table WHERE ubit = '".$ubit."'";
			    		$result = $conn->query($sql);
			    		while($row = $result->fetch_assoc()) {
								$count=0;
								$cid= $row["cid"];

			?>
						<div class="vc_tta-panel" id=<?php echo $cid ;?> data-vc-content=".vc_tta-panel-body">
								<div class="vc_tta-panel-heading">
									<h4 class="vc_tta-panel-title"><a href="#<?php echo $cid ;?>" data-vc-accordion="" data-vc-container=".vc_tta-container"><span class="vc_tta-title-text"><?php echo $cid ;?></span></a></h4></div>
								<div class="vc_tta-panel-body">
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper">
											<!-- text here --> 


<div class="col align-self-center" style="padding-top: 20px">
<table class="table table-dark" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Student Email</th>
      <th scope="col">TA UBIT (if known)</th>
      <th scope="col">TA Description</th>
      <th scope="col">Feedback</th>
      <th scope="col">Date/Time</th>

    </tr>
  </thead>
  <tbody>
							<?php

					$sql = "SELECT * FROM Feedback_Table WHERE cid = '".$cid."'";
			    		$result2 = $conn->query($sql);
			    		while($row = $result2->fetch_assoc()) {
								$count+=1;
								$feedback= $row["feedback"];
								$TA_ubit= $row["TA_ubit"];
								$student_name= $row["student_name"];
								$student_email= $row["student_email"];
								$time_stamp= $row["time_stamp"];
								$TA_description= $row["TA_description"];




			?>

    <tr>
      <th scope="row"><?php echo $count ;?></th>
      <td><?php echo $student_name ;?></td>
      <td><?php echo $student_email ;?></td>
      <td><?php echo $TA_ubit ;?></td>
      <td><?php echo $TA_description ;?></td>
      <td><?php echo $feedback ;?></td>
      <td><?php echo $time_stamp ;?></td>

    </tr>

 <?php ;} ?> 


  </tbody>
</table>
</div>
										</div>
									</div>
								</div>
							</div>


				<?php	;}
							?>
						</div>
					</div>
				</div>
			</div>

		</div>
		</br>

	</div>
	<link rel="stylesheet" id="vc_tta_style-css" href="course_menu/js_composer_tta.css" type="text/css" media="all">
	<script type="text/javascript" src="course_menu/vc-accordion.js"></script>
	<script type="text/javascript" src="course_menu/vc-tabs.js"></script>

	<script src="jquery.min.js"></script>
</body>

</html>