<title>
    <%= pageTitle %>
</title>
<?php include 'header.php' ;
// $idlogin = 5;
// $row = getRewardFromAPI($idlogin)
?>



<div class="p-4 sm:ml-64 mt-16 dark:text-white">
    <div class="p-4">
        <div class="grid grid-cols-1 gap-4">

            <div class="w-full text-center bg-neutral-primary-soft rounded-full shadow-xs bg-gray-200 dark:bg-gray-700">
                <p class="mb-6 mt-6 text-base text-body sm:text-lg align-center text-red-400">
                    ตารางแสดงข้อมูลสมุดประวัติที่สามารถสแกนเก็บไฟล์เอกสารได้</p>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-4 p-4">
            <!-- นอกกรอบตาราง -->


            <!-- แก้ไข -->
            <div class="flex flex-col gap-4 p-4
            sm:flex-row sm:items-center sm:justify-between">

    <!-- Dropdown -->
    <div class="w-full sm:w-auto">
        <button id="dropdownDefaultButton"
            data-dropdown-toggle="dropdown"
            type="button"
            class="inline-flex w-full sm:w-auto items-center justify-center
            text-body bg-neutral-secondary-medium border border-default-medium
            hover:bg-neutral-tertiary-medium hover:text-heading
            focus:ring-4 focus:ring-neutral-tertiary shadow-xs
            font-medium rounded-3xl text-sm px-3 py-2">

            ปีสมุดประวัติ
            <svg class="w-4 h-4 ms-1.5" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    d="m19 9-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown"
            class="z-40 hidden bg-white dark:bg-gray-800
            border border-default-medium rounded-base shadow-lg
            w-full sm:w-40 mt-2">
            
            <ul class="p-2 text-sm text-body font-medium">
                <li>
                    <a href="#" class="block p-2 rounded hover:bg-neutral-tertiary-medium">
                        Reward
                    </a>
                </li>
                <li>
                    <a href="#" class="block p-2 rounded hover:bg-neutral-tertiary-medium">
                        Promote
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Search -->
    <div class="relative w-full sm:w-64 md:w-80 lg:w-96 sm:ml-auto">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-body" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
        </div>

        <input type="text"
            class="block w-full ps-9 pe-3 py-2
            bg-neutral-secondary-medium border border-default-medium
            text-heading text-sm rounded-3xl shadow-xs
            placeholder:text-body"
            placeholder="Search">
    </div>

</div>

            <!-- แก้ไข -->

            <div class="w-full text-center bg-neutral-primary-soft shadow-xs bg-gray-200 dark:bg-gray-700 rounded-2xl">


                <!-- ในกรอบตาราง -->
                <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base mt-4">

                    <?php
                    // ดึงข้อมูลจากตาราง
                    
                    // $sql = "SELECT * FROM loginfrom ORDER BY idlogin ASC";
                    // $result = $conn->query($sql);
                    include  './includes/server/get_api.php';

                    $apiUrl = "http://localhost/kpb-profilebook/includes/server/get_api.php";

                    $json = file_get_contents($apiUrl);
                    $data = json_decode($json, true);


                    // ตรวจว่ามีข้อมูลไหม
                    if (!empty($data) && is_array($data)) {
                        ?>
                        <table class="w-full text-sm rtl:text-right text-body dark:text-white text-center">
                            <thead class="bg-neutral-secondary-soft border-b border-default">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        ลำดับ
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        คำนำหน้าชื่อ-นามสกุล
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        หมายเลขประจำตัว 13 หลัก
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        หมายเลขประจำตัว 10 หลัก
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        ข้อมูลสมุดประวัติ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $count = 1; // ตัวนับลำดับ
                                // while ($row = $result->fetch_assoc()) { 
                                foreach ($data as $row) {

                                    ?>
                                    <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default ">
                                        <td class="px-6 py-4">
                                            <?php echo $count++; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['pfname'] . " " . $row['firstname'] . " " . $row['midname'] . " " . $row['lastname'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['idcard'] ?? '-'; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['idnumber'] ?? '-'; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" data-modal-target="book-history"
                                                data-modal-toggle="book-history"
                                                class="font-medium text-fg-brand bg-red-400 rounded-full px-2 py-2 text-white cursor-pointer"
                                                onclick="loadRowData('<?php echo $row['idlogin']; ?>')">สมุดประวัติ
                                            </button>
                                        </td>

                                    </tr>


                                    <?php
                                }
                                ?>




                                <tr class="text-center">
                                    <td class="px-6 py-4">
                                        <div class="relative flex items-center justify-center">
                                            <button type="button" id="decrement-button-1"
                                                data-input-counter-decrement="counter-input-1"
                                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary rounded-full text-sm focus:outline-none h-6 w-6">
                                                <svg class="w-3 h-3 text-heading" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
                                                </svg>
                                            </button>
                                            <input type="text" id="counter-input-1" data-input-counter
                                                class="shrink-0 text-heading border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                                placeholder="" value="12" required />
                                            <button type="button" id="increment-button-1"
                                                data-input-counter-increment="counter-input-1"
                                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary rounded-full text-sm focus:outline-none h-6 w-6">
                                                <svg class="w-3 h-3 text-heading" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                                </svg>
                                            </button>
                                        </div>


                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <?php
                    } else {
                        echo "ไม่มีข้อมูลในฐานข้อมูล";
                    }

                    $conn->close();
                    ?>
                </div>

            </div>
        </div>


        <!-- history -->
        <!-- Main modal -->
        <div id="book-history" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden fixed inset-0 z-50 flex justify-center items-center 
            backdrop-filter overflow-y-auto overflow-x-hidden top-0 right-0 left-0 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-xs bg-white/20 dark:bg-white/50">


            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-2xl shadow-sm p-4 md:p-6 dark:bg-gray-800">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between border-b border-default pb-4 md:pb-5 dark:border-gray-100">
                        <h3 class="text-lg font-medium text-heading dark:text-gray-100">
                            สมุดประวัติ
                        </h3>

                        <button type="button"
                            class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center dark:text-gray-100"
                            data-modal-hide="book-history" id="cancelCloseBtn">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->

                    <form class="mb-2 mt-2" action="includes/server/bookhistorydb.php" method="post"
                        id="bookhistoryForm">


                        <div class="p-4">
                            <label for="idlogin_input" class="block font-medium text-red-400 text-md">
                                ลำดับแถว
                            </label>
                            <div class="mt-2">
                                <input id="idlogin_input" type="text"
                                    class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                    readonly />
                            </div>
                        </div>



                        <div class="space-y-4 md:space-y-6 py-4 md:py-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
                                <div>
                                    <label for="idcard_input" class="block font-medium text-red-400 text-md">
                                        บัตรประชาชน
                                    </label>
                                    <div class="mt-2">
                                        <input id="idcard_input" type="text"
                                            class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                            readonly />
                                    </div>
                                </div>
                                <div>
                                    <label for="idnumber" class="block font-medium text-red-400 text-md">
                                        บัตรประจำตัว 10 หลัก
                                    </label>
                                    <div class="mt-2">
                                        <input id="idnumber" type="text"
                                            class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                            value="<?php echo $row['idnumber']; ?>" disabled />
                                    </div>
                                </div>


                                <div>
                                    <label for="name" class="block font-medium text-red-400 text-md">
                                        ชื่อ-ชื่อกลาง-นามสกุล
                                    </label>
                                    <div class="mt-2">
                                        <input id="name" type="text"
                                            class="w-full rounded-4xl px-4 py-4 text-base text-gray-900 dark:text-gray-100 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 bg-gray-200 dark:bg-gray-700"
                                            value="<?php echo $row['pfname'] . " " . $row['firstname'] . " " . $row['midname'] . " " . $row['lastname']; ?>"
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
                            <button data-modal-hide="book-history" type="submit" class="btn btn-sucess"
                                id="Btnhistory">ยืนยัน</button>
                            <button data-modal-hide="book-history" type="button" class="btn btn-red"
                                id="cancelBtn">ยกเลิก</button>
                        </div>


                    </form>


                </div>
            </div>
        </div>



        <script>
            function loadRowData(idlogin) {
                fetch('includes/server/get_history.php?idlogin=' + idlogin)
                    .then(res => res.json())
                    .then(data => {
                        console.log(data);

                        document.getElementById('idlogin_input').value = data.idlogin ?? '';
                        document.getElementById('idcard_input').value = data.idcard ?? '';
                    });
            }
            document.getElementById('cancelBtn').addEventListener('click', function () {
                document.getElementById('bookhistoryForm').reset();
                document.getElementById('numloginError').textContent = '';
            });
            document.getElementById('cancelCloseBtn').addEventListener('click', function () {
                document.getElementById('bookhistoryForm').reset();
                document.getElementById('numloginError').textContent = '';
            });
        </script>


        <div class="flex items-center justify-center h-48 rounded-base bg-neutral-secondary-soft mb-4">
            <p class="text-fg-disabled">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center h-48 rounded-base bg-neutral-secondary-soft mb-4">
            <p class="text-fg-disabled">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                <p class="text-fg-disabled">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </p>
            </div>
        </div>
    </div>
</div>