<?php
require 'month.php';

$nmonth=8;
$year=2020;
$month = month_table($nmonth,$year);

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
     <title>School of Sciences: Course CSC3426</title>
     <link rel="shortcut icon" href="/favicon.ico" />
     <style type="text/css">table {font-size: 80%;} td {text-align: right; padding: 0.5ex;} .weekend {background-color: #A6EDFF;} .today{background-color: #F5A442;} </style></head>

<body>
    <div id="body">
        <div id="contents">
<?php
print $month;
?>
        </div>
    </div>
</body>
</html>
