<?php
require "./src/config/role.php";
require "./src/config/varible.php";
class users extends controller
{
    private $users;

    public function __construct()
    {
        $this->users = $this->model("musers");
    }

    public function getUsersByUsernameAndPassword()
    {
        $result = [
            "login" => false,
            "message" => "Sai tài khoản hoặc mật khẩu!",
            "user" => []
        ];
        $username = $this->getValue(1, "username", "");
        $password = $this->getValue(1, "password", "");
        $users = $this->users->getUsersByUsername($username);
        if (count($users) > 0) {
            $user = $users[0];
            if (strcmp($user["password"], md5($user["salt"] . $password . $user["id"] . SALT)) === 0) {
                $result =  [
                    "login" => true,
                    "message" => "Đăng nhập thành công!",
                    "user" => [
                        "id" => $user["id"],
                        "name" => $user["name"],
                        "username" => $user["username"],
                        "role" => $user["role"],
                    ]
                ];
                $_SESSION['hangnoidianhat']['author'] = [
                    "id" => $user["id"],
                    "name" => $user["name"],
                    "username" => $user["username"],
                    "role" => $user["role"],
                ];
            }
        }
        echo json_encode($result);
    }

    public function add()
    {
        $result = [
            "num" => 0,
            "message" => "Đã tồn tại tài khoản!"
        ];
        $id = "user" . time();
        $username = $this->getValue(1, "username", "");
        $user = $this->users->getUsersByUsername($username);
        if (count($user) === 0) {
            $password = $this->getValue(1, "password", "");
            $name = $this->getValue(1, "name", "");
            $role = ROLE["CUSTOMERS"];
            $salt = bin2hex(random_bytes(32));
            $password = md5($salt . $password . $id . SALT);
            $row = $this->users->add($id, $username, $password, $name, $role, $salt);
            if ($row > 0) {
                $result = [
                    "num" => $row,
                    "id" => $id,
                    "username" => $username,
                    "name" => $name,
                    "role" => $role,
                    "salt" => $salt,
                    "message" => "Đăng ký thành công!",
                ];
            } else {
                $result["message"] = "Đăng ký thất bại!";
            }
        }
        echo json_encode($result);
    }
}
