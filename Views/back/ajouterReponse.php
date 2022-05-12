<?php
include_once '../../controller/reponseC.php';
include_once '../../model/reponse.php';
if (
	isset($_POST["idReclamation"]) &&
	isset($_POST["idClient"]) &&
	isset($_POST["contenu"])
) {
	if (!empty($_POST['idReclamation']) && !empty($_POST['idClient']) && !empty($_POST['contenu']) ) {
		$reponseC = new reponseC();
		$reponse = new reponse($_POST['idReclamation'], $_POST['idClient'], $_POST['contenu']);
		$reponseC->ajouterreponse($reponse);
		// header('Location:reponses.php');
	} else
		$error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edmin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

				<a class="brand" href="index.html">
					Edmin
				</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
								<i class="icon-envelope"></i>
							</a></li>
						<li><a href="#">
								<i class="icon-eye-open"></i>
							</a></li>
						<li><a href="#">
								<i class="icon-bar-chart"></i>
							</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>

					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Item No. 1</a></li>

								<li><a href="#">Don't Click</a></li>
								<li class="divider"></li>
								<li class="nav-header">Example Header</li>
								<li><a href="#">A Separated link</a></li>
							</ul>
						</li>

						<li><a href="#">
								Support
							</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">

							<li>
								<a href="indexback.php">
									<i class="menu-icon icon-bullhorn"></i>
									reclamations
								</a>
							</li>
							<li>
								<a href="services.php">
									<i class="menu-icon icon-tasks"></i>
									services
									<b class="label orange pull-right">19</b>
								</a>
							</li>
						</ul>
						<!--/.widget-nav-->




					</div>
					<!--/.sidebar-->
				</div>
				<!--/.span3-->


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>reclamations</h3>
							</div>
							<div class="module-body">


								<div class="row tm-content-row">
									<div class="col-12 tm-block-col">
										<div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
											<h2 class="tm-block-title">ajouter service</h2>
											<form action="" method="POST">
												<table class="table">
													<thead>
														<tr>
															<th scope="col">id reclamation</th>
															<th scope="col">id client</th>
															<th scope="col">contenu</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<input type="text" name="idReclamation">
															</td>
															<td>
																<input type="number" name="idClient">
															</td>
															<td>
																<input type="textarea" name="contenu">
															</td>
															<td>
																<input type="submit" class="primary-btn">
															</td>
											</form>
											</tr>

											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

						</div>

						<script src="js/jquery-3.3.1.min.js"></script>
						<!-- https://jquery.com/download/ -->
						<script src="js/moment.min.js"></script>
						<!-- https://momentjs.com/ -->
						<script src="js/Chart.min.js"></script>
						<!-- http://www.chartjs.org/docs/latest/ -->
						<script src="js/bootstrap.min.js"></script>
						<!-- https://getbootstrap.com/ -->
						<script src="js/tooplate-scripts.js"></script>
						<script>
							Chart.defaults.global.defaultFontColor = 'white';
							let ctxLine,
								ctxBar,
								ctxPie,
								optionsLine,
								optionsBar,
								optionsPie,
								configLine,
								configBar,
								configPie,
								lineChart;
							barChart, pieChart;
							// DOM is ready
							$(function() {
								drawLineChart(); // Line Chart
								drawBarChart(); // Bar Chart
								drawPieChart(); // Pie Chart

								$(window).resize(function() {
									updateLineChart();
									updateBarChart();
								});
							})
						</script>
</body>

</html>