
<link rel="stylesheet" href="./public/css/carousel-multi.css">
<script defer src="./public/js/carousel-multi.js"></script>
<?php
if(session_status() !== 2){
    session_start();
}
require_once "./src/config/varible.php";
require_once CONTROLLERS . "controller.php";
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'home';
if (!in_array($act, ["login", "register"])) {
    $controller = new controller();
    $controller->view(CUSTOMERS, "", "header");
}
require "./ajax.php";
