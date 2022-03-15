<?php
require 'month.php';

function year_table($year) {


        $thisMonth = date("n");
        $thisYear = date("Y");

    $tableHeader = "<caption>$year</caption>\n";
    $tagTableStart="<table style=\"font-size: 80%;\">\n";
    $tagTableEnd="</table>\n";
    $tagRowStart="<tr>\n";
    $tagRowEnd="</tr>\n";
    $tagCellStart="<td valign=\"top\">\n";
    $tagCellTMStart="<td valign=\"top\" class=\"thismonth\">\n";
    $tagCellEnd="</td>\n";

    $nRows = 4;
    $nCols = 3;

    print $tagTableStart;
    print $tableHeader;
    for ($i=0; $i < $nRows; $i++) {
            print $tagRowStart;
        for($j=1; $j <= $nCols; $j++) {

            $nmonth = ($i * $nCols) + $j;
                        if (($thisMonth ==  $nmonth) && ($thisYear == $year)) {
                print $tagCellTMStart;
            } else {
                print $tagCellStart;
            }


            $monthName = date('F', mktime(0, 0, 0, $nmonth, 10));
            $month = month_table($nmonth,$year);
                        $month = str_replace("$monthName $year","$monthName",$month);

                print $month;

                print $tagCellEnd;
        }
            print $tagRowStart;

    }
    print $tagTableEnd;
}


?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
     <title>School of Sciences: Course CSC3426</title>
     <link rel="shortcut icon" href="/favicon.ico" />
     <style type="text/css">table {font-size: 80%;} td {text-align: right; padding: 0.5ex;} .weekend {background-color: #A6EDFF;} .today{background-color: #F5A442;} .thismonth{background-color: #F5F107;}</style></head>

<body>
    <div id="body">
        <div id="contents">
<?php
year_table(2020);
?>
        </div>
    </div>
</body>
</html>
