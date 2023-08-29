<?php
require_once "./function/function.php";
// if (isset($_POST["data"])) {
//     $data = $_POST["data"];
//     // ทำตามขั้นตอนเพื่อบันทึก $data ลงฐานข้อมูล
//     // ...

//     echo "Data saved successfully!";
// } else {
//     echo "Data not received.";
// }
if (isset($_POST["data_id"])) {
    $data_id = $_POST["data_id"];
    if (isset($_POST["status"])) {

        $status = $_POST["status"]; // รับค่า status จาก AJAX


        $UpdateDataStatus = new DB_con();
        $sql = $UpdateDataStatus->UpdateDataStatus($data_id, $status);
        if ($sql) {

            $selectWhere = new DB_con();
            $sql = $selectWhere->selectWhere($data_id);
            if ($sql) {

                $row = mysqli_fetch_array($sql);
                $data = $row;

                echo "ชั้น : " . $data["floors"] . " | ห้อง : " . $data["floors"] . "0" . $data["rooms"] . " | ZONE : " . $data["zone"] ;
                
            } else {
                echo "Error ไม่พบข้อมูล ID นี้";
            }
        } else {
            echo "UpdateDataStatus Error";
        }
        // }
    }
}
    // ทำการเชื่อมต่อฐานข้อมูล MySQL และทำการบันทึกข้อมูล
    // ตามที่ได้แสดงไว้ในตัวอย่างการใช้ PHP กับฐานข้อมูล
    // ...

    // ตัวอย่างเพียงแสดงผลลัพธ์การบันทึกข้อมูล