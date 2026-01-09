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

</body>