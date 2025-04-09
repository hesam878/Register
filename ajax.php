<?php
include("db.php");


$ok=false;


$user=$_GET['user'];
$pass=$_GET['pass'];






if(isset($_GET['user'])) {





    $user=$_GET["user"];
    $pass=$_GET["pass"];




    $sql=mysqli_query($db, "select * from user where username='$user' and password='$pass'");

 
  
    if ($row=mysqli_fetch_assoc($sql)) {

      $mobail=$row['mobile'];
      $namefull=$row['namefull'];


      $ok=true;
      setcookie('mobile', $mobail, time() + (86400 * 30), "/");
      setcookie('namefull', $namefull, time() + (86400 * 30), "/");

    }


  
  
    // if ($user==$user_db && $pass==$pass_db) {
          
  
    //       // $_SESSION['namefull']=$read2[0];
    //       // $_SESSION['mobile']=$read2[1];

    //     }
  
  
    }
  
  
  
   


  if ($ok==true){

    echo '1';

  }else {

    echo '0';

  }




?>