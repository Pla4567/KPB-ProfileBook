<?php
include './../config/server/function.php';
session_start();
$conn = connectDB();
$rowuserfrom = getselectuserfrom();
$rowusertotal = gettotallogin();
?>
<!-- ส่วนเมนู -->
<nav class="fixed top-0 z-40 w-full bg-white border-b border-b-gray-100 dark:bg-gray-700 dark:border-b-gray-800">
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">

        <button data-drawer-target="top-sidebar" data-drawer-toggle="top-sidebar" aria-controls="top-sidebar" type="button" class="sm:hidden text-heading bg-transparent box-border border border-transparent font-medium leading-5 rounded-base text-sm p-2 dark:text-white">
            <span class="sr-only">Open sidebar</span>

               <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
               </svg>


                <!-- <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
                </svg> -->
        </button>

      </div>
        <div class="flex items-center">
            <div class="flex items-center">
                <!-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.193-.538 1.193H5.538c-.538 0-.538-.6-.538-1.193 0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365Zm-8.134 5.368a8.458 8.458 0 0 1 2.252-5.714m14.016 5.714a8.458 8.458 0 0 0-2.252-5.714M8.54 17.901a3.48 3.48 0 0 0 6.92 0H8.54Z"/>
                </svg>
                <span class="text-red-400 -top-2 -right-2 text-xs font-bold px-1.5 py-0.5"><?php
                //  echo $rowusertotal 
                ?></span> -->

                <!-- ปุ่มเปลี่ยนโหมด -->
                <button id="theme-toggle" type="button"
                    class="text-blue-400 dark:text-yellow-500 hover:bg-gray-100 rounded-full text-sm p-2 bg-gray-200 dark:bg-gray-500 btn-mode ms-3">
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

                <!-- <div> -->
                    <button type="button" class="flex text-sm rounded-full hover:bg-gray-100 ms-3 bg-gray-200 dark:bg-gray-500 md:me-0" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <?php $name = $rowuserfrom['firstname'] ?? '';
                        $first = mb_substr($name, 0, 1, "UTF-8");
                        echo '<span class="avatars">' . $first . '</span>'; ?>
                    </button>
                <!-- </div> -->
                <!-- Dropdown menu -->
                    <div class="z-50 hidden bg-white dark:bg-gray-800 shadow-md rounded-xl w-full md:w-95" id="dropdown-user">
                        
                        <div class="px-4 py-3 text-md">
                        <span class="block text-heading font-medium text-center dark:text-gray-100 mt-4">ชื่อ-นามสกุล :
                            <?php echo $rowuserfrom['pfname'] . " " . $rowuserfrom['firstname'] . " " . $rowuserfrom['lastname']; ?>
                            </span>
                            <span class="block text-body truncate mt-4 text-center dark:text-gray-100 mb-2">สถานะเจ้าตัว :
                                <?php echo $rowuserfrom['status']; ?>
                            </span>
                        </div>
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="user-menu-button">
                            <li>
                                <button type="button" data-modal-target="logout-modal" data-modal-toggle="logout-modal"
                                    class="inline-flex items-center w-full p-2 btn btn-red hover:bg-neutral-tertiary-medium hover:text-heading justify-center mb-2 rounded-3xl">ออกจากระบบ</button>
                            </li>
                        </ul>

                    </div>
            </div>
        </div>
    </div>
  </div>
</nav>




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

<!-- ส่วนแถบข้าง -->
 <aside id="top-sidebar" class="fixed top-0 left-0 z-50 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"  aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-red-400 shadow-md rounded-e dark:bg-gray-700">
      <div class="flex items-center ps-2.5 mb-2 mt-2">
         <img src="images/favicon.ico" class="h-7" alt="Flowbite Logo" />
         <span class="self-center text-xl text-heading font-semibold whitespace-nowrap dark:text-red-400 ms-2 text-blue-500">SCRC</span>
         <button type="button" data-drawer-hide="top-sidebar" aria-controls="top-sidebar" class="text-body bg-transparent sm:hidden hover:text-heading hover:bg-neutral-tertiary rounded-base w-9 h-9 absolute end-2.5 flex items-center justify-center text-white">
         <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
         <span class="sr-only">Close menu</span>
         </button>
      </div>
      <div class="border-b dark:border-b-gray-500 border-b-gray-100 p-2"></div>
      <ul class="space-y-4 font-medium mt-4 pt-4 text-white" id="menu">
         <li>
            <a href="indexam.php" class="flex items-center px-2 py-1.5 text-body rounded-base group">
               <svg class="w-9 h-9 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/></svg>
               <span class="ms-3">หน้าหลัก</span>
            </a>
         </li>
         <li>
            <a href="profilebook.php" class="flex items-center px-2 py-1.5 text-body rounded-base group">


               <svg class="shrink-0 w-9 h-9 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
               <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.111 20A3.111 3.111 0 0 1 4 16.889v-12C4 4.398 4.398 4 4.889 4h4.444a.89.89 0 0 1 .89.889v12A3.111 3.111 0 0 1 7.11 20Zm0 0h12a.889.889 0 0 0 .889-.889v-4.444a.889.889 0 0 0-.889-.89h-4.389a.889.889 0 0 0-.62.253l-3.767 3.665a.933.933 0 0 0-.146.185c-.868 1.433-1.581 1.858-3.078 2.12Zm0-3.556h.009m7.933-10.927 3.143 3.143a.889.889 0 0 1 0 1.257l-7.974 7.974v-8.8l3.574-3.574a.889.889 0 0 1 1.257 0Z"/>
               </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">สมุดประวัติ</span>
               <span class="inline-flex items-center justify-center w-6 h-6 ms-2 text-md font-medium text-fg-danger-strong bg-danger-soft border border-danger-subtle rounded-full text-blue-500 border-blue-500 dark:text-red-400 dark:border-red-400"> <?php echo $rowusertotal; ?>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base group">

                    <svg class="shrink-0 w-9 h-9 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19V6a1 1 0 0 1 1-1h4.032a1 1 0 0 1 .768.36l1.9 2.28a1 1 0 0 0 .768.36H16a1 1 0 0 1 1 1v1M3 19l3-8h15l-3 8H3Z"/>
</svg>

                    <!-- <svg class="shrink-0 w-9 h-9 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                    </svg> -->
                    <span class="flex-1 ms-3 whitespace-nowrap">จัดการแฟ้มข้อมูล</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base group">
                    <svg class="shrink-0 w-9 h-9 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">สมุดประวัติของตัวเอง</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-2 py-1.5 text-body rounded-base group">
                    <!-- <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/></svg> -->
                    <svg class="shrink-0 w-9 h-9 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2"
                            d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <!-- <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
               <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
               </svg> -->

                    <span class="flex-1 ms-3 whitespace-nowrap">จัดการผู้ดูแลระบบ</span>
                </a>
            </li>
        </ul>

        <!-- การเปลี่ยนแถบเมนู -->
        <script>
            // หาชื่อไฟล์ของหน้าเว็บปัจจุบัน
            const currentPage = window.location.pathname.split("/").pop() || "indexam.html";
            const links = document.querySelectorAll('#menu a');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    links.forEach(l => l.classList.remove('rounded-full', 'bg-white', 'text-blue-500', 'dark:text-red-400'));
                    link.classList.add('rounded-full', 'bg-white', 'text-blue-500', 'dark:text-red-400');
                });
            });

            // เลือกทุกลิงก์เมนู
            document.querySelectorAll("#menu a").forEach(link => {
                if (link.getAttribute("href") === currentPage) {
                    // เพิ่มคลาส active ของ Tailwind
                    link.classList.add('rounded-full', 'bg-white', 'text-blue-500', 'dark:text-red-400');
                }
            });
        </script>

    </div>
</aside>