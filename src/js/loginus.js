document.addEventListener("DOMContentLoaded", () => {
  const inputElementCard = document.getElementById("idcard");
  const errorElementCard = document.getElementById("IdcardError");

  const inputElementNumber = document.getElementById("numlogin");
  const errorElementNumber = document.getElementById("numloginError");

  const form = document.getElementById("loginForm");
  const myButtonlogin = document.getElementById("Btnlogin");

  let checkcard = false;
  let checknumber = false;

  // 🔹 บัตรประชาชน
  inputElementCard.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    if (val === "") {
      errorElementCard.textContent = "กรุณากรอก รหัสบัตรประชาชน หรือ รหัสบัตรประจำตัวเท่านั้น!";
      checkcard = false;
    } else if (!/^\d+$/.test(val)) {
      errorElementCard.textContent = "รหัสต้องเป็นตัวเลขเท่านั้น";
      checkcard = false;
    } else if (val.length === 13 || val.length === 10) {
      errorElementCard.textContent = "";
      checkcard = true;
    } else {
      errorElementCard.textContent = "ต้องเป็นรหัสบัตรประชาชน 13 หลัก หรือ รหัสบัตรประจำตัว 10 หลักเท่านั้น";
      checkcard = false;
    }

    toggleButton();
  });

  // 🔹 รหัสประจำตัว
  inputElementNumber.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    if (val === "") {
      errorElementNumber.textContent = "กรุณากรอกรหัสผ่าน!";
      checknumber = false;
    } else if (val.length < 6) {
      errorElementNumber.textContent =
        "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร";
      checknumber = false;
    } else {
      errorElementNumber.textContent = "";
      checknumber = true;
    }

    toggleButton();
  });

  // 🔹 submit
  form.addEventListener("submit", (e) => {
    if (!(checkcard && checknumber)) {
      e.preventDefault(); // ❌ ไม่ผ่าน → ไม่ส่ง
    }
  });

  // 🔹 เปิด / ปิดปุ่ม
  function toggleButton() {
    myButtonlogin.disabled = !(checkcard && checknumber);
  }

  // เริ่มต้นปิดปุ่ม
  myButtonlogin.disabled = true;

});

