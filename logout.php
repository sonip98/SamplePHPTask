<?php
require("include/include.inc.php");
ob_start();
setcookie("username", "", time() - 3600);
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
header("Location: index.php?cmd=login");
ob_end_flush();
?>