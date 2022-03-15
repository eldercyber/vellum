<?php
	require_once('assets/head.php');
    require_once('assets/nav.php');
    // the following require is needed and NEW
    require_once('db-config.php');
?>
<div class="container">
    <h3>Student List
        <a href="add-student.php">Add Student</a>
    </h3>
</div>
<table>
 <tr>
    <th>Roll No</th>
    <th>Name</th>
    <th>Marks</th>
    <th>Action</th>
 </tr>
 <?php
$sql = "SELECT * FROM student";
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) 
    {
    ?>
 <tr>
    <td><?=$row['roll_no'];?></td>
    <td><?=$row['name'];?></td>
    <td><?=$row['marks'];?></td>
    <td>
        <a href="edit-student.php?roll=<?=$row['roll_no'];?>" > Edit</a> 
        <a href="delete-student.php?roll=<?=$row['roll_no'];?>" > Delete</a>
    </td>
 </tr>
    <?php 
    }
?>
</table>

<?php
	require_once('assets/footer.php')
?>
