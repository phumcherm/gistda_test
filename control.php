<div id="myModal" class="modal">
    <div class=" modal-content">
        <span class="close">&times;</span>
        <input class="w3-input" required disabled id="md_id" type="text" name="md_id">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                ว่าง
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
                จองแล้ว
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option2">
            <label class="form-check-label" for="exampleRadios2">
                ขายแล้ว
            </label>
        </div>
    </div>
</div>

<link rel="stylesheet" href="styles.css">
<div class="container mt-3">
    <h1 class="text-center">Building Map</h1>

    <div style="height: 100px;margin-top: 50px;" class="mx-auto bg-info text-center w-75 p-3">
        <h1>POOL</h1>
    </div>
    <?php
    // ดึงข้อมูลจากฐานข้อมูล
    $selectAll = new DB_con();
    $sql = $selectAll->selectAll();

    $currentFloor = null; // กำหนดตัวแปรเก็บชั้นปัจจุบัน
    while ($row = mysqli_fetch_array($sql)) {
        $floor = $row["floors"];

        // ตรวจสอบชั้นปัจจุบันเป็นชั้นใหม่หรือไม่
        if ($floor != $currentFloor) {
            if ($currentFloor !== null) {
                echo "</div>"; // ปิดแผนผังชั้นที่แสดงก่อนหน้า
            }
            echo "<div class='floor'>";
            echo "<h3 class='text-center mb-0'>Floor $floor</h3>";
            $currentFloor = $floor; // อัปเดตชั้นปัจจุบัน
        }

        if ($row["status"] == "Free") {
            echo "<button onclick='openModal(" . $row["id"] . ")' class='room btn bg-success btn-success col-12 text-center mb-2' title='Zone: " . $row["zone"] . ", Status: " . $row["status"] . "'>" . $row["floors"] . "0" . $row["rooms"] . "</button>";
        } elseif ($row["status"] == "Booked") {
            echo "<button onclick='openModal(" . $row["id"] . ")' class='room btn bg-warning btn-warning col-12 text-center mb-2' title='Zone: " . $row["zone"] . ", Status: " . $row["status"] . "'>" . $row["floors"] . "0" . $row["rooms"] . "</button>";
        } elseif ($row["status"] == "Sold") {
            echo "<button onclick='openModal(" . $row["id"] . ")' class='room btn bg-primary btn-primary col-12 text-center mb-2' title='Zone: " . $row["zone"] . ", Status: " . $row["status"] . "'>" . $row["floors"] . "0" . $row["rooms"] . "</button>";
        } else {
            echo "<button class='room btn col-12 text-center mb-2' title='Zone: " . $row["zone"] . ", Status: " . $row["status"] . "'>" . $row["floors"] . "0" . $row["rooms"] . "</button>";
        }
    }

    if ($currentFloor !== null) {
        echo "</div>"; // ปิดแผนผังชั้นสุดท้าย
    }

    ?>

    <div style="height: 100px;margin-bottom: 50px;" class="mx-auto bg-info text-center w-75 p-3">
        <h1>POOL</h1>
    </div>
    <?
    ?>
</div>

<button id="openModalButton">Open Modal</button>

<button id="openModalButton">Open Modal</button>

<script src="script.js"></script>