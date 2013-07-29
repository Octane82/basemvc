<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="<?php echo '/theme/css/style.css';?>" type="text/css" media="screen, projection" />
</head>

<body>

<div id="wrapper">

	<header id="header">
		<h1>MyApplication</h1>
	</header><!-- #header-->
	
	<div id="menu">	<!-- Horizontal menu -->
		<ul>
			<li><a href="#">Телефоны</a></li>
			<li><a href="#">Аксессуары</a></li>
			<li><a href="#">Рингтоны</a></li>
		</ul>
	</div>
	

	<div id="content">
		<?php echo $content; ?>
	</div><!-- #content-->

</div><!-- #wrapper -->

<footer id="footer">
	<strong>Copyright &copy; 2013 Octane web developer.</strong>
</footer><!-- #footer -->

</body>
</html>