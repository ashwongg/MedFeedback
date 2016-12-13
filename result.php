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

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

	</head>

	<body> 
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
								<?php
								include 'Parsedown.php'; 
								$Parsedown = new Parsedown();

								$name = $_GET["name"]; 
								echo "<h2> $name </h2>";
								$string = file_get_contents("data.json");
								$json_a = json_decode($string,true);

								foreach ($json_a as $med_name => $med_a)
									if (strcasecmp($_GET["name"],$med_a['title'])==0){
										$med_a['text'] = str_replace("[By Mayo Clinic Staff](http://www.mayoclinic.org/about-this-site/welcome)","",$med_a['text']);
										if (strcasecmp($_GET["lvl"], "Basic")==0){
											$med_a['text'] = str_replace("\n\n","<br><br>",$med_a['text']);
											$arr= explode('##',$med_a['text']);
											echo$Parsedown->text($arr[1]);
											#echo $med_a['text'];
										} else if (strcasecmp($_GET["lvl"], "Mediocre")==0){
											#$med_a['text'] = str_replace("\n\n","<br><br>",$med_a['text']);
											$arr= explode('##',$med_a['text']);
											echo$Parsedown->text($arr[1]);
												if (empty($arr[2])){
													echo('');
												} else { 
													echo$Parsedown->text($arr[2]);
												}
										} else { 
											echo $Parsedown->text($med_a['text']);
											#echo $med_a['text'];
										}
									}


									?>
								</div>
							</div>
						</div>
					</div>
