<?php
session_start();
$db = mysqli_connect('localhost','root','','hesam-sql');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = '';


$namefull = mysqli_real_escape_string($db, $_POST['namefull'] ?? '');
$mobile = mysqli_real_escape_string($db, $_POST['mobile'] ?? '');
$user = mysqli_real_escape_string($db, $_POST['username'] ?? '');
$pass = mysqli_real_escape_string($db, $_POST['password'] ?? '');


if(empty($namefull) || empty($mobile) || empty($user) || empty($pass)) {
    $error = 'لطفا تمام فیلدها را پر کنید!';
} elseif (strlen($namefull)<5 || strlen($namefull)>50) {
    $error = 'نام و نام خانوادگی باید بین 5 تا 50 کاراکتر باشد!';
} elseif (strlen($mobile)!=11 || substr($mobile,0,2) != '09') {
    $error = 'شماره موبایل باید 11 رقمی و با 09 شروع شود!';
}


if (empty($error)) {
    $query = "INSERT INTO user(namefull, mobile, username, password) VALUES('$namefull','$mobile','$user','$pass')";
    
   
    error_log("Executing query: " . $query);
    
    if(mysqli_query($db, $query)) {
        setcookie("namefull", $namefull, time() + (86400 * 30), "/");
        setcookie("mobile", $mobile, time() + (86400 * 30), "/");
        echo '1'; 
        exit;
    } else {
        $error = 'خطا در ثبت نام: ' . mysqli_error($db);
    }
}

echo $error;
?>