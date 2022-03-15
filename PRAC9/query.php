<?php
#
# Build output
#
$textOutput = "";
#
# Check keys exist
#
if ( array_key_exists('asearch', $_POST)) {

    if ( array_key_exists('author', $_POST)) {
                #
        # Connect to the database
        #
        $db = new SQLite3('books.db');
        # 
        # Sanitise data using escapeString method
        #
                $sanitisedData = $db->escapeString( $_POST[ 'author' ] );
        #
        # Original query without sanitization
                # $sqlQuery = "SELECT author, title FROM books WHERE author LIKE '%" . $_POST[ 'author' ]. "%'";
                # SQL Query
        #
        $sqlQuery = "SELECT author, title, tag FROM books INNER JOIN booktags ON books.id=booktags.id WHERE author LIKE '%" . $sanitisedData . "%'";
        $textOutput = "<table class=\"center\">\n<tr>\n<th>Author</th><th>Title</th><th>Genre</th></tr>\n";
        # 
        # Execute query
        #
                $queryResult = $db->query($sqlQuery);
                $rowCount = 0;
        #
        # Iterate through data structure; each row is an array
        #
                while ($row = $queryResult->fetchArray(SQLITE3_ASSOC)) {
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


<form action="query.php" method="post">
<figure>
<p><kbd><label>Author Search: <input type="text" name="author"
      placeholder="Author string search" 
     required="required" size="40"/></label></kbd></p>
<p><input type="submit" name="asearch" value="Author Search"/></p>
</figure>
</form>

</body>
</html>
