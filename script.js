// Get the modal element
const modal = document.getElementById("myModal");

// Get the button that opens the modal
const openModalButton = document.getElementById("openModalButton");

// Get the <span> element that closes the modal
const closeSpan = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
// openModalButton.addEventListener("click", function () {
//   modal.style.display = "block";
// });

// When the user clicks on <span> (x), close the modal
closeSpan.addEventListener("click", function () {
  modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener("click", function (event) {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////
function openModal(id) {
  const modal = document.getElementById("myModal");

  selectActive(id);

  modal.style.display = "block";

  const checkbox1 = document.getElementById("exampleRadios1");
  const checkbox2 = document.getElementById("exampleRadios2");
  const checkbox3 = document.getElementById("exampleRadios3");

  checkbox1.checked = false;
  checkbox2.checked = false;
  checkbox3.checked = false;
}

function selectActive(id) {


  console.log(id)

  var ajax = new XMLHttpRequest();
  // console.log(ajax)
  var method = "GET";
  var url = "select_data.php";
  var data = "?id=" + id;
  var asynchronous = true;

  ajax.open(method, url + data, asynchronous);
  ajax.send();
  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);

      const selectElement = document.getElementById("md_id");
      selectElement.innerHTML = "";

      const checkbox1 = document.getElementById("exampleRadios1");
      const checkbox2 = document.getElementById("exampleRadios2");
      const checkbox3 = document.getElementById("exampleRadios3");

      console.log("id : " + data.id);
      console.log("rooms : " + data.rooms);
      console.log("status : " + data.status);


      // selectElement.value = data.id;

      if (data.status === "Free") {
        selectElement.value = "ห้องนี้ยังว่าง";
        checkbox1.checked = true;
      } else if (data.status === "Booked") {
        selectElement.value = "ห้องนี้จองแล้ว";
        checkbox2.checked = true;
      } else if (data.status === "Sold") {
        selectElement.value = "ห้องนี้ขายแล้ว";
        checkbox3.checked = true;

      } else {
        selectElement.value = "error";
        checkbox1.checked = false;
        checkbox2.checked = false;
        checkbox3.checked = false;
      }


    }

  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function saveData() {
  const selectedStatus = document.querySelector("input[name='exampleRadios']:checked").value;
  const selectedName = document.querySelector("input[name='exampleRadios']:checked").getAttribute("name");


  const formData = new FormData();
  formData.append("status", selectedStatus);
  formData.append("name", selectedName);

  fetch("update_status.php", {
      method: "POST",
      body: formData
  })
  .then(response => response.text())
  .then(response => {
      // แสดง SweetAlert ที่สวยงาม
      Swal.fire({
          icon: "success",
          title: response,
          showConfirmButton: false,
          timer: 1500
      });

      // เคลียร์การเลือกและเคลียร์ค่าใน result
      document.querySelector("input[name='exampleRadios']:checked").checked = false;
      document.getElementById("result").innerHTML = "";
      
  modal.style.display = "none";
  })
  .catch(error => {
      console.error("Error:", error);
  });

  
}





