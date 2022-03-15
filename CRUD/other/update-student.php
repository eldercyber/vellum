<?php
header('Refresh:2;url=view-students.php');
require_once('db-config.php');


//include the database
require_once('./db-config.php');

$name = $_POST['name'];
$marks = $_POST['marks'];
$roll = $_POST['roll'];

$sql ="UPDATE student SET name=\"$name\",marks=$marks WHERE roll_no=$roll";
    $ret = $db->exec($sql);
    if(!$ret) {
        echo $db->lastErrorMsg();
    } else {
        echo $db->changes(), "Student Details Updated Successfully\n";
    }
?>