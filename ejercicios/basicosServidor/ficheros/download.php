<?php
if(isset($_GET['archivoDownload'])){
			   header('Content-Type: application/force-download');
			   header('Content-Disposition: attachment; filename='.$_GET['archivoDownload']);
			   header('Content-Transfer-Encoding: binary');
			   header('Content-Length: '.filesize($_GET['archivoDownload']));
			   readfile($_GET['archivoDownload']);
	}

?>