<?php
session_start();
ob_start();
?>
<!doctype html><html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" media="screen" href="/css/reset.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/css/style.css" />
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="/js/swfobject.js" ></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="content">
				<?php
				if ($_GET['page'])
					@include_once('./inc/' . $_GET['page'] . '.php');
				else
					include_once('./inc/home.php');
				?>
			</div>
		</div>
	</body>
</html>