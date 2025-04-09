<?php

session_start();
$ok=false;
require("db.php");

// echo $_SESSION['mobile'];
date_default_timezone_set("Asia/tehran");
$date1= date("Y/m/d h:i:sa");



if (isset($_GET['del'])){
$book_del_id=$_GET['del'];


// $sql=mysqli_query($db, "delete from books where id='$book_del_id'");
$sql=mysqli_query($db, "update books set del='1' where id='$book_del_id'");



}

if (isset($_GET['book_name'])){
  $book_name=$_GET['book_name'];
  $book_pages=$_GET['book_pages'];
  $book_year=$_GET['book_year'];
  
  // $sql=mysqli_query($db, "delete from books where id='$book_del_id'");
  $sql=mysqli_query($db, " insert into books (`book_name`, `book_pages`, `book_year`) values ('$book_name', '$book_pages', '$book_year') ");
  
  
  
  }
  

?>
<!DOCTYPE html>
<html dir="rtl">
<head>

  <link rel="icon" type="image/png" href="icon.png">
  
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet" >
<title>خانه</title>
<link rel="stylesheet" href="css/hesam.css">

<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body> 
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">اضافه کردن کتاب</h1>
        <button style="margin: 0;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>


      <form action="home.php" method="get">

      <div class="modal-body">
      
      <label for="bookname" class="form-label">نام کتاب</label>
      <input id="bookname" class="form-control" name="book_name">
      <br>

      <label for="booktedad" class="form-label">تعداد صفحه</label>
      <input id="booktedad" class="form-control" name="book_pages">
      <br>

      <label for="booksal" class="form-label">سال چاپ</label>
      <input id="booksal" class="form-control" name="book_year">
      <br>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
        <button type="submit" class="btn btn-success">ثبت کتاب</button>
      </div>
      </form>
    </div>
  </div>
</div>





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
      <a class="navbar-brand" href="hesam.html">خانه</a>
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
              <a class="nav-link active" aria-current="page" href="#">خانه</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="upload.php">آپلود مدارک</a>
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

  <!-- <div class="div2">

    <div class="row">

        <div class="div-in col-4 border border-success">
            
        </div>



        <div class="div-in col-4" style="background-color: green;">
            <i class="fa fa-user"></i>
        </div>



    </div>

  </div> -->





  <div class="alert alert-success text-center">
  <?php echo $_COOKIE['namefull']; ?>
    به خانه خوش آمدید!
  </div>
  <br>
  <form method="get" action="home.php" class="text-center">
  <label class="label2" >نام کتاب:</label><br>
  <input type="text" name="book_name" id="book_name" class="label1"><br>
  <br>
  <label class="label2" >تعداد صفحات:</label><br>
<input type="number" name="book_pages" id="book_pages" class="label1"><br>
<br>
<label class="label2" >سال انتشار:</label><br>
<input type="number" name="book_year" maxlength="4" id="book_year" class="label1"><br>
<br>
<button class="btn btn-success"  onclick="send()" id="btn_send">ثبت کتاب</button>
</form>
<br>
<br>
<?php

$error='-';
// اصلاح شده با استفاده از null coalescing operator (??)
$book_name = $_GET['book_name'] ?? '';
$book_pages = $_GET['book_pages'] ?? 0;
$book_year = $_GET['book_year'] ?? 0;

if (isset($_GET['book_name'])){
// باید از $book_name استفاده کنید نه $name_book
if (strlen($book_name) < 2 || strlen($book_name) > 40) {
  $error = 'نام کتاب باید بین ۲ تا ۴۰ کاراکتر باشد';
}
elseif (strlen($book_year) != 4 || !in_array(substr($book_year, 0, 2), ['13', '14', '19', '20'])) {
  $error='لطفا سال چاپ را درست وارد کنید!';
}
elseif ($book_pages < 1 || $book_pages > 9999) {
  $error='لطفا تعداد صفحات کتاب را درست وارد کنید';
}
if ($error=='-'){
$row=mysqli_query($db,"insert into books(book_name,book_pages,book_year) values('$book_name','$book_pages','$book_year')");
$ok=true;
}
if ($error<>'-'){
  echo '
  <div class="alert alert-danger text-center">
    '. $error .'
  </div>';
}
if ($ok==true){
  echo '
  <div class="alert alert-success text-center">
  کتاب شما با موفقیت ثبت شد!
  </div>';
}
// if (preg_match('/[a-zA-Z]/', $book_name)) {
//   $error = 'استفاده از حروف انگلیسی در نام کتاب مجاز نیست';
// }

}







?>
</div>
<div class="div_table">
  <h3 class="h3">لیست کاربران</h3>
  <br>
  <table class="table table-striped table1">

    <thead>
      <tr>
        <th>
          ردیف
        </th>
        <th>
          نام و نام خانوادگی 
        </th>
        <th>
          نام کاربری
        </th>
        <th>
          موبایل
        </th>
      </tr>
    </thead>

    

    <tbody>
    <div>
    <?php


      $sql=mysqli_query($db,"select * from user");

      $i=0;

      while ($row=mysqli_fetch_assoc($sql)) {
        
        $namefull=$row['namefull'];
        $mobile=$row['mobile'];
        $user=$row['username'];

        $i=$i+1;
        echo "
      <tr>
        <td>
          $i
        </td>
        <td>
          $namefull
        </td>
        <td>
          $user
        </td>
        <td>
          $mobile
        </td>
      </tr>
        ";
        

      }






    ?>
  </div>

    </tbody>
</div>





  </table>



  <h3 class="h3">لیست کتاب ها</h3>
<br>
  <table class="table table-striped table1">

    <thead>
      <tr>
        <th name="id1">
          ردیف
        </th>
        <th name="book_name">
          نام کتاب
        </th>
        <th name="book_page">
          صفحات کتاب
        </th>
        <th class="book_year">
          سال چاپ
        </th>
        <th class="book_year" style="width: 29%;">
          مدیریت کتاب ها
        </th>
      </tr>
    </thead>

    

    <tbody>
    <div>

    <div id="error1" class="alert alert-danger text-center" style="display:none;">
    رمز عبور یا نام کاربری شما اشتباه است!
    </div>

    <div id="ok1" class="alert alert-success text-center" style="display:none;">
    شما با موفقیت وارد شدید!
    </div>


    <?php


      $sql=mysqli_query($db,"select * from books where del='0'");

      $i=0;

      while ($row=mysqli_fetch_assoc($sql)) {
        
        $book_name=$row['book_name'];
        $book_pages=$row['book_pages'];
        $book_year=$row['book_year'];
        $book_id=$row['id'];
        $i=$i+1;
        echo "
      <tr>
        <td>
          $i
        </td>
        <td>
          $book_name
        </td>
        <td>
          $book_pages
        </td>
        <td>
          $book_year
        </td>
        <td>

<a href=\"home.php?del=$book_id\">
<button class=\"btn btn-danger\">
<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash-fill\" viewBox=\"0 0 16 16\">
  <path d=\"M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0\">
</svg> حذف
</button>
</a>



<a href=\"home.php?del=$book_id\">
<button class=\"btn btn-warning\">
<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
  <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>
  <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z\"/>
</svg> ویرایش
</button>
</a>




<button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\">
اضافه کردن
</button>




        </td>
      </tr>
        ";
        

      }






    ?>
  </div>

    </tbody>
</div>

  </table>



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
            document.getElementById("error1").innerHTML = data; // نمایش پیام خطا
        }
    });
}

</script>

  
   

</body>

</html>




