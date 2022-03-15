<?php
header('Refresh:3;url=view-students.php');
//include the database
require_once('./db-config.php');

$name = $_POST['name'];
$marks = $_POST['marks'];

$sql ="insert into student(roll_no,name,marks) values(NULL,\"$name\",$marks)";
   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Student record created successfully\n";
   }
   $db->close();
?>