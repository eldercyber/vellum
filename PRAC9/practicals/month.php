<?php

function month_table($month,$year) {

# Set up return string and we will use the . operator
# to concatenate a string to return
$monthTable = "";
#
# Use date function to print month name
#
$monthName = date('F', mktime(0, 0, 0, $month, 10));

#
# Define the table header with caption and
# header row and the table start and stop tags
#
$weekendClass="class=\"weekend\"";
$todayClass="class=\"today\"";
$weekdayClass="";
$tableHeader = "<caption>$monthName $year</caption><th $weekendClass><b>Su</b></th><th><b>Mo</b></th><th><b>Tu</b></th><th><b>We</b></th><th><b>Th</b></th><th><b>Fr</b></th><th $weekendClass><b>Sa</b></th></tr>\n";
$tagTableStart="<table style=\"font-size: 80%;\">\n"; 
$tagTableEnd="</table>\n";
$tagRowStart="<tr>\n";
$tagRowEnd="</tr>\n";
# $tagCellStart="<td>\n";
$tagCellEnd="</td>";

# Today's date in Julian Day
$todayJD = gregoriantojd (date("n"), date("d"),  date("Y") );

# Set an empty array to hold the squares of the
# calendar.  The calendar will be 7 columns by
# n rows.  The number of squares (7 x n) will be
# equal to the number of days in the month plus
# any blank spaces at the start of the first 
# row and any black spaces at the end of the
# last row.

$cellsArray = array();

# Find the number of days in the month using cal_days_in_month
$daysInMonth=cal_days_in_month(CAL_GREGORIAN,$month,$year);

# We can use a function jddayofweek to determine the
# day of the week for a Julian Day, so we convert
# the first and last days to JD
$jdFirst=cal_to_jd(CAL_GREGORIAN,$month,1,$year);
$jdLast=cal_to_jd(CAL_GREGORIAN,$month,$daysInMonth,$year);

# The number of "padding" squares for the first line
# and the last line
$daysStartPad=jddayofweek($jdFirst,0);
$daysEndPad=6 - jddayofweek($jdLast,0);

# Number of cells = days in month + the "padding"; number
# of rows is the number of squares divided by 7
$numTableCells=$daysInMonth + $daysStartPad + $daysEndPad;
$numTableRows=($numTableCells / 7);

# Place days of the month in the appropriate square
for ($i=0; $i < $daysInMonth; $i++) {
    $cellsArray[$i+$daysStartPad] = $i+1;
}

# Add the table start tag and header
$monthTable = $monthTable . $tagTableStart . $tableHeader;

# For each row
for ($i=0; $i < $numTableRows; $i++) {
        # Start tag for the row
        $monthTable = $monthTable . $tagRowStart;
        # for each day of the week
    for ($j=0; $j < 7; $j++) {

        # Table cell is the index of the array
        $tableCell = ($i * 7) + $j;


    if (($j == 0) || ($j == 6)) {
     $tagCellStart="<td $weekendClass>";
    } else {
     $tagCellStart="<td $weekdayClass>";
    }
        # If the array key (index) exists, print the
        # Day of the week, otherwise print and empty
        # cell
        if (array_key_exists($tableCell, $cellsArray)) {
                # The date of the month cell in JD; format background if is today
        $cellJD = gregoriantojd ($month, $cellsArray[$tableCell], $year );
        if ($cellJD == $todayJD) { 
             $tagCellStart="<td $todayClass>";
        }
                $monthTable = $monthTable . $tagCellStart . "$cellsArray[$tableCell]" . $tagCellEnd;
    } else {
                $monthTable = $monthTable . $tagCellStart . " " . $tagCellEnd;

    }
    }
        $monthTable = $monthTable . $tagRowEnd;

}

# Add the table end tag
$monthTable = $monthTable .  $tagTableEnd;

return $monthTable;

}
?>
