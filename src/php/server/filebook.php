<?php
include './../../../config/server/function.php';
session_start();
$conn = connectDB();

$idcard = $_GET['idcard'] ?? $_GET['idnumber'] ?? null;
$type = isset($_GET['idcard']) ? 'idcard' : (isset($_GET['idnumber']) ? 'idnumber' : null);

if ($idcard && $type) {
    $query = "SELECT filenumber FROM loginfrom WHERE $type = '$idcard' LIMIT 1";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $filenumber = $row['filenumber'] ?? null;

    if ($filenumber) {
        echo "เลขสมุดประวัติ: " . $filenumber;
    } else {
        echo "ไม่พบสมุดประวัติ";
    }
} else {
    echo "ไม่มีข้อมูล IdCard OR IdNumber ส่งมา";
}

$fileBook = $filenumber;
$folder = "uploads/$fileBook/$idcard";



if (!is_dir($folder)) {
    echo "ยังไม่มีสมุดประวัติ";
    exit;
}

$files = array_diff(scandir($folder), ['.', '..']);
?>

<h3>สมุดประวัติของ IdCard OR Idnumber: <?= $idcard ?></h3>

<!-- <ul>
<?php 
// foreach ($files as $file): ?>
//     <li><a href="<?
// = $folder . '/' . $file 
?>" target="_blank"><?
// = $file 
?></a></li>
// <?php 
// endforeach; 
?>
</ul> -->


<?php foreach ($files as $file): ?>
    <?php if (preg_match('/\.(jpg|jpeg|png|webp)$/i', $file)): ?>
        <img src="<?= $folder . '/' . $file ?>" style="width:150px; margin-bottom:10px;">
    <?php else: ?>
        <a href="<?= $folder . '/' . $file ?>" target="_blank"><?= $file ?></a>
    <?php endif; ?>
<?php endforeach; ?>
