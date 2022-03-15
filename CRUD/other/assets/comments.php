<?php
date_default_timezone_set('Australia/Brisbane');

echo "<form method='POST' action='".setComments($pdo)."'>
    <input type='hidden' name='uid' value='Anon'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button name='commentSubmit' type='submit'>Comment</button>
</form>";
?>