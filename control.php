<div id="myModal" class="modal">
    <div class=" modal-content">
        <span class="close">&times;</span>
        <input class="w3-input" required disabled id="md_id" type="text" name="md_id">

        <hr>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Free">
            <label class="form-check-label" for="exampleRadios1">
                ว่าง
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Booked">
            <label class="form-check-label" for="exampleRadios2">
                จองแล้ว
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Sold">
            <label class="form-check-label" for="exampleRadios3">
                ขายแล้ว
            </label>
        </div>
        <hr>
        <div class="mt-auto">
            <button class="btn btn-primary" onclick="saveData()">บันทึก</button>
        </div>

        <div id="result"></div>
    </div>
</div>

<link rel="stylesheet" href="styles.css">
<!-- //////////////////////////////////////////////////////////////////////////// -->
<div class="container mt-3">
    <h1 class="text-center">Building Map</h1>


    <div id="panel">

    </div>

</div>

<script src="script.js"></script>
<script>
    tableTreasury()

    function tableTreasury() {

        // console.log(itemCode)
        // var str_code = "'" + itemCode.join("','") + "'";
        // console.log(str_code)

        var ajax = new XMLHttpRequest();
        // console.log(ajax)
        var method = "GET";
        var url = "select_table.php";
        // var data = "?select_table=";
        var asynchronous = true;

        ajax.open(method, url + "?select_table=1", asynchronous);
        ajax.send();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                var data = JSON.parse(this.responseText);
                console.log(data);

                var html = "";
                var currentFloor = null;
                for (var a = 0; a < data.length; a++) {

                    // var floors = data[a].id;
                    var floors = data[a].floors;
                    var rooms = data[a].rooms;
                    var zone = data[a].zone;
                    var status = data[a].status;

                    if (floors != currentFloor) {
                        if (currentFloor !== null) {
                            html += "</div>"
                        }

                        html += "<div class='floor' style='margin: 5px;'>";
                        html += "<h3 class='text-center mb-0 ' style='width: 200px;' >Floor" + floors + " </h3>";
                        currentFloor = floors;
                    }
                    // console.log(data);
                    let buttonClass = "room btn btn-secondary";
                    switch (status) {
                        case "Free":
                            buttonClass = "room btn btn-success";
                            break;
                        case "Booked":
                            buttonClass = "room btn btn-warning";
                            break;
                        case "Sold":
                            buttonClass = "room btn btn-primary";
                            break;
                        default:
                            break;
                    }

                    html += `<button title='${zone}' onclick='openModal(${data[a].id})' class='${buttonClass}' >${floors}0${rooms}</button>`;

                }

                document.getElementById("panel").innerHTML = html;

            }

        }
    }
</script>