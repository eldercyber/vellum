<?php
header('Refresh:3;url=index.php');
require_once('models/libcommon.php');

$num = $_GET['nm'];

$sql ="DELETE FROM notes WHERE num=$num ";
    $ret = $db->exec($sql);
    if(!$ret) {
        echo $db->lastErrorMsg();
    } else {
        echo $db->changes(), "Note Deleted Successfully\n";
    }
?>