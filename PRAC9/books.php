<?php
#connect to the databse
$db = new SQlite3('books.db');
?>
<html>
<body>

  <form id="genre_form"method="POST" action="books.php">
      <?php
          #create the SQL query
          $author = 'Powers, Tim';
          $sqlQuery = "SELECT DISTINCT tag FROM books INNER JOIN booktags ON books.id=booktags.id WHERE author='$author'";
          # send the query to the database 
          $result = $db->query($sqlQuery); 

          #create the SQL query for Fantasy
          $fantasy = 'Fantasy';
          $genreF = "SELECT DISTINCT tag FROM books INNER JOIN booktags ON books.id=booktags.id WHERE tag='$fantasy'";
          # send the query to the database 
          $result = $db->query($genreF); 
          
      ?>
      <ul>
        <li>
          <label><input type="checkbox" name="Tim"><?php print ("Tags for $author: ");?></label>
         </li>
        <li>
          <label> <input type="checkbox" name="genre[]" value="Thriller">Thriller</label>
        </li>
        <li>
          <label> <input type="checkbox" name="genre[]" value="Fantasy"><?php print ("$fantasy");?></label>
        </li>
        <li>
          <button type="submit">Search</button>
        </li>
      </ul>
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['Tim'];
  if (empty($name)) {
    echo "Tims Genre Not Seletected";
  } else {
    # use the fetchArray method to return the results row by row
    while ($row = $result->fetchArray(SQLITE3_ASSOC)){
  	    print ($row['tag'] . " ");
      }
    print ("<br/>\n");
  }
}
?>

</body>
</html> 







