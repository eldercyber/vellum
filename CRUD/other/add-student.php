<?php
	require_once('assets/head.php');
    require_once('assets/nav.php');
    // the following require is needed and NEW
    require_once('db-config.php');
?>
<div class="container">
    <h3>Add Student
        <a href="view-students.php">Student List</a>
    </h3>

    <form action="save-student.php" method="post">
    <div class="form-group">
        <label>Student Name</label>
        <input type="text" class="" name="name">
    </div>
    <div class="form-group">
        <label>Student Marks</label>
        <input type="text" class="" name="marks">
    </div>
    <button type="submit" class="">Save</button>
    </form>
</div>

<?php
	require_once('assets/footer.php')
?>
