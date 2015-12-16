<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Ver código</title>
	</head>
	<body>
	<?php
		if (isset($_GET['src'])) {
			highlight_file($_GET['src']);
		}
		else header("Location: /~gafoem/index.php");
		echo ("<br /><a href='/~gafoem/index.html'>Inicio</a>");
	?>
	</body>
</html>