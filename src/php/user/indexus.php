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
    <nav class="bg-red-400 start-0 p-4 shadow-md rounded-b-4xl dark:bg-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="images/favicon.ico" class="h-7" alt="Flowbite Logo" />
                <span
                    class="self-center text-xl text-heading font-semibold whitespace-nowrap text-white dark:text-red-400">SCRC</span>
            </div>

            <div class="flex items-center md:order-2 space-x-3 rtl:space-x-reverse">

                <!-- ปุ่มเปลี่ยนโหมด -->
                <button id="theme-toggle" type="button"
                    class="text-blue-400 dark:text-yellow-500 hover:bg-gray-100 rounded-full text-sm p-2 bg-white btn-mode">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
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
                    themeToggleBtn.addEventListener('click', function () {
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


                <button type="button" class="flex text-sm bg-neutral-primary rounded-full md:me-0" id="user-menu-button"
                    aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>

                    <?php $name = $rowuserfrom['firstname'] ?? '';
                    $first = mb_substr($name, 0, 1, "UTF-8");
                    echo '<span class="avatar">' . $first . '</span>'; ?>

                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden bg-white dark:bg-gray-800 shadow-md rounded-xl w-full md:w-95"
                    id="user-dropdown">
                    <div class="px-4 py-3 text-md">
                        <span class="block text-heading font-medium text-center dark:text-gray-100 mt-4">ชื่อ-นามสกุล :
                            <?php echo $rowuserfrom['pfname'] . " " . $rowuserfrom['firstname'] . " " . $rowuserfrom['lastname']; ?></span>
                        <span class="block text-body truncate mt-4 text-center dark:text-gray-100 mb-2">สถานะเจ้าตัว :
                            <?php echo $rowuserfrom['status']; ?></span>
                    </div>
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="user-menu-button">
                        <li>
                            <button type="button" data-modal-target="logout-modal" data-modal-toggle="logout-modal"
                                class="inline-flex items-center w-full p-2 btn btn-red hover:bg-neutral-tertiary-medium hover:text-heading justify-center mb-2 rounded-3xl">ออกจากระบบ</button>
                        </li>
                    </ul>
                </div>

                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>

            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary border-red-400 dark:border-gray-700 justify-center items-center">

                    <li>
                        <a href="indexus.php"
                            class="block py-2 px-3 text-white bg-brand rounded md:bg-transparent md:text-fg-brand md:p-0"
                            aria-current="page">หน้าแรก</a>
                    </li>

                    <li>
                        <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                            class="py-2 px-3 text-heading dark:text-red-400 box-border border border-transparent hover:bg-brand-strong shadow-xs font-medium leading-5 rounded-3xl text-sm focus:outline-none cursor-pointer bg-white dark:bg-gray-800"
                            type="button">รหัสผ่าน</button>
                    </li>

                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-heading dark:text-red-400 rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">ติดต่อ</a>
                    </li>

                    <!-- <li>
                        <button id="logoutBtn"
                            class="py-2 px-3 text-heading box-border border border-transparent hover:bg-brand-strong shadow-xs font-medium leading-5 rounded-3xl text-sm focus:outline-none cursor-pointer bg-white text-red-400 dark:text-white dark:bg-red-700">ออกจากระบบ</button>
                    </li> -->
                    <!-- <script>
                             document.getElementById('logoutBtn').addEventListener('click', function() {
                                // แสดงข้อความยืนยันก่อนออกจากระบบ
                                if (confirm("คุณต้องการออกจากระบบใช่หรือไม่?")) {
                                    // ถ้าผู้ใช้กด "ตกลง" (OK)
                                    window.location.href = 'logout.php'; // เปลี่ยน URL ไปยัง logout.php
                                } else {
                                    // ถ้าผู้ใช้กด "ยกเลิก" (Cancel)
                                    // ไม่ต้องทำอะไร หรือแสดงข้อความอื่น
                                    // console.log("ยกเลิกการออกจากระบบ");
                                }
                            }); 
                    </script> -->

                </ul>
            </div>

        </div>
    </nav>
</header>


<!-- ยืนยันการออกจากระบบ -->
<!-- Main modal -->
        <div id="logout-modal" tabindex="-1"
            class="hidden fixed inset-0 z-50 flex overflow-x-hidden justify-center items-center backdrop-filter overflow-y-auto top-0 right-0 left-0 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-xs bg-white/20 dark:bg-white/50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative rounded-2xl bg-white dark:bg-gray-800 shadow-sm p-4 md:p-6">
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>


                        <h3 class="mb-4 text-body dark:text-white">คุณต้องการออกจากระบบใช่หรือไม่?</h3>
                        <div class="flex items-center space-x-4 justify-center mt-2">

                        <form action="logout.php" method="post">
                            <button data-modal-hide="logout-modal" type="submit" class="btn btn-sucess"
                                id="logoutButton">ยืนยัน</button>
                        </form>

                            <button data-modal-hide="logout-modal" type="button" class="btn btn-red">ยกเลิก</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('logoutButton').addEventListener('click', function () {
                // แสดงข้อความยืนยันก่อนออกจากระบบ
                // if (confirm("คุณต้องการออกจากระบบใช่หรือไม่?")) {
                // ถ้าผู้ใช้กด "ตกลง" (OK)
                window.location.href = 'logout.php'; // เปลี่ยน URL ไปยัง logout.php
                // } else {
                // ถ้าผู้ใช้กด "ยกเลิก" (Cancel)
                // ไม่ต้องทำอะไร หรือแสดงข้อความอื่น
                // console.log("ยกเลิกการออกจากระบบ");
                // }
            });
        </script>



<!-- ส่วนข้างล่าง -->
<!-- เนื้อหา (เว้น padding-top ให้พ้น header) -->
<main class="max-w-6xl mx-auto px-4 pt-30 space-y-6">
    <!-- เนื้อหาจำลองให้ยาวพอที่จะเลื่อน -->
    <div class="space-y-6 mt-6">

        <?php if (!empty(trim($rowuserfrom['filenumber']))): ?>

            <div class="w-full bg-gray-50 dark:bg-gray-700 rounded-2xl mx-auto p-4">
                <div class="flex items-center justify-between">
                    <p class="text-base font-medium text-gray-800 dark:text-gray-100">สมุดประวัติ</p>
                    <!-- <button
                        class="bg-red-400 text-white hover:bg-red-500 border border-transparent shadow-xs font-medium rounded-3xl text-xs px-4 py-2 cursor-pointer">
                        ดูสมุดประวัติ
                    </button> -->
                    <a href="includes/server/filebook.php?filename=<?= $rowuserfrom['idcard'] ?? $rowuserfrom['idnumber'];  ?>"
                        class="bg-red-400 text-white hover:bg-red-500 border border-transparent shadow-xs font-medium rounded-3xl text-xs px-4 py-2 cursor-pointer">
                        ดูสมุดประวัติ
                    </a>
                </div>
            </div>

            <div class="w-full bg-gray-50 dark:bg-gray-700 rounded-2xl mx-auto p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">

                    <div>
                        <label for="id-card" class="block font-medium text-red-400 text-md">
                            รหัสบัตรประชาชน
                        </label>
                        <div class="mt-2">
                            <input id="idcard" type="text"
                                class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                value="<?php echo $rowuserfrom['idcard'] ?? '-'; ?>" disabled />
                        </div>
                    </div>

                    <div>
                        <label for="id-number" class="block font-medium text-red-400 text-md">
                            รหัสบัตรประจำตัว 10 หลัก
                        </label>
                        <div class="mt-2">
                            <input id="idnumber" type="text"
                                class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                value="<?php echo $rowuserfrom['idnumber'] ?? '-'; ?>" disabled />
                        </div>
                    </div>

                    <div>
                        <label for="filenumber" class="block font-medium text-red-400 text-md">
                            แฟ้มข้อมูล
                        </label>
                        <div class="mt-2">
                            <input id="filenumber" type="text"
                                class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                value="<?php echo $rowuserfrom['filenumber'] ?>" disabled />
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                    <div>
                        <label for="pfname" class="block font-medium text-red-400 text-md">คำนำหน้าชื่อ
                            <div class="mt-2">
                                <input id="pfname" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $rowuserfrom['pfname'] ?>" disabled />
                            </div>
                    </div>
                    <div>
                        <label for="firstname" class="block font-medium text-red-400 text-md">ชื่อ
                            <div class="mt-2">
                                <input id="firstname" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $rowuserfrom['firstname'] ?>" disabled />
                            </div>
                    </div>
                    <div>
                        <label for="midname" class="block font-medium text-red-400 text-md">ชื่อกลาง
                            <div class="mt-2">
                                <input id="midname" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $rowuserfrom['midname'] ?? '-'; ?>" disabled />
                            </div>
                    </div>
                    <div>
                        <label for="lastname" class="block font-medium text-red-400 text-md">นามสกุล
                            <div class="mt-2">
                                <input id="lastname" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $rowuserfrom['lastname'] ?>" disabled />
                            </div>
                    </div>
                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                    <?php
                    // สมมติว่าเชื่อมต่อฐานข้อมูลแล้วและได้ค่า $result
                    // ตัวอย่าง: $row['date_column'] = '2025-12-31';
                    $date_birthday = $rowuserfrom['birthday']; // ค่าที่ดึงจาก MySQL
                    $timestamp = strtotime($date_birthday); // แปลงเป็น Timestamp
                    $year_th = (int) date('Y', $timestamp) + 543; // คำนวณปี พ.ศ.
                    $date_th_birthday = date('d', $timestamp) . '-' . date('m', $timestamp) . '-' . $year_th; // รูปแบบไทย
                    ?>
                    <div>
                        <label for="birthday" class="block font-medium text-red-400 text-md">วันเดือนปีเกิด
                            <div class="mt-2">
                                <input id="birthday" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $date_th_birthday ?>" disabled />
                            </div>
                    </div>

                    <?php
                    $currentstatus = [
                        0 => 'เสียชีวิต',
                        1 => 'มีชีวิต',
                        2 => 'เกษียณ',
                        3 => 'ไม่พบข้อมูลในกลมบัญชีกลาง',
                    ];
                    // สมมติว่า $row['status_id'] คือค่าที่ดึงจาก DB (ตัวเลข)
                    $current_status = $currentstatus[$rowuserfrom['currentstatus']] ?? 'ไม่ทราบสถานะ'; // ใช้ ?? สำหรับค่าเริ่มต้น
                    ?>
                    <div>
                        <label for="currentstatus" class="block font-medium text-red-400 text-md">ประเภท
                            <div class="mt-2">
                                <input id="currentstatus" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $current_status ?>" disabled />
                            </div>
                    </div>


                    <?php
                    // สมมติว่าเชื่อมต่อฐานข้อมูลแล้วและได้ค่า $result
                    // ตัวอย่าง: $row['date_column'] = '2025-12-31';
                    $date_eng = $rowuserfrom['daytype']; // ค่าที่ดึงจาก MySQL
                    $timestamp = strtotime($date_eng); // แปลงเป็น Timestamp
                    $year_th = (int) date('Y', $timestamp) + 543; // คำนวณปี พ.ศ.
                    $date_th_display = date('d', $timestamp) . '-' . date('m', $timestamp) . '-' . $year_th; // รูปแบบไทย
                    ?>
                    <div>
                        <label for="daytype" class="block font-medium text-red-400 text-md">วันเดือนปี เกษียณ หรือ
                            เสียชีวิต
                            <div class="mt-2">
                                <input id="daytype" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo htmlspecialchars($date_th_display ?? '-'); ?>" disabled />
                            </div>
                    </div>



                </div>

                <div class="grid grid-cols-1 gap-4 p-4">
                    <div>
                        <label for="note" class="block font-medium text-red-400 text-md">หมายเหตุ
                            <div class="mt-2">
                                <input id="note" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-800"
                                    value="<?php echo $rowuserfrom['note'] ?? '-'; ?>" disabled />
                            </div>
                    </div>
                </div>

            </div>
        <?php endif; ?>


        <?php if (empty(trim($rowuserfrom['filenumber']))): ?>
            <div class="w-full bg-gray-50 dark:bg-gray-700 rounded-2xl mx-auto p-4">
                <p class="text-center text-red-400">ไม่มีสมุดประวัตินอกประจำการ</p>
            </div>
        <?php endif; ?>
    </div>
</main>



    <!-- Main modal รหัสผ่าน -->
    <!-- Main modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center 
            backdrop-filter overflow-y-auto overflow-x-hidden top-0 right-0 left-0 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-xs bg-white/20 dark:bg-white/50">


        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow-sm p-4 md:p-6 dark:bg-gray-800">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between border-b border-default pb-4 md:pb-5 dark:border-gray-100">
                    <h3 class="text-lg font-medium text-heading dark:text-gray-100">
                        แก้ไขรหัสผ่าน
                    </h3>
                    <button type="button"
                        class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center dark:text-gray-100"
                        data-modal-hide="static-modal" id="cancelCloseBtn">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="mb-2 mt-2" action="includes/server/indexusdb.php" method="post" id="indexusForm">
                    <div class="space-y-4 md:space-y-6 py-4 md:py-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 p-4">

                            <div hidden>
                                <label for="idcard" class="block font-medium text-red-400 text-md">
                                    บัตรประชาชน
                                </label>
                                <div class="mt-2">
                                    <input id="idcard" type="text"
                                        class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                        value="<?php echo $rowuserfrom['idcard']; ?>" disabled />
                                </div>
                            </div>
                            <div hidden>
                                <label for="idnumber" class="block font-medium text-red-400 text-md">
                                    บัตรประจำตัว 10 หลัก
                                </label>
                                <div class="mt-2">
                                    <input id="idnumber" type="text"
                                        class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                        value="<?php echo $rowuserfrom['idnumber']; ?>" disabled />
                                </div>
                            </div>


                            <div>
                                <label for="name" class="block font-medium text-red-400 text-md">
                                    ชื่อ-ชื่อกลาง-นามสกุล
                                </label>
                                <div class="mt-2">
                                    <input id="name" type="text"
                                        class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                        value="<?php echo $rowuserfrom['pfname'] . " " . $rowuserfrom['firstname'] . " " . $rowuserfrom['midname'] . " " . $rowuserfrom['lastname']; ?>"
                                        disabled />
                                </div>
                            </div>

                            <div>
                                <label for="numlogin" class="block font-medium text-red-400 text-md">
                                    รหัสผ่านใหม่
                                </label>
                                <div class="mt-2 mb-2">
                                    <input id="numlogin" type="text" name="numlogin"
                                        class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 border-gray-800 border focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-white dark:bg-gray-700" />
                                </div>
                                <span id="numloginError" class="text-red-500"></span>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex border-t border-default space-x-4 pt-4 md:pt-5 justify-center items-center dark:border-gray-100">
                        <button data-modal-hide="static-modal" type="submit" class="btn btn-sucess"
                            id="Btnindexus">แก้ไขรหัสผ่าน</button>
                        <button data-modal-hide="static-modal" type="button" class="btn btn-red" id="cancelBtn">ยกเลิก</button>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('cancelBtn').addEventListener('click', function () {
            document.getElementById('indexusForm').reset();
            document.getElementById('numloginError').textContent = '';
        });
        document.getElementById('cancelCloseBtn').addEventListener('click', function () {
            document.getElementById('indexusForm').reset();
            document.getElementById('numloginError').textContent = '';
        });
    </script>


    <?php
    if (isset($_SESSION['success_password']) && $_SESSION['success_password'] === true): {
            ?>

            <div id="password-modal" tabindex="-1"
                class="fixed inset-0 z-50 flex overflow-x-hidden justify-center items-center backdrop-filter overflow-y-auto top-0 right-0 left-0 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-xs bg-white/20 dark:bg-white/50">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative rounded-2xl bg-white dark:bg-gray-800 shadow-sm p-4 md:p-6">
                        <div class="p-4 md:p-5 text-center">

                            <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12 text-green-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <h3 class="mb-4 text-body dark:text-white">แก้ไขรหัสผ่าน เรียบร้อย</h3>
                            <div class="flex items-center space-x-4 justify-center mt-2">
                                <button data-modal-hide="password-modal" type="button" class="btn btn-sucess">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.querySelector('[data-modal-hide="password-modal"]').addEventListener('click', function () {
                        document.getElementById('password-modal').classList.add('hidden');
                    });
                </script>

            </div>



            <?php
            unset($_SESSION['success_password']);
        }
    endif; ?>



    <?php
    if (isset($_SESSION['success_login']) && $_SESSION['success_login'] === true): {
            ?>

            <div id="popup-modal" tabindex="-1"
                class="fixed inset-0 z-50 flex overflow-x-hidden justify-center items-center backdrop-filter overflow-y-auto top-0 right-0 left-0 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-xs bg-white/20 dark:bg-white/50">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative rounded-2xl bg-white dark:bg-gray-800 shadow-sm p-4 md:p-6">
                        <div class="p-4 md:p-5 text-center">

                            <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12 text-green-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <h3 class="mb-4 text-body dark:text-white">ยินดีตอนรับเข้าระบบ จัดเก็บและสแกนสมุดประวัตินอกประจำการ
                            </h3>
                            <div class="flex items-center space-x-4 justify-center mt-2">
                                <button data-modal-hide="popup-modal" type="button" class="btn btn-sucess">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.querySelector('[data-modal-hide="popup-modal"]').addEventListener('click', function () {
                        document.getElementById('popup-modal').classList.add('hidden');
                    });
                </script>
            </div>

            <?php
            unset($_SESSION['success_login']);
        }
    endif;
    ?>