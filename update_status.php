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

    $selectWhere = new DB_con();
    $sql = $selectWhere->selectWhere($data_id);
    if ($sql) {

        $row = mysqli_fetch_array($sql);
        // while ($row = mysqli_fetch_array($sql)) {
        $data = $row;
        if (isset($_POST["status"])) {

            $status = $_POST["status"]; // รับค่า status จาก AJAX


            $UpdateDataStatus = new DB_con();
            $sql = $UpdateDataStatus->UpdateDataStatus($data_id, $status);
            if ($sql) {

                if($status == "Free"){
                    $Status_val = " เปลี่ยนเป็น : ว่าง แล้ว";
                }elseif($status == "Booked"){
                    $Status_val = " เปลี่ยนเป็น : จอง แล้ว";
                }elseif($status == "Sold"){
                    $Status_val = " เปลี่ยนเป็น : ขาย แล้ว";
                }

                echo "ห้อง : ". $data["floors"]. "0" . $data["rooms"] .$Status_val;
            } else {
                echo "UpdateDataStatus Error";
            }
            // }
        }
    } else {
        echo "Error ไม่พบข้อมูล ID นี้";
    }
}
    // ทำการเชื่อมต่อฐานข้อมูล MySQL และทำการบันทึกข้อมูล
    // ตามที่ได้แสดงไว้ในตัวอย่างการใช้ PHP กับฐานข้อมูล
    // ...

    // ตัวอย่างเพียงแสดงผลลัพธ์การบันทึกข้อมูล