
<?php
    include_once '../Model/gestionclient.php';
    include_once '../Controller/gestionclientC.php';
    include_once '../config.php';
    $error = "";

    // create client
    $client = null;

    // create an instance of the controller
    $clientC = new clientC();
    if (
        isset($_POST["firstname"]) &&
		isset($_POST["lastname"]) &&
        isset($_POST["sexe"]) &&
		isset($_POST["email"]) &&
        isset($_POST["password"])

    ) {
        if (
            !empty($_POST["firstname"]) &&
			!empty($_POST["lastname"]) &&
            !empty($_POST["sexe"]) &&
			!empty($_POST["email"]) &&
            !empty($_POST["password"])
                    ) {
            $client = new client (
                $_POST['firstname'],
				$_POST['lastname'],
                $_POST['sexe'],
				$_POST['email'],
                $_POST['password']

            );
            $clientC->ajouterclient($client);
            header('Location:../view/afficherclient.php');
        }
        else
            $error = "Missing information";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen"> 
	<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/cufon-replace.js" type="text/javascript"></script>
	<script src="js/PT_Sans_400.font.js" type="text/javascript"></script>
	<script src="js/PT_Sans_italic_400.font.js" type="text/javascript"></script> 
	<script src="js/Satisfy_400.font.js" type="text/javascript"></script>
	<script src="js/NewsGoth_400.font.js" type="text/javascript"></script>
	<script src="js/FF-cash.js" type="text/javascript"></script> 
	<script src="js/script.js" type="text/javascript"></script>	 
	<script src="js/easyTooltip.js" type="text/javascript"></script>
	<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		</a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body id="page5">
	<div class="extra">
<!--==============================header=================================-->
		<header>
			<div class="menu-row">
				<div class="main">
					<div class="container_12">
						<div class="grid_12">
							<nav class="fleft">
								<ul class="services-menu">
									<li class="m1"><a href="index.html"></a></li>
									<li class="m2"><a href="contacts.html"></a></li>
									<li class="m3"><a href="#"></a></li>
								</ul>
							</nav>
							<nav class="fright">
								<ul class="main-menu">
									<li><a href="index.html">Main</a></li>
									<li><a href="about.html">About</a></li>
									<li><a href="gallery.html">Gallery</a></li>
									<li><a href="services.html">Services</a></li>
									<li class="active"><a href="contacts.html">Contacts</a></li>
								</ul>
							</nav>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="header-row"><div class="ic">More Website Templates @ TemplateMonster.com - November 07, 2011!</div>
				<div class="main">
					<h1 class="margin-bot">
						<a href="index.html">BeautyCenter</a>
						<em>Keep Your Perfect Look</em>
					</h1>
					<div class="container_12">
						<div class="wrapper">
							<div class="grid_12">
								<h4>Contact Form</h4>


    <form action=""  method="POST">


                  <div class="form-group mb-3">

<br>
                    <td>
                        <input
                    type="text"
                    name="firstname"
                    id="firstname"
                    maxlength="20" placeholder="First Name "
                      class="form-control validate"
                      required
                    /></td>
                  </div>
                  <div class="form-group mb-3">
                  <td>

                   <td>
                        <input
                        type="text" name="lastname" id="lastname" maxlength="20"
                        class="form-control validate"  placeholder="Last Name"
                      required
                    ></td>
                  </div>
                  <br>
                  <div class="form-group mb-3">

                   <td>
                        <input
                        type="text" name="sexe" id="sexe"
                        class="form-control validate"
                        placeholder="H/F"
                        required
                    ></td>
                    <br>
                  </div>
                  <div class="form-group mb-3">
                  <td>

                   <td>
                        <input
                        type="text" name="email" id="email"
                        class="form-control validate" placeholder="Your email"
                      required
                    ></td>
                  </div>
                  <div class="form-group mb-3">

                   <td>
                        <input
                        type="password" name="password" id="password"
                        class="form-control validate"  placeholder="Password"
                      required
                    ></td>
                  </div>

                  <input type="submit" class="fadeIn fourth" value="S'inscrire">

         


            </form>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="connexion.php">Vous avez un compte? Se connecter</a>
    </div>

    </div>
						</div>
					</div>					
				</div>
			</div>
		</header>
		
<!--==============================content================================-->
		<section id="content">
			<div class="main">
				<div class="container_12">
					<div class="wrapper">
						<article class="grid_12">
							<h3 class="p2">Our Contacts</h3>
							<div class="wrapper">
								<div class="grid_4 alpha">
									<h6>USA</h6>
									<dl>
										<dt>8901 Marmora Road, Glasgow, D04</dt>
										<dd><span>Freephone:</span>  +1 800 559 6580</dd>
										<dd><span>Telephone:</span>  +1 800 603 6035</dd>
										<dd><span>Fax:</span>  +1 800 889 9898</dd>
										<dd><span>Email:</span><a class="link" href="#">mail@demolink.org</a></dd>
									</dl>
								</div>
								<div class="grid_4">
									<h6>Canada</h6>
									<dl>
										<dt>8901 Marmora Road, Glasgow, D04</dt>
										<dd><span>Freephone:</span>  +1 800 559 6580</dd>
										<dd><span>Telephone:</span>  +1 800 603 6035</dd>
										<dd><span>Fax:</span>  +1 800 889 9898</dd>
										<dd><span>Email:</span><a class="link" href="#">mail@demolink.org</a></dd>
									</dl>
								</div>
								<div class="grid_4 omega">
									<h6>Mexico</h6>
									<dl>
										<dt>8901 Marmora Road, Glasgow, D04</dt>
										<dd><span>Freephone:</span>  +1 800 559 6580</dd>
										<dd><span>Telephone:</span>  +1 800 603 6035</dd>
										<dd><span>Fax:</span>  +1 800 889 9898</dd>
										<dd><span>Email:</span><a class="link" href="#">mail@demolink.org</a></dd>
									</dl>
								</div>
							</div>
						</article>
					</div>
				</div>
			</div>
			<div class="block"></div>
		</section>
	</div>
	
<!--==============================footer=================================-->
	<footer>
		<div class="footer-bg">
			<div class="main">
				<div class="container_12">
					<div class="wrapper">
						<div class="grid_12">
							<div class="wrapper">
								<span class="footer-text">Beauty Center &copy; 2011 Website Template by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">www.templatemonster.com</a></span>
								<ul class="list-services">
									<li>Follow Us:</li>
									<li class="item-1"><a class="tooltips" title="facebook" href="#"></a></li>
									<li class="item-2"><a class="tooltips" title="twitter" href="#"></a></li>
									<li class="item-3"><a class="tooltips" title="picasa" href="#"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript"> Cufon.now(); </script>
	<!--coded by cheh-->
</body>
</html>