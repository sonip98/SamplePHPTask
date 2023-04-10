<?php 
if(!isset($_SESSION['username']) && $_SERVER['REQUEST_URI']!="/sampleTask/index.php?cmd=login" && $_SERVER['REQUEST_URI']!="/sampleTask/index.php?cmd=list_resto" && $_SERVER['REQUEST_URI']!="/sampleTask/index.php") {
	echo("<script type=\"text/javascript\">");
	echo("window.top.location.href='/sampleTask/index.php?cmd=login'");
	echo("</script>");
}
?>