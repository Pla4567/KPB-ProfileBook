document.addEventListener("DOMContentLoaded", () => {
  const inputElementNumlogin = document.getElementById("numlogin");
  const errorElementNumlogin = document.getElementById("numloginError");
  const indexusForm = document.getElementById("indexusForm");
  const myButtonindexus = document.getElementById("Btnindexus");

  let checknumlogin = false;

  // 🔹 รหัสผ่าน
  // inputElementNumlogin.addEventListener("input", (e) => {
  //   const val = e.target.value.trim();
  //   if (val.length < 6) {
  //     errorElementNumlogin.textContent =
  //       "กรุณากรอกรหัสผ่านใหม่อย่างน้อย 6 ตัวอักษร";
  //     checknumlogin = false;
  //   } else if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/', $new_password)) {
  //     errorElementNumlogin.textContent = "กรุณากรอกรหัสผ่านใหม่ให้ถูกต้อง (อย่างน้อย 8 ตัวอักษร มีตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก และตัวเลข)";
  //     checknumlogin = false;
  //   } else {
  //     errorElementNumlogin.textContent = "";
  //     checknumlogin = true;
  //   }

  //   toggleButtonus();
  // });

  inputElementNumlogin.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    if (val.length < 6) {
      errorElementNumlogin.textContent =
        "กรุณากรอกรหัสผ่านใหม่อย่างน้อย 6 ตัวอักษร";
      checknumlogin = false;
    } else if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/.test(val)) {
      errorElementNumlogin.textContent =
        "รหัสผ่านต้องมีตัวพิมพ์ใหญ่ ตัวพิมพ์เล็ก และตัวเลข";
      checknumlogin = false;
    } else {
      errorElementNumlogin.textContent = "";
      checknumlogin = true;
    }

    toggleButtonus();
  });


  // 🔹 submit
  indexusForm.addEventListener("submit", (e) => {
    if (!checknumlogin) {
      e.preventDefault();
    }
  });

  function toggleButtonus() {
    if (checknumlogin) {
      myButtonindexus.disabled = false;
    } else {
      myButtonindexus.disabled = true;
    }
  }

  myButtonindexus.disabled = true; // เริ่มต้นปิดใช้งานปุ่ม

});

  