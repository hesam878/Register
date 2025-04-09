<?php



$db=mysqli_connect('localhost','root','','hesam-sql');


// mysqli_query($db , " insert into user (username,mobile,`password`) values ('maryam','09176657867','maryam.com') ");


$sql=mysqli_query($db , "select * from user where username='hesam' and password='hesam1234$$' ");

while($row=mysqli_fetch_assoc($sql)) {
echo($row['username'] . ': ' . $row['mobile']);
echo '<br>';
}

?>