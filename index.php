<?php
if(session_status() !== 2){
    session_start();
}
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="./">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/index.css">
    <script defer src="node_modules/jquery/dist/jquery.js"></script>
    <script defer src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="./public/js/index.js"></script>
    <title>Hàng nội địa nhật</title>
</head>

<body>
    <?php
    $layout = isset($_REQUEST['layout']) ? $_REQUEST['layout'] : 'customers';
    if (strcasecmp($layout, "customers") === 0) {
        require_once "./src/mvc/views/customers/index.php";
    } else if(strcasecmp($layout, "admin") === 0){
        require_once "./src/mvc/views/admin/index.php";
    }
    ?>
</body>

</html>