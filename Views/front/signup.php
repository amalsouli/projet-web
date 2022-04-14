<?php
	include_once '../../config.php' ; 
	include 'ajouterUtilisateur.php' ;
			
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
</head>

<body>
	

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Registration</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.html">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
							<hr>

							<form method="POST">
							
							<input type="text" name="username" placeholder="username*" class="form-control">
							<div class="top-margin">
									<input type="text" name="nom_user" placeholder="votre nom*" class="form-control">                                
							</div> 
							<div class="top-margin">   
								<input type="text" name="prenom_user" placeholder="votre prenom*" class="form-control">
								</div>
								<div class="top-margin">
                                <input type="email" name="email_user" placeholder="Email*" class="form-control">
								</div>
								<div class="top-margin">
                                <input type="number" name="tel_user" placeholder="tel*" class="form-control">
								</div>
								<div class="top-margin">                                
								<input type="text" name="adresse_user" placeholder="adresse*" class="form-control">
								</div>
								<div class="top-margin">
                                <input type="password" name="password_user" placeholder="Password*" class="form-control">
								</div>
								<div class="top-margin">
                                <input type="password" placeholder="Confirm Password*" class="form-control">
								</div>
								<div class="top-margin">
                                <input type="text" name="role_user" value="User" class="form-control" readonly> 
                                </div>
								<div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
								<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Register</button>
									</div>
								<a href="signin.php" type="submit"> Signin</a>	
									
									

								<hr>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">
	</footer>
		


</body>
</html>