document.addEventListener("DOMContentLoaded", () => {
  const myBtnhistory = document.getElementById("Btnhistory");
  const form = document.getElementById("bookhistoryForm");

  const inputElementCard = document.getElementById("idcard_input");
  const errorElementCard = document.getElementById("IdcardError");

  const inputElementIdnumber = document.getElementById("idnumber_input");
  const errorElementIdnumber = document.getElementById("IdnumberError");

  const inputElementFirstname = document.getElementById("firstname_input");
  const errorElementFirstname = document.getElementById("firstnameError");

  const inputElementMidname = document.getElementById("midname_input");
  const errorElementMidname = document.getElementById("midnameError");

  const inputElementLastname = document.getElementById("lastname_input");
  const errorElementLastname = document.getElementById("lastnameError");

  // const inputElementFullname = document.getElementById("fullname_input");
  // const errorElementFullname = document.getElementById("FullnameError");

  let checkcard = false;
  let checkIdnumber = false;
  let checkFirstname = false;
  let checkMidname = false;
  let checkLastname = false;
  // let checkFullname = false;

  // 🔹 บัตรประชาชน
  inputElementCard.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    // ยังไม่กรอกอะไร → ไม่แจ้งเตือน
    if (val === "") {
      errorElementCard.textContent = "";
      checkcard = true; // หรือ false ตาม logic ปุ่มคุณ
      toggleButton();
      return;
    }

    if (!/^\d+$/.test(val)) {
      errorElementCard.textContent = "บัตรประชาชนต้องเป็นตัวเลขเท่านั้น";
      checkcard = false;
    } else if (val.length === 13) {
      errorElementCard.textContent = "";
      checkcard = true;
    } else {
      errorElementCard.textContent = "ต้องเป็นบัตรประชาชน 13 หลักเท่านั้น";
      checkcard = false;
    }

    toggleButton();
  });

  inputElementIdnumber.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    // ยังไม่กรอกอะไร → ไม่แจ้งเตือน
    if (val === "") {
      errorElementIdnumber.textContent = "";
      checkIdnumber = true; // หรือ false ตาม logic ปุ่มคุณ
      toggleButton();
      return;
    }
    // มีการกรอกแล้ว → เริ่มตรวจ
    if (!/^\d+$/.test(val)) {
      errorElementIdnumber.textContent = "บัตรประจำตัวต้องเป็นตัวเลขเท่านั้น";
      checkIdnumber = false;
    } else if (val.length !== 10) {
      errorElementIdnumber.textContent = "ต้องเป็นบัตรประจำตัว 10 หลักเท่านั้น";
      checkIdnumber = false;
    } else {
      errorElementIdnumber.textContent = "";
      checkIdnumber = true;
    }

    toggleButton();
  });

  //ชื่อจริง
  inputElementFirstname.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    // ยังไม่กรอกอะไร → ไม่แจ้งเตือน
    if (val === "") {
      errorElementFirstname.textContent = "กรุณากรอกชื่อ!";
      checkFirstname = true; // หรือ false ตาม logic ปุ่มคุณ
    } else if (!/^[ก-๙\s]+$/.test(val)) {
      errorElementFirstname.textContent = "ชื่อต้องเป็นตัวอักษรไทยเท่านั้น";
      checkFirstname = false;
    } else {
      errorElementFirstname.textContent = "";
      checkFirstname = false;
    }

    toggleButton();
  });

  // ชื่อกลาง
  inputElementMidname.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    // ยังไม่กรอกอะไร → ไม่แจ้งเตือน
    if (val === "") {
      errorElementMidname.textContent = "";
      checkMidname = true; // หรือ false ตาม logic ปุ่มคุณ
      toggleButton();
      return;
    }
    // มีการกรอกแล้ว → เริ่มตรวจ
    if (!/^[ก-๙\s]+$/.test(val)) {
      errorElementMidname.textContent = "ชื่อกลางต้องเป็นตัวอักษรไทยเท่านั้น";
      checkMidname = false;
    } else {
      errorElementMidname.textContent = "";
      checkMidname = true;
    }

    toggleButton();
  });

  // นามสกุล
  inputElementLastname.addEventListener("input", (e) => {
    const val = e.target.value.trim();

    // ยังไม่กรอกอะไร → ไม่แจ้งเตือน
    // ยังไม่กรอกอะไร → ไม่แจ้งเตือน
    if (val === "") {
      errorElementLastname.textContent = "กรุณากรอกนามสกุล!";
      checkLastname = true; // หรือ false ตาม logic ปุ่มคุณ
    }
    // มีการกรอกแล้ว → เริ่มตรวจ
    else if (!/^[ก-๙\s]+$/.test(val)) {
      errorElementLastname.textContent = "นามสกุลต้องเป็นตัวอักษรไทยเท่านั้น";
      checkLastname = false;
    } else {
      errorElementLastname.textContent = "";
      checkLastname = true;
    }

    toggleButton();
  });

  form.addEventListener("submit", (e) => {
    if (!(checkcard && checkIdnumber && checkFirstname && checkMidname && checkLastname)) {
      e.preventDefault();
    }
  });

  function toggleButton() {
    myBtnhistory.disabled = !(
      checkcard &&
      checkIdnumber &&
      checkFirstname &&
      checkMidname && checkLastname
    );
  }

  myBtnhistory.disabled = true;
});