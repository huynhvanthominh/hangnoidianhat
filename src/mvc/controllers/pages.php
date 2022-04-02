<?php
require_once "./src/config/varible.php";
class pages extends controller {

    public function home()
    {
        $this->view(CUSTOMERS, "", "home");
    }

    public function detail()
    {
        $this->view(CUSTOMERS, "", "detail");
    }

    public function card()
    {
        $this->view(CUSTOMERS, "", "card");
    }

    public function login()
    {
        $this->view(CUSTOMERS, "", "login");
    }

    public function logout()
    {       
        if(isset($_SESSION[NAMEWEBSITE]["author"])){
            unset($_SESSION[NAMEWEBSITE]["author"]);
        }
        echo "<script>location.assign('login')</script>";
    }
}