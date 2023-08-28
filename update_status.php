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
    $selectedStatus = $_POST["status"]; // รับค่า status จาก AJAX

    // ทำการเชื่อมต่อฐานข้อมูล MySQL และทำการบันทึกข้อมูล
    // ตามที่ได้แสดงไว้ในตัวอย่างการใช้ PHP กับฐานข้อมูล
    // ...

    // ตัวอย่างเพียงแสดงผลลัพธ์การบันทึกข้อมูล
    echo "Data saved successfully!";