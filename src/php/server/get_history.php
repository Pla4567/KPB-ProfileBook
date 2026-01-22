<?php
include './../../../config/server/function.php';
session_start();
$conn = connectDB();

function gethistory($conn, $idlogin)
{
    $sql = "SELECT * FROM loginfrom WHERE idlogin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idlogin);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

/* ✅ จุดที่ PHP ถูกเรียกจริง */
if (isset($_GET['idlogin'])) {
    $conn = connectDB();
    $user = gethistory($conn, $_GET['idlogin']);

    if ($user) {
        echo $user['idlogin'];
        // echo field อื่น ๆ ได้
    } else {
        echo "ไม่พบข้อมูล";
    }
}
