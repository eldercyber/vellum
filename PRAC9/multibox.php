<?php
#connect to the databse
//$db = new SQlite3('books.db');
?>
<html>
<body>
        <h3>Categories</h3>
  <form id="genre_form" method="POST" action="multibox.php">  
      <ul>
        <li> <label><input type="checkbox" name="genre[]" value="Fantasy" />Tom</label> </li>
        <li> <label><input type="checkbox" name="genre[]" value="Thriller" />Thriller</label> </li>
        <li> <label><input type="checkbox" name="genre[]" value="Fantasy" /> Fantasy</label></li>
        <li> <button type="submit" name="submit">Search</button> </li>
      </ul>
  </form>
<?php 
    if(isset($_POST["submit"])) {
        if(!empty($_POST["genre"])) {
            echo "<h3>You have selected</h3>";
            foreach($_POST["genre"] as $genre)
            {
                echo "<p>".$genre."</p>";
            }
        }
        else {
            echo "PLease choose one";
        }
    }
    
?>
<h3>Prices</h3>
  <form id="genre_form" method="POST" action="multibox.php">  
      <ul>
        <li> <label><input type="checkbox" name="price[]" value="5" />Under $5</label> </li>
        <li> <label><input type="checkbox" name="price[]" value="10" />Under $10</label> </li>
        <li> <label><input type="checkbox" name="price[]" value="20" /> Under $20</label></li>
        <li> <button type="submit" name="submit">Search</button> </li>
      </ul>
  </form>
</body>
</html> 







