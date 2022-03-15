<?php
	require_once('assets/head.php');
    require_once('assets/nav.php');
    // the following require is needed and NEW
    require_once('models/libcommon.php');
?>
<div class="container">
    <h3>Add Note
        <a href="index.php">Note List</a>
    </h3>

    <form action="save-comment.php" method="POST">
        <div class="form-group">
            <label> Name</label>
            <input type="text" class="" name="name">
        </div>
        <div class="form-group">
            <label>Note</label>
            <input type="text" class="" name="note">
        </div>
        <button type="submit" class="">Save</button>
    </form>
</div>

<?php
	require_once('assets/footer.php')
?>
