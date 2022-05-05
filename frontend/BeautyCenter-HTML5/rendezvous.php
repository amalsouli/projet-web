<?php
 include 'A:/xampp/htdocs/dhia/project/frontend/RendezC.php';
 $error = "";
if(isset($_POST['ajouter'])){
  if (isset($_POST['ID']) &&
    isset($_POST['Dates']))
    {
    
        if (!empty($_POST['ID']) &&
        !empty($_POST['Dates'])) 
         {
          $rendez=new Rendezc();
          $rendez->ajouterrendez();
          
          header('Location:../afficher.php');
          
        }
        else
        $error ="missing information";
      
      }
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
									<li class="m3"><a href="rendezvous.php"></a></li>
								</ul>
							</nav>
							<nav class="fright">
								<ul class="main-menu">
									<li><a href="index.html">Main</a></li>
									<li><a href="about.html">About</a></li>
									<li><a href="gallery.html">Gallery</a></li>
									<li><a href="services.html">Services</a></li>
									<li class="active"><a href="contacts.html">Contact</a></li>
									<li><a href="rendezvous.php">Rendez-vous</a></li>


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
								<h4>Rendez-vous </h4>
								<form name="f"  method="POST" id="myForm" action ="rendezvous.php">
  <div class="container">
<br>
<br>
  <div class="">
    <label for="exampleInputEmail1" class="">ID:</label>
    <input type="text" name="ID" class="form-control" id="ID" aria-describedby="emailHelp">
 <span id="erreurid" style="color:#FF0000"> </span>
  </div>
  <div class="">
    <label for="exampleInputPassword1" class="">Dates:</label>
    <input type="date"  name="Dates" class="form-control" >
<span id="cmon" style="color:#FF0000"> </span>
  </div>
  <div class="">
  <form>
  <label for="appt-time">Veuillez choisir une heure de rendez-vous : </label>
  <input id="appt-time" type="time" name="Temps">
</form>
  </div>
    <div class="">
    <label for="exampleInputPassword1" class="">Soin:</label>
    <input type="text"  name="Soin" class="form-control" >
<span id="cqteing" style="color:#FF0000"> </span>
  </div>
 
<br>
<div class="">

 <label for="floatingTextarea">Duree</label>
  <input class="form-control" type="text" name="Duree" ></input>
  <br>
  <br>

  <label for="floatingTextarea">nom</label>
  <input class="form-control" type="text" name="nom" ></input>
</div>
 <br>
<p><input type="submit"  value="Ajouter" class="btn btn-info"  name="ajouter" >&nbsp &nbsp
<input type="Reset"  value="Annuler" class="btn btn-danger"  ></p>
</form>
<div id="error">
										<div id="error">
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
