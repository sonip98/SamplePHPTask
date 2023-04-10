<?php
ob_start();
require("include/include.inc.php");
require("include/logcheck.php");
$db = new dbic();

if(isset($_REQUEST['actionid'])) {
    switch ($_REQUEST['actionid']) {
        case 'addresto':
            $resto = new resto($_POST,'restaurants');
            $resto->add();
            break;
        case 'editresto':
            $resto = new resto($_POST,'restaurants');
            $resto->edit('id',$_REQUEST['id']);
            break;
        case 'addemployee':
            $staff = new staff($_POST,'employees');
            $staff->add();
            break;
        case 'editemployee':
            $staff = new staff($_POST,'employees');
            $staff->edit('id',$_REQUEST['id']);
            break;
    }
}

if ($_REQUEST ['actionid'] == 'addresto' || $_REQUEST ['actionid'] == 'editresto') {
    header("Location: index.php?cmd=list_resto");
}elseif (isset($_REQUEST['fk_resto_id']) && $_REQUEST ['actionid'] == 'addemployee' || $_REQUEST ['actionid'] == 'editemployee') {
    header("Location: index.php?cmd=show_employees&id=".$_REQUEST['fk_resto_id']);
}

ob_end_flush ();
?>