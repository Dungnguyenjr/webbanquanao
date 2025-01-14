<?php
class db {
    private $host = "localhost";
    private $dbname = "phpnangcao";
    private $username = "root";
    private $password = "";


    public function Connect(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
        $Conn = new PDO($dsn, $this->username, $this->password);
        // Thiết lập chế độ lấy dữ liệu mặc định
        $Conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // Thiết lập chế độ mã hóa
        $Conn->exec("set names utf8");
        return $Conn;
    }
}
