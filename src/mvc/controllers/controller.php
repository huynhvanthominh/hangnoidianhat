<?php
require "./src/config/link-folder.php";
class controller
{
    public function model($model)
    {
        $path = MODELS . "$model.php";
        
        if (file_exists($path)) {
            require_once MODELS . "database.php";
            require_once "./src/mvc/models/$model.php";
            return new $model();
        }
    }

    public function view($user, $folder, $file, $data = null)
    {
        $path = VIEWS . $user . "/" . (strlen($folder) > 0 ? $folder . "/" . $file : $file) . ".php";
        $path_js = "./public/js/" . $file . ".js";
        $path_css = "./public/css/" . $file . ".css";
        if (file_exists($path)) {
            if (file_exists($path_css)) {
                echo '<link rel="stylesheet" href="' . $path_css . '">';
            }
            require_once $path;
            if (file_exists($path_js)) {
                echo '<script defer src="' . $path_js . '"></script>';
            }
        } else {
            echo "khong ton tai";
        }
    }

    public function getValue($method, $key, $defaul = null)
    {
        if (strcmp($method, 1) === 0) {
            return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : $defaul;
        }
        if (strcmp($method, 0) === 0) {
            return isset($_GET[$key]) ? htmlspecialchars($_GET[$key]) : $defaul;
        }
        return $defaul;
    }

    public function clearSession()
    {
        if(isset($_SESSION['author'])){
            unset($_SESSION['author']);
        }
    }
}
