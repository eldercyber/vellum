<?php
header('Refresh:3;url=index.php');
require_once('./models/libcommon.php');

$name = $_POST['name'];
$note = $_POST['note'];
$num = $_POST['nm'];

$sql ="UPDATE notes SET name=\"$name\",note=\"$note\" WHERE num=$num";
    $ret = $db->exec($sql);
    if(!$ret) {
        echo $db->lastErrorMsg();
    } else {
        echo $db->changes(), " Note Updated Successfully\n";
    }
?>