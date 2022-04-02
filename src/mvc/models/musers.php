<?php
class musers extends database{

    public function getUsersByUsernameAndPassword($username, $password)
    {
        $query = "select * from users where username = ? and password = ?";
        $parameter = [$username, $password];
        return $this->select($query, $parameter);
    }
}