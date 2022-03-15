<?php
#
# Variable to make text output
#
$textOutput = "";
#
# If asearch (submit button) exists:
#
if ( array_key_exists('asearch',$_POST)){
        #
    # If string exists - you may need MORE checking for
        # other variables!
    #
    if (array_key_exists('author',$_POST)) {
                #
                # Connect to DB
        #
            $db = new SQLite3('books.db');
        #
                # Build query - note not safe from SQL injection!
        #
            $sqlQuery = "SELECT author, title, tag FROM books INNER JOIN booktags ON books.id=booktags.id WHERE tag='" . $_POST['genre'] . "' AND author LIKE '%" . $_POST[ 'author' ] . "%'";

            $textOutput = "<table class=\"center\">\n<tr>\n<th>Author</th><th>Title</th><th>Genre</th></tr>\n";
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
            $textOutput .=  "<tr><td>" . $row['author'] . "</td><td>" . $row['title'] . "</td><td>" . $row['tag'] . "</td</tr>\n";
        }

        $textOutput .=  "<tr><th colspan=3>" . $rowCount . " results returned</td></tr>\n";
            $textOutput .= "</table>\n";
    }
}

?>

<html>
<head>
  <title>Books!</title>
    <style type="text/css">
      figure { border: thin solid black;
               padding: 0 1em 0 1em;
               border-radius: 1em;
      }

      table {
               border-collapse: collapse;
      }

      table, th, td {
               border: 1px solid black;
               padding: 5px;
      }

      .center {
        margin-left: auto;
        margin-right: auto;
      }
    </style>
</head>


<body>

<?php
  print ( $textOutput . "<br/>\n" );
?>


<form action="authorgenre.php" method="post">
<figure>
<p><kbd>Genre: <select name="genre" multiple="multiple">
<?php
# New db connection
$dbGenre = new SQLite3('books.db');
#
# Query for tags
# 
$sqlQuery = "SELECT DISTINCT tag FROM booktags ORDER BY tag";
#
# Build the select element in the form!
#
$queryResult = $dbGenre->query($sqlQuery);
while($row = $queryResult->fetchArray(SQLITE3_ASSOC)){
    print ("<option value=\"" . $row['tag'] . "\">" . $row['tag'] . "</option>\n");
    }
?>
</select></p>

<p><kbd><label>Author Search: <input type="text" name="author"
     pattern="[A-Za-z ,]+" placeholder="Author string search" 
     required="required" size="40"/></label></kbd></p>
<p><input type="submit" name="asearch" value="Author Search"/></p>
</figure>
</form>

</body>
</html>