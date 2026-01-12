<?php
include './../config/server/function.php';
session_start();
$conn = connectDB();
$rowuserfrom = getselectuserfrom();
?>
<title>
    <%= pageTitle %>
</title>

<!-- Header แบบ Fixed -->
  <header class="fixed top-0 left-0 w-full z-50">
  <!-- <header class="fixed top-0 left-0 w-full bg-white shadow z-50"> -->
<nav class="bg-red-400 start-0 p-4 shadow-md rounded-b-4xl dark:bg-gray-700">
<!-- <nav class="bg-red-400 fixed w-full z-20 top-0 start-0 p-4 shadow-md rounded-b-4xl dark:bg-gray-700"> -->
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="indexus.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="images/favicon.ico" class="h-7" alt="Flowbite Logo" />
            <span class="self-center text-xl text-heading font-semibold whitespace-nowrap text-white dark:text-red-400">SCRC</span>
        </a>
      
        <div class="flex items-center md:order-2 space-x-3 rtl:space-x-reverse">
        <!-- <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"> -->

            <!-- ปุ่มเปลี่ยนโหมด -->
                <button id="theme-toggle" type="button" class="text-blue-400 dark:text-yellow-500 hover:bg-gray-100 rounded-full text-sm p-2 bg-white btn-mode">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

                <script>
                    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
                    var themeToggleBtn = document.getElementById('theme-toggle');

                    // Read theme
                    const theme = localStorage.getItem('color-theme');

                    // Apply theme to DOM
                    if (theme === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }

                    // Correct icon on load
                    if (document.documentElement.classList.contains('dark')) {
                        themeToggleLightIcon.classList.remove('hidden');
                    } else {
                        themeToggleDarkIcon.classList.remove('hidden');
                    }

                    // Toggle event
                    themeToggleBtn.addEventListener('click', function() {
                        themeToggleDarkIcon.classList.toggle('hidden');
                        themeToggleLightIcon.classList.toggle('hidden');

                        if (document.documentElement.classList.contains('dark')) {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        }
                    });
                </script>


                <button type="button"
                    class="flex text-sm bg-neutral-primary rounded-full md:me-0"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>

                    <!-- <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="user photo"> -->

                    <?php $name = $rowuserfrom['firstname'] ?? '';
                    $first = mb_substr($name, 0, 1, "UTF-8");
                    echo '<span class="avatar">'.$first.'</span>';?>

                </button>
        
            <!-- Dropdown menu -->
            <div class="z-50 hidden bg-white shadow-md rounded-xl w-95" id="user-dropdown">
                <div class="px-4 py-3 text-sm">
                    <span class="block text-heading font-medium mt-4">ชื่อ-นามสกุล :
                        <?php echo $rowuserfrom['pfname'] . " " . $rowuserfrom['firstname'] . " " . $rowuserfrom['lastname']; ?></span>
                    <span class="block text-body truncate mt-4 mb-2">สถานะเจ้าตัว : <?php echo $rowuserfrom['status']; ?></span>
                </div>
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="user-menu-button">
                    <li>
                        <button type="button" class="inline-flex items-center w-full p-2 btn btn-red hover:bg-neutral-tertiary-medium hover:text-heading justify-center mb-2 rounded-3xl">ออกจากระบบ</button>
                    </li>
                </ul>
            </div>

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </button>

        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary border-red-400 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-brand rounded md:bg-transparent md:text-fg-brand md:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-heading dark:text-red-400 rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-heading dark:text-red-400 rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-heading dark:text-red-400 rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-heading dark:text-red-400 rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>

    </div>
</nav>
</header>


<!-- ส่วนข้างล่าง -->
<!-- เนื้อหา (เว้น padding-top ให้พ้น header) -->
  <main class="max-w-6xl mx-auto px-4 pt-30 space-y-6">
    <!-- เนื้อหาจำลองให้ยาวพอที่จะเลื่อน -->
    <div class="space-y-6">
      <div class="h-18 bg-gray-300 rounded-2xl">
        <div class="p-4 grid grid-cols-2 gap-4">
            <p>สมุดประวัติ <button class="btn btn-red">ดูไฟล์สแกน</button></p>
        </div>
      </div>

        <div class="h-96 bg-gray-300 rounded-2xl">
            <div class="grid grid-cols-3 gap-4 p-4">
                <div>
                    <label for="id-card" class="block font-medium text-gray-900 text-md">รหัสบัตรประชาชน
                        <div class="mt-2">
                            <input id="idcard" type="text" class="form-input" value="<?php echo $rowuserfrom['idcard'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="id-number" class="block font-medium text-gray-900 text-md">รหัสบัตรประจำตัว 10 หลัก
                        <div class="mt-2">
                            <input id="idnumber" type="text" class="form-input" value="<?php echo $rowuserfrom['idnumber'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="filenumber" class="block font-medium text-gray-900 text-md">แฟ้มข้อมูล
                        <div class="mt-2">
                            <input id="filenumber" type="text" class="form-input" value="<?php echo $rowuserfrom['filenumber'] ?>" readonly/>
                        </div>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 p-4">
                <div>
                    <label for="pfname" class="block font-medium text-gray-900 text-md">คำนำหน้าชื่อ
                        <div class="mt-2">
                            <input id="pfname" type="text" class="form-input" value="<?php echo $rowuserfrom['pfname'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="firstname" class="block font-medium text-gray-900 text-md">ชื่อ
                        <div class="mt-2">
                            <input id="firstname" type="text" class="form-input" value="<?php echo $rowuserfrom['firstname'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="midname" class="block font-medium text-gray-900 text-md">ชื่อกลาง
                        <div class="mt-2">
                            <input id="midname" type="text" class="form-input" value="<?php echo $rowuserfrom['midname'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="lastname" class="block font-medium text-gray-900 text-md">นามสกุล
                        <div class="mt-2">
                            <input id="lastname" type="text" class="form-input" value="<?php echo $rowuserfrom['lastname'] ?>" readonly/>
                        </div>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-4 p-4">
                <div>
                    <label for="birthday" class="block font-medium text-gray-900 text-md">วันเดือนปีเกิด
                        <div class="mt-2">
                            <input id="birthday" type="text" class="form-input" value="<?php echo $rowuserfrom['birthday'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="currentstatus" class="block font-medium text-gray-900 text-md">ประเภท
                        <div class="mt-2">
                            <input id="currentstatus" type="text" class="form-input" value="<?php echo $rowuserfrom['currentstatus'] ?>" readonly/>
                        </div>
                </div>
                <div>
                    <label for="daytype" class="block font-medium text-gray-900 text-md">วันเดือนปี เกษียณ หรือ เสียชีวิต
                        <div class="mt-2">
                            <input id="daytype" type="text" class="form-input" value="<?php echo $rowuserfrom['daytype'] ?>" readonly/>
                        </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 p-4">
                <div>
                    <label for="note" class="block font-medium text-gray-900 text-md">หมายเหตุ
                        <div class="mt-2">
                            <input id="note" type="text" class="form-input" value="<?php echo $rowuserfrom['note'] ?>" readonly/>
                        </div>
                </div>
            </div>

        </div>

      <div class="h-64 bg-gray-300 rounded"></div>
      <div class="h-64 bg-gray-300 rounded"></div>
      <div class="h-64 bg-gray-300 rounded"></div>
      <div class="h-64 bg-gray-300 rounded"></div>
    </div>
  </main>


