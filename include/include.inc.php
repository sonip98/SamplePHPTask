<?php
if (!isset($_SESSION))
    session_start();
if( !isset($_SESSION['last_access']) || (time() - $_SESSION['last_access']) > 60 )
    $_SESSION['last_access'] = time();

$pathclass = $_SERVER['DOCUMENT_ROOT']."/sampleTask/classes/";
$pathinc = $_SERVER['DOCUMENT_ROOT']."/sampleTask/include/";

include_once($pathinc.'dbic.php');
include_once($pathclass.'class_entity.inc.php');
include_once($pathclass.'class_resto.inc.php');
include_once($pathclass.'class_staff.inc.php');
?>