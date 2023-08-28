<?php
require_once "./function/function.php";
if (isset($_GET['id'])) {
    $selectedActive = $_GET['id'];

    $selectWhere = new DB_con();
    $sql = $selectWhere->selectWhere($selectedActive);
    $row = mysqli_fetch_array($sql);
    // while ($row = mysqli_fetch_array($sql)) {
        $data = $row;
    // }
    echo json_encode($data);
} else {
    $data = "พังละ repair";
    echo json_encode($data);
}
