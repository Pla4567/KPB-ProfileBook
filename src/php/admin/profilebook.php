<title>
    <%= pageTitle %>
</title>
<?php include 'header.php' ?>

<div class="p-4 sm:ml-64 mt-16 dark:text-white">
    <div class="p-4 border-1 border-default border-dashed rounded-base">
        <div class="grid grid-cols-1 gap-4">

            <div class="w-full text-center bg-neutral-primary-soft rounded-full shadow-xs bg-gray-200 dark:bg-gray-700">
                <!-- <h5 class="mb-3 text-2xl tracking-tight font-semibold text-heading">Work fast from anywhere</h5> -->
                <p class="mb-6 mt-6 text-base text-body sm:text-lg align-center text-red-400">
                    ตารางแสดงข้อมูลสมุดประวัติที่สามารถสแกนเก็บไฟล์เอกสารได้</p>
                <!-- <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                    <a href="#" class="w-full sm:w-auto bg-dark hover:bg-dark-strong focus:ring-4 focus:outline-none focus:ring-neutral-quaternary text-white rounded-base inline-flex items-center justify-center px-4 py-3">
                        <svg class="me-2 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
                        <div class="text-left rtl:text-right">
                            <div class="text-xs">Download on the</div>
                            <div class="text-sm font-bold">Mac App Store</div>
                        </div>
                    </a>
                    <a href="#" class="w-full sm:w-auto bg-dark hover:bg-dark-strong focus:ring-4 focus:outline-none focus:ring-neutral-quaternary text-white rounded-base inline-flex items-center justify-center px-4 py-3">
                        <svg class="me-2 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
                        <div class="text-left rtl:text-right">
                            <div class="text-xs">Get in on</div>
                            <div class="text-sm font-bold">Google Play</div>
                        </div>
                    </a>
                </div> -->
            </div>


        </div>

        <div class="grid grid-cols-1 gap-4 p-4">
            <div class="w-full text-center bg-neutral-primary-soft shadow-xs bg-gray-200 dark:bg-gray-700 rounded-2xl">

                <div
                    class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base">


                <div class="items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 p-4">
                    <label for="input-group-1" class="sr-only">Search</label>
        <div class="relative mt-4 mb-4">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
            </div>
            <input type="text" id="input-group-1" class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand shadow-xs placeholder:text-body rounded-full" placeholder="Search">
        </div>
        </div>

                    <?php
                    // ดึงข้อมูลจากตาราง
                    $sql = "SELECT * FROM loginfrom ORDER BY idlogin ASC";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
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
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default ">
                                        <td class="px-6 py-4">
                                            <?php echo $count++; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['pfname'] ." ". $row['firstname']. " ". $row['midname']." ". $row['lastname'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['idcard'] ?? '-'; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $row['idnumber'] ?? '-'; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <button type="button" class="font-medium text-fg-brand bg-red-400 rounded-full px-2 py-2 text-white">สมุดประวัติ
                                            </button>
                                        </td>
                                    </tr>
                                
                                    
                                    <?php
                                }
                                ?>


                                
                    <tr class="text-center">
                        <td class="px-6 py-4">
                 
                            <div class="relative flex items-center justify-center">
                                <button type="button" id="decrement-button-1" data-input-counter-decrement="counter-input-1" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary rounded-full text-sm focus:outline-none h-6 w-6">
                                    <svg class="w-3 h-3 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                                </button>
                                <input type="text" id="counter-input-1" data-input-counter class="shrink-0 text-heading border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="12" required />
                                <button type="button" id="increment-button-1" data-input-counter-increment="counter-input-1" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary rounded-full text-sm focus:outline-none h-6 w-6">
                                    <svg class="w-3 h-3 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
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