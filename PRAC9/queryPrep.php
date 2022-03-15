<?php
#
# Using preparation to thwart SQL injection
#
$textOutput = "";
#
# Check keys passed to script?
#
if ( array_key_exists('asearch', $_POST)) {

    if ( array_key_exists('author', $_POST)) {
        #
        # Connect to DB
        #
        $db = new SQLite3('books.db');

                # $sanitisedData = $db->escapeString( $_POST[ 'author' ] );

        #
        # Prepare the statment with placeholder(s)
        #
                $stmt = $db->prepare("SELECT author, title FROM books WHERE author LIKE :auth");
        #
        # Bind value to the placeholder
        #
                $stmt->bindValue(':auth', "%" . $_POST['author'] . "%" );
        #
        # Executre prepared query
        #
                $queryResult = $stmt->execute();
        #
        # Parse results
        #
                while ($row = $queryResult->fetchArray(SQLITE3_ASSOC)) {
            $textOutput .= $row[ 'author' ] . " -- " . $row[ 'title' ] . "<br/>\n";
            }

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


<form action="queryPrep.php" method="post">
<figure>
<p><kbd><label>Author Search: <input type="text" name="author"
      placeholder="Author string search" 
     required="required" size="40"/></label></kbd></p>
<p><input type="submit" name="asearch" value="Author Search"/></p>
</figure>
</form>

</body>
</html>
