<?php 
include './../../../config/server/function.php';
session_start();
$conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idcard = isset($_POST['idcard']) ? htmlspecialchars(mysqli_real_escape_string($conn, trim($_POST['idcard']))) : null;

  $numlogin = isset($_POST['numlogin']) ? htmlspecialchars(mysqli_real_escape_string($conn, trim($_POST['numlogin']))) : null;

  // เข้าระบบข้อมูลในตาราง loginus
    // ตรวจความยาว
    if (strlen($idcard) == 13) {
        $query_check = "SELECT * FROM loginfrom WHERE idcard = '$idcard' AND numlogin = '$numlogin' LIMIT 1";
    } elseif (strlen($idcard) == 10) {
        $query_check = "SELECT * FROM loginfrom WHERE idnumber = '$idcard' AND numlogin = '$numlogin' LIMIT 1";
    } else {
        echo "รูปแบบรหัสไม่ถูกต้อง";
        exit();
    }
    $call_check = mysqli_query($conn, $query_check);

        if (mysqli_num_rows($call_check) > 0) {
            $result_check = mysqli_fetch_assoc($call_check);
            $_SESSION['idcard'] = $result_check['idcard'];
            $_SESSION['idnumber'] = $result_check['idnumber'];
            $_SESSION['numlogin'] = $result_check['numlogin'];
            $_SESSION['status'] = $result_check['status'];  // << ใช้ค่าจริง

            if (!empty($idcard) && !empty($numlogin) && !empty($result_check['status'])) {
            
                if ($result_check['status'] === 'user') {
                    $_SESSION['success_login'] = true;
                    header("Location: ../../indexus.php");
                    exit();
                } else if ($result_check['status'] === 'admin') {
                    $_SESSION['success_login'] = true;
                    header("Location: ../../indexam.php");
                    exit();
                } else if ($result_check['status'] === 'superadmin') {
                    $_SESSION['success_login'] = true;
                    header("Location: ../../indexam.php");
                    exit();
                } else if ($result_check['status'] === 'superuser') {
                    $_SESSION['success_login'] = true;
                    header("Location: ../../indexam.php");
                    exit();
                }
            }

        } else {
            //echo "ไม่พบข้อมูล กรุณาลองใหม่";
            $_SESSION['erorr_login'] = true;
            header("Location: ../../login.php");
            exit();
        }
    exit();
}