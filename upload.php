<?php

session_start();
$ok=false;
require("db.php");

// echo $_SESSION['mobile'];
date_default_timezone_set("Asia/tehran");
$date1= date("Y/m/d h:i:sa");




// print_r($_FILES['fileToUpload']['name']);




// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/logo hesam1.png")) {

    // echo "آپلود عکس با موفقیت انجام شد.";

  } else {

    echo "آپلود عکس انجام نشد.";

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
<title>آپلود مدارک</title>
    
<link rel="stylesheet" href="css/hesam.css">

<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
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
      <a class="navbar-brand" href="hesam.html">آپلود مدارک</a>
      <?php  echo $date1  ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">منو</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">خانه</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">آپلود مدارک</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">خروج</a>
            </li>
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
<br>


<div style="display: block; overflow: hidden;">
<div class="row">


<div class="col-3">


</div>

<div class="col-6 text-center">

<img src="uploads/logo hesam1.png" width="50%">
<br>
<br>
<br>

<!-- enctype="multipart/form-data"> به ما می فهماند که چیزی که قرار است ارسال شود یک فایل است -->
<form action="upload.php" method="post" enctype="multipart/form-data">
  تصوبر خود را انتخاب کنید:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <br>
  <input type="submit" class="btn btn-success" value="آپلود تصویر" name="submit">
</form>
</div>

<div class="col-3">


</div>


</div>








 




  <script>
function send() {
    document.getElementById("error1").style.display = "none";
    document.getElementById("ok1").style.display = "none";
    document.getElementById("btn_send").disabled = true;
    document.getElementById("btn_send").textContent = "در حال پردازش...";

    let book_name = encodeURIComponent(document.getElementById('book_name').value);
    let book_pages = document.getElementById('book_pages').value;
    let book_year = document.getElementById('book_year').value;

    fetch('ajax-home.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `book_name=${book_name}&book_pages=${book_pages}&book_year=${book_year}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("btn_send").disabled = false;
        document.getElementById("btn_send").textContent = "ثبت کتاب";
        
        if (data === '1') {
            document.getElementById("ok1").style.display = "block";
            setTimeout(() => location.reload(), 1000);
        } else {
            document.getElementById("error1").style.display = "block";
            document.getElementById("error1").innerHTML = data; // نمایش پیام خطا
        }
    });
}

</script>

  
   

</body>

</html>




