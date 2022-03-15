<?php
   date_default_timezone_set('America/New York');
header('Refresh:3;url=index.php');
//include the database
require_once('models/libcommon.php');

$name = $_POST['name'];
$note = $_POST['note'];

$sql ="INSERT into notes(num,name,note) values(NULL,\"$name\",\"$note\")";
   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Note record created successfully\n";
   }
   $db->close();
?>