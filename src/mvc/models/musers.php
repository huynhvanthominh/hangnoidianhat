<?php
class musers extends database
{

    public function getUsersByUsername($username)
    {
        $query = "select * from users where username = ?";
        $parameter = [$username];
        return $this->select($query, $parameter);
    }

    public function getUsersByUsernameAndPassword($username, $password)
    {
        $query = "select * from users where username = ? and password = ?";
        $parameter = [$username, $password];
        return $this->select($query, $parameter);
    }

    public function add($id, $username, $password, $name, $role, $salt)
    {
        $query = "INSERT INTO users(id, username, password, name, role, salt) VALUES (?, ?, ?, ?, ?, ?)";
        $parameter = [$id, $username, $password, $name, $role, $salt];
        return $this->save($query, $parameter);
    }
}
