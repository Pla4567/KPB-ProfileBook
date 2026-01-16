<?php 
include './../config/server/function.php';
session_start(); 
$conn = connectDB();
?>

<title><%= pageTitle %></title>

<body>

    <div class="background-login">
        <div class="bg-red-400 shadow-md rounded-b-4xl p-30 justify-content-center align-center">
            <p class="text-center text-2xl sm:text-xl md:text-2xl text-white">Welcome | ระบบสแกนและจัดเก็บสมุดประวัตินอกประจำการ</p>
        </div>
        
        <div class="w-full mx-auto max-w-md overflow-hidden rounded-xl bg-white md:max-w-2xl mt-15 p-20">

            <form class="mb-2 mt-2" action="includes/server/logindb.php" method="post" id="loginForm">
                <div class="col-span-full mb-4">
                    <label for="id-card" class="block font-medium text-gray-900 text-lg">รหัสบัตรประชาชน หรือ รหัสบัตรประจำตัว 10 หลัก</label>
                    <div class="mt-2">
                        <!-- ช่องกรอก -->
                        <input id="idcard" type="text" name="idcard" autocomplete="id-card" class="form-input" placeholder="รหัสบัตรประชาชน หรือ รหัสบัตรประจำตัว 10 หลัก"/>
                    </div>
                    <span id="IdcardError" class="text-red-500"></span>
                </div>
                
                <div class="col-span-full mt-2">
                    <label for="num-login" class="block font-medium text-gray-900 text-lg">รหัสเข้าระบบ</label>
                    <div class="mt-2">
                        <input id="numlogin" type="text" name="numlogin" autocomplete="id-number" class="form-input" placeholder="รหัสเข้าระบบ"/>
                    </div>
                    <span id="numloginError" class="text-red-500"></span>
                </div>
                
                <div class="mt-4 text-center">
                    <button class="btn btn-red" type="submit" id="Btnlogin">เข้าสู่ระบบ</button>
                </div>
            </form>
            
        </div>
    </div>

    <?php
    if (isset($_SESSION['erorr_login']) && $_SESSION['erorr_login'] === true): {
            ?>

            <div id="password-modal" tabindex="-1" class="fixed inset-0 z-50 flex overflow-x-hidden justify-center items-center backdrop-filter overflow-y-auto top-0 right-0 left-0 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-xs bg-white/20 dark:bg-white/50">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative rounded-2xl bg-white dark:bg-gray-800 shadow-sm p-4 md:p-6">
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12 text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>

                            <h3 class="mb-4 text-body dark:text-white">ไม่พบข้อมูล กรุณาลองใหม่</h3>
                            <div class="flex items-center space-x-4 justify-center mt-2">
                                <button data-modal-hide="password-modal" type="button" class="btn btn-red">ตกลง</button>
                            </div>
                        </div>
                    </div>
                </div>

                        <script>
                document.querySelector('[data-modal-hide="password-modal"]').addEventListener('click', function() {
                document.getElementById('password-modal').classList.add('hidden');
            });
            </script>

            </div>

            <?php
            unset($_SESSION['erorr_login']);
        }
    endif; ?>

</body>