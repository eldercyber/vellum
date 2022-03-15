<?php
header('Refresh:2;url=view-students.php');
require_once('db-config.php');


//include the database
require_once('./db-config.php');

$roll = $_GET['roll'];

$sql ="DELETE FROM student WHERE roll_no=$roll ";
    $ret = $db->exec($sql);
    if(!$ret) {
        echo $db->lastErrorMsg();
    } else {
        echo $db->changes(), "Student Details Deleted Successfully\n";
    }
?>