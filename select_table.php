<?php
require_once "./function/function.php";
if (isset($_GET['select_table'])) {
    // $selectedActive = $_GET['id'];

    $selectAll = new DB_con();
    $sql = $selectAll->selectAll();
    // $row = mysqli_fetch_array($sql);
    while ($row = mysqli_fetch_array($sql)) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    $data[] = "พังละ repair";
    echo json_encode($data);
}
