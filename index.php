	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Medical Feedback</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/simple-sidebar.css" rel="stylesheet">
	
		<script type="text/Javacript" src"js/jquery-3.1.1.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

	</head>

	<body>

		<div id="wrapper">

			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav">
					<li class="sidebar-brand">
						<a href="index.php">
							Medical Feedback
						</a>
					</li>
				</ul>
			</div>
			<!-- /#sidebar-wrapper -->

			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?php $name= ""?> 
							<?php $lvl=""?>
							<h2> Medical Feedback </h2> 

							<br>
							<h4> This is a Learning Analytics (COSC 419C) Project with a focus on taking a user's <br>
								 level of understanding and providing the information according to their level. </h4> 
							<br>
							<h4> Choose a disease and condition from here: <a href="http://www.mayoclinic.org/diseases-conditions/index">Diseases and Conditions</a></h4>

							<form method="get" action="result.php">
							
								<h3>Disease or Condition: </h3>
							
								<select id ="sel" name="name"> 
								<?php
								$string = file_get_contents("data.json");
								$json_a = json_decode($string,true);

								foreach ($json_a as $med_name => $med_a){
								?> <option value = "<?php $med_a['title']?>"> <?php $med_a['title']?> </option> 
								<?php } ?>
								</select>
									
								<br>
								<br>
								Level of Understanding:<br>
								<br> Basic: <input type="radio" name="lvl" value="Basic"> <br>
								Expert: <input type="radio" name="lvl" value="Expert"> </h3>
								<br>
								<br>
								<input type="submit" value="Submit">
							</form>
							<br>
							<h4> Information provided by MayoClinic.org</h4> 
							<br>
							<h5> Created by: Ashley Wong (32297129) </h5> 


							</div>
						</div>
					</div>
				</div>
				<!-- /#page-content-wrapper -->

			</div>
			<!-- /#wrapper -->

			<!-- jQuery -->
			<script src="js/jquery.js"></script>

			<!-- Bootstrap Core JavaScript -->
			<script src="js/bootstrap.min.js"></script>

			<!-- Menu Toggle Script -->
			<script>
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			</script>



		</body>

		</html>
