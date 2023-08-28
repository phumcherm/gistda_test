<?php

define('DB_SERVER', '172.18.0.1:9906');
define('DB_USER', 'gistda_test_db');
define('DB_PASS', '12345678');
define('DB_NAME', 'gistda_test_db');

class DB_con
{
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    function selectAll()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM gistda_test_db.gistda order by id desc;");
        return $result;
    }

    function selectWhere($id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM gistda_test_db.gistda where id = $id;");
        return $result;
    }
}
