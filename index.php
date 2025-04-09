<?php




$cookie_name = "user";
$cookie_value = "Hesam";

// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day


// $read_cookie1= $_COOKIE['user'];

// echo $read_cookie1;


// if(!isset($_COOKIE[$cookie_name])) {
//   echo "Cookie named '" . $cookie_name . "' is not set!";
// } else {
//   echo "Cookie '" . $cookie_name . "' is set!<br>";
//   echo "Value is: " . $_COOKIE[$cookie_name];
// }


  if (isset($_COOKIE['mobile']) && strlen($_COOKIE['mobile'])==11) {

    echo '
    
    <meta http-equiv="refresh" content="0; url=home.php">
    
    
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










if(isset($_GET['user'])) {


  $file=fopen('db.txt','r');

  // $read1=fread($file,filesize('db.txt'));


  
  $user=$_GET['user'];
  $pass=$_GET['pass'];


  for ($i=1;$i<=3;$i++) {
  $read1=fgets($file);

  $read2=explode(",",$read1);


    $user_db= $read2[2];
    $pass_db= $read2[3];


  if ($user==$user_db && $pass==$pass_db) {
        $ok=true;

        // $_SESSION['namefull']=$read2[0];
        // $_SESSION['mobile']=$read2[1];
        setcookie('mobile', $read2[1], time() + (86400 * 30), "/");
        setcookie('namefull', $read2[0], time() + (86400 * 30), "/");
      }


  }



 
  fclose($file);  

  



  // var_dump($read2) ;













   


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
  </div>












  <nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.html">Hesam</a>
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
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
          <!-- <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
  <div style=" text-align: center;">
  <img src="logo hesam1.png" style="  width: 200px;">
  </div>
<!-- <div style="text-align: center;"><img class="image1" style="text-align: center;" src="hesam image.jpg"></div> -->
<br>
<br>
<!-- <form method="post" action="index.php" style="text-align: center;"> -->
<div class="text-center">  
<label class="label2" >نام کاربری:</label><br>
<input type="text" name="user" id="user" class="label1"><br>
<br>
<br>
<label class="label2">رمز عبور:</label><br>
<input type="text" name="pass" id="pass" class="label1"><br>
<br>
<br>
<br>
<button class="btn btn-success" onclick="send()" id="btn_send">ورود به اپلیکیشن</button>
<br> 
<br>
<a href="reg.php" style="color:white; text-decoration: none;">ثبت نام</a>
</div>
<!-- </form> -->
<br>
<br>
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

    <div id="error1" class="alert alert-danger text-center" style="display:none;">
    رمز عبور یا نام کاربری شما اشتباه است!
    </div>

    <div id="ok1" class="alert alert-success text-center" style="display:none;">
    شما با موفقیت وارد شدید!
    </div>


<?php

if ($ok==true) {


echo '
<div class="alert alert-success text-center">
  شما با موفقیت وارد شدید!
</div>


<meta http-equiv="refresh" content="2; url=home.php">

';
}

?>
<!-- <div class="dropdown">
    <span>Mouse over me</span>
    <div class="dropdown-content">
      <p>Hello World!</p>
    </div>
  </div> -->



  <script>
function send() {
    document.getElementById("error1").style.display="none";

    document.getElementById("btn_send").disabled=true;
    document.getElementById("btn_send").textContent="در حال پردازش...";

    user=document.getElementById('user').value;
    pass=document.getElementById('pass').value;
      
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        let ok = this.responseText;

        document.getElementById("btn_send").disabled=false;
        document.getElementById("btn_send").textContent="ورود به اپلیکیشن";

        if (ok=='1') {
          document.getElementById("error1").style.display="none";
          document.getElementById("ok1").style.display="block";
          window.location.assign('home.php');
        }
        if (ok=='0') {
          document.getElementById("error1").style.display="block";
          document.getElementById("ok1").style.display="none";

          
        }

      }
    };
    xmlhttp.open("GET", "ajax.php?user=" + user + "&pass=" + pass, true);
    xmlhttp.send();
  
}



</script>




</body>

</html>




