<?php
if(session_status() !== 2){
    session_start();
}
require_once "./src/config/link-folder.php";
require_once CONTROLLERS . "controller.php";
$ctl = isset($_REQUEST['ctl']) ? $_REQUEST['ctl'] : "pages";
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'home';
$pr = isset($_REQUEST['pr']) ? $_REQUEST['pr'] : null;
$path_defaul = "<script>location.assign('home')</script>";
$path = CONTROLLERS . $ctl . ".php";
if (file_exists($path)) {
    require_once $path;
    if (method_exists($ctl, $act)) {
        $ctl = new $ctl(); 
        $ctl->$act($pr);
    } else {
        echo $path_defaul;
    }
} else {
    echo $path_defaul;
}
