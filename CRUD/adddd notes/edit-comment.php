<?php
	require_once('assets/head.php');
    require_once('assets/nav.php');
    // the following require is needed and NEW
    require_once('./models/libcommon.php');
?>
<div class="container">
    <h3>Update Notes
        <a href="index.php">Notes</a>
    </h3>
<?php
    $num =  $_GET['nm'];
    $sql = "SELECT * FROM notes WHERE num=$num";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
?>
    <form action="update-comment.php" method="post">
    <input type="hidden" name="nm" value="<?=$row['num']?>">
    <div class="form-group">
        <label>Your Name</label>
        <input type="text" class="" name="name" value="<?=$row['name']?>">
    </div>
    <div class="form-group">
        <label>Note Contents</label>
        <input type="text" class="" name="note" value="<?=$row['note']?>">
    </div>
    <button type="submit" class="">Save</button>
    </form>
</div>

<?php
	require_once('assets/footer.php')
?>
