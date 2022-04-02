<?php
class users extends controller
{
    private $users;

    public function __construct()
    {
        $this->users = $this->model("musers");
    }

    public function getUsersByUsernameAndPassword()
    {
        $username = $this->getValue(1, "username", "");
        $password = $this->getValue(1, "password", "");
        $users = $this->users->getUsersByUsernameAndPassword($username, $password);
        if (count($users) > 0) {
            $user = $users[0];
            $_SESSION['hangnoidianhat']['author'] = [
                "id" => $user["id"],
                "name" => $user["name"],
                "username" => $user["username"],
                "type" => $user["type"],
            ];
        }
        echo json_encode($users);
    }
}
