<?php
	require_once('assets/head.php');
    require_once('assets/nav.php');
    // the following require is needed and NEW
    require_once('db-config.php');
?>
<div class="container">
    <h3>Update Student
        <a href="view-students.php">Student List</a>
    </h3>
<?php
    $roll =  $_GET['roll'];
    $sql = "SELECT * FROM student WHERE roll_no=$roll";
    $ret = $db->query($sql);
    $row = $ret->fetchArray(SQLITE3_ASSOC);
?>
    <form action="update-student.php" method="post">
    <input type="hidden" name="roll" value="<?=$row['roll_no']?>">
    <div class="form-group">
        <label>Student Name</label>
        <input type="text" class="" name="name" value="<?=$row['name']?>">
    </div>
    <div class="form-group">
        <label>Student Marks</label>
        <input type="text" class="" name="marks" value="<?=$row['marks']?>">
    </div>
    <button type="submit" class="">Save</button>
    </form>
</div>

<?php
	require_once('assets/footer.php')
?>
