<?php


$db=mysqli_connect('localhost','root','','hesam-sql');


// $cookie_name = "namefull";
// $cookie_value = "Hesam";

// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day


// $read_cookie1= $_COOKIE['namefull'];

//  echo $read_cookie1;


// if(!isset($_COOKIE[$cookie_name])) {
//   echo "Cookie named '" . $cookie_name . "' is not set!";
// } else {
//   echo "Cookie '" . $cookie_name . "' is set!<br>";
//   echo "Value is: " . $_COOKIE[$cookie_name];
// }


  if (isset($_COOKIE['mobile']) && strlen($_COOKIE['mobile'])==11) {

    echo '
    
    <meta http-equiv="refresh" content="0; url=home.php">;
    
    
    ';
    
  die('');
  } 
  else {
      $_COOKIE['namefull']='';
      $_COOKIE['mobile']='';
  }


// die('');
session_start();

$user_db= '';
$pass_db= '';
$ok=false;
// echo filesize("db.txt");
// echo '<br>';
// $_SESSION['x']=1;





$user_db="";
$pass_db="";
$ok=false;
$error='-';



if(isset($_GET['user'])) {

    

  $namefull = $_GET['namefull'];
  $mobile = $_GET['mobile'];
  $user = $_GET['user'];
  $pass = $_GET['pass'];

  // ذخیره نام کاربر در کوکی
  setcookie("namefull", $namefull, time() + (86400 * 30), "/"); // 30 روز اعتبار
  setcookie("mobile", $mobile, time() + (86400 * 30), "/");

    if (strlen($namefull)<5 || strlen($namefull)>50) {

    $error='نام و نام حانوادگی را درست وارد کنید!!';

    }

    if (strlen($mobile)<11 || strlen($mobile)>11) {

      $error='شماره مبایل را درست وارد کنید!!مثال: 09123568432';

    }

    if (substr($mobile,0,2) != '09') {
      $error='شماره مبایل را درست وارد کنید!!مثال: 09123568432';
    }

    if ($error=='-') {


      mysqli_query($db,"insert into user(namefull,mobile,username,password) values('$namefull','$mobile','$user','$pass')");

      $ok=true;

    }



}



?>









<!DOCTYPE html>
<html dir="rtl">
<head>

  <link rel="icon" type="image/png" href="icon.png">
  
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet" >
    
    
<link rel="stylesheet" href="css/hesam.css">

<script src="js/bootstrap.min.js"></script>
</head>
<body> 
  
  

<!-- 
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">حسام</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          سلام...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
          <button type="button" class="btn btn-primary">ارسال</button>
        </div>
      </div>
    </div>
  </div> -->












  <nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.html">حسام</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">خانه</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
  <br>
  <div style=" text-align: center;">
  <img src="logo hesam1.png" style="  width: 200px;">
  </div>
<!-- <div style="text-align: center;"><img class="image1" style="text-align: center;" src="hesam image.jpg"></div> -->
<br>
<br>
<form method="get" action="reg.php" style="text-align: center;">
<label class="label2" >نام و نام خانوادگی:</label><br>
<input type="text" name="namefull" id="namefull" class="label1"><br>
<br>
<label class="label2" >شماره تلفن:</label><br>
<input type="tel" name="mobile" id="mobile" maxlength="11" class="label1"><br>
<br>
<label class="label2" >نام کاربری:</label><br>
<input type="text" name="user" id="user" class="label1"><br>
<br>
<label class="label2">رمز عبور:</label><br>
<input type="password" name="pass" id="pass" class="label1"><br>
<br>
<br>
<button type="button" class="btn btn-primary" id="btn_send" onclick="send()">ثبت نام</button>
<br>
<br>
<a href="index.php" style="color:white;  text-decoration: none;">ورود</a>
</form>
<br>

    <!-- </div> -->
    <!-- <div class="dropdown">
        <span>Mouse over me</span>
        <div class="dropdown-content">
          <p>Hello World!</p>
        </div> -->
      <!-- </div>
    <br>
    <br>
    <br>
    <br> -->
    <!-- <br>
    <br>
    <br>
    <br>
    <br> -->

    <div id="error1" class="alert alert-danger text-center" style="display:none;"><?php   $error   ?></div>

    <div id="ok1" class="alert alert-success text-center" style="display:none;">ثبت نام با موفقیت انجام شد!</div>

<?php

if ($ok==true) {


echo '
<div class="alert alert-success text-center">
  شما با موفقیت وارد شدید!
</div>


<meta http-equiv="refresh" content="2; url=home.php">

';
}else {
  if ($error<>'-') {
    

    echo '
    <div class="alert alert-danger text-center">
      '. $error .'
    </div>';

  }
}

?>






<script>
function send() {
    document.getElementById("error1").style.display = "none";
    document.getElementById("ok1").style.display = "none";
    document.getElementById("btn_send").disabled = true;
    document.getElementById("btn_send").textContent = "در حال پردازش...";

    let namefull = encodeURIComponent(document.getElementById('namefull').value);
    let mobile = document.getElementById('mobile').value;
    let user = document.getElementById('user').value;
    let pass = document.getElementById('pass').value;

    fetch('ajax-reg.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `namefull=${namefull}&mobile=${mobile}&username=${user}&password=${pass}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("btn_send").disabled = false;
        document.getElementById("btn_send").textContent = "ثبت نام";
        
        if (data === '1') {
            document.getElementById("ok1").style.display = "block";
            setTimeout(() => location.reload(), 1000);
        } else {
            document.getElementById("error1").style.display = "block";
            document.getElementById("error1").innerHTML = data; 
        }
    });
}
</script>





</body>

</html>




