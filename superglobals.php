<?xml version="1.0" encoding="UTF-8"?>
<?php 
  function PrintDict($dict) {
    print "<ul>\n";
    foreach ($dict as $key => $value) {
      $key=htmlspecialchars($key);
      if( is_array($value) ) {
          print "<li>PHP Array\n<ul>";
        foreach ($value as $k => $v) {
             $k=htmlspecialchars($k);
             $v=htmlspecialchars($v);
             print "<li><strong>${key}[$k]</strong>  $v</li>\n"; 
        }
        print "</ul></li>\n";
      } else {
        $value=htmlspecialchars($value);
        print "<li><strong>${key}</strong>  $value</li>\n";
      }
    }
    print "</ul>\n";
  }
  function FileUpload() {
     print "<h2>File Upload</h2>";
     print "<ul>\n";
     foreach ($_FILE as $key => $array) {
        $key=htmlspecialchars($key);
        print "<li>Input Name: $key ";
        if ( $array['error'] == UPLOAD_ERR_OK ) {
          $name = htmlspecialchars($array[name]);
          $size = htmlspecialchars($array[size]);
          $type = htmlspecialchars($array[type]);
          print "<ul>";
          print "<li>Filename: $name</li>";
          print "<li>File Size: $size</li>";
          print "<li>File Type: $type</li>";
          print "</ul></li>";
        } else {
          print "<strong>Error occured with upload</strong></li>";
        }
     }
     print "</ul>\n";     
  }
   $ContentType=null;
    if( array_key_exists("CONTENT_TYPE",$_SERVER) ) {
      $ContentType=$_SERVER['CONTENT_TYPE'];
    }

?>

<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>PHP Script Data</title>
</head>
<body>
  <h1>PHP Script Data</h1>

   <h2>$_Server Global Variable</h2>
   <ul>
   <?php
     PrintDict($_SERVER);
   ?>
   </ul>

   <?php
    if (isset($_COOKIES) && $_COOKIES) {
       print '<h2>$_COOKIE Global Variable</h2>';
       PrintDict($_COOKIE);
     }
     if (isset($_SESSION) &&  $_SESSION) {
       print '<h2>$_COOKIE Global Variable</h2>';
       PrintDict($_SESSION);
     }


     if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST) {
       print '<h2>$_POST Global Variable</h2>';
       print "<ul><li><strong>Content Type</strong> $ContentType </li></ul>\n";
       PrintDict($_POST);
       if( strpos($ContentType,'multipart/form-data') !== false) {
         File_Upload();
       }
     } elseif ( $_SERVER["REQUEST_METHOD"] == "GET" && $_GET ) {
       print '<h2>$_GET Global Variable</h2>';
       PrintDict($_GET);
     } else {
       print "<h2>No Data Sent</h2>";
     }
   ?>
</body>
</html>

