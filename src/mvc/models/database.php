<?php
require_once "./src/config/database.php";
class database
{
    private $hostname = HOSTNAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $database = DATABASE;
    private $charset  = CHARSET;

    private function connect()
    {
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        if ($conn) {
            mysqli_set_charset($conn, $this->charset);
        }
        return $conn;
    }

    protected function select($query, $parameter = null)
    {
        $data = [];
        $conn = $this->connect();
        $stmt = mysqli_prepare($conn, $query);
        if($stmt){
            if(mysqli_stmt_bind_param($stmt, $this->getTypeParameter($parameter), ...$parameter)){
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    while($item = mysqli_fetch_assoc($result)){
                        array_push($data, $item);
                    }
                }
            }
        }
        return $data;
    }

    protected function save($query, $parameter){
        $row = -1;
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        if($stmt){
            if(mysqli_stmt_bind_param($stmt, $this->getTypeParameter($parameter), ...$parameter)){
                if(mysqli_stmt_execute($stmt)){
                    $row = $stmt->affected_rows;
                }
            } 
        }
        return $row;
    }

    protected function getTypeParameter($parameter)
    {
        $result = "";
        foreach ($parameter as $item) {
            if (strcmp(gettype($item), "boolean") === 0) {
                $result .= "b";
            } else if (strcmp(gettype($item), "integer") === 0) {
                $result .= "i";
            } else if (strcmp(gettype($item), "string") === 0) {
                $result .= "s";
            } else if (strcmp(gettype($item), "double") === 0) {
                $result .= "d";
            }
        }
        return $result;
    }
}
