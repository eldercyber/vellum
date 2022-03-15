<?php
// get teh variable that will display the text
//
$displayedText = "";
// if the button with the name searchbar exists and is clicked execute the code inside
if ( isset($_POST['searchbar'])){
    //If something is searched then store the value for author
    if (isset($_POST['author'])) {
          //a connection to the database is established
            $db = new SQLite3('books.db');
          // then the query to be searched is generated. 
        $sqlQuery = "SELECT title, author, genre, price FROM books INNER JOIN booktags ON books.book_id=booktags.book_id INNER JOIN genre ON booktags.genre_id=genre.genre_id INNER JOIN bookprice ON books.book_id=bookprice.book_id  WHERE genre='" . $_POST['genre'] . "' AND price='" . $_POST['price'] . "' AND author LIKE '%" . $_POST[ 'author' ] . "%'";

            $displayedText = "<table class=\"center\">\n<tr>\n<th>Title</th><th>Author</th><th>Genre</th><th>Price</th></tr>\n";
        #
        # Send Query to DB
        #
            $queryResult = $db->query($sqlQuery);
        $rowCount = 0;

        #
        # Results use fetchArray
        #
        while($row = $queryResult->fetchArray(SQLITE3_ASSOC)){
                        #
                        # Count rows
                        #
            $rowCount++;
            $displayedText .=  "<tr><td>" . $row['title'] . "</td><td>" . $row['author'] . "</td><td>" . $row['genre'] . "</td><td>$ " . $row['price'] . "</td</tr>\n";
        }

        $displayedText .=  "<tr><th colspan=4>" . $rowCount . " Results </td></tr>\n";
            $displayedText .= "</table>\n";
    }
}

?>

    <style type="text/css">
      figure { border: thin solid black;
               padding: 0 1em 0 1em;     
      }
      table {
               border-collapse: collapse; 
      }
      table, th, td {
               border: 2px solid ;
               padding: 5px;
      }
      .center {
        margin-left: auto;
        margin-right: auto;
      }
    </style>

<form action="authorgenre.php" method="post">
<figure>
<p>Genre: <select name="genre">
<?php
# New db connection
$dbGenre = new SQLite3('books.db');
#
# Query for tags
# 
$sqlQuery = "SELECT DISTINCT genre FROM genre ORDER BY genre";
#
# Build the select element in the form!
#
$queryResult = $dbGenre->query($sqlQuery);
while($row = $queryResult->fetchArray(SQLITE3_ASSOC)){
    print ("<option value=\"" . $row['genre'] . "\">" . $row['genre'] . "</option>\n");
    }
?>
</select></p>

<form action="authorgenre.php" method="post">

<p>Price: <select name="price">
<?php
# New db connection
$dbGenre = new SQLite3('books.db');
#
# Query for tags
# 
$sSqlQuery = "SELECT DISTINCT price FROM bookprice ORDER BY price";
#
# Build the select element in the form!
#
$queryRResult = $dbGenre->query($sSqlQuery);
while($row = $queryRResult->fetchArray(SQLITE3_ASSOC)){
    print ("<option value=\"" . $row['price'] . "\">$ " . $row['price'] . "</option>\n");
    }
?>
</select></p>

<p><label>Search: <input type="text" name="author" pattern="[A-Za-z ,]+" placeholder="Search for Authors or Books" 
     size="40"/></label></p>
<p><input type="submit" name="searchbar" value="Search"/></p>
</figure>
</form>





</body>
</html>
