<?php
// Getting current year and month for calander page selection
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    $ym = date("Y-m");
}

// Format type
$timestamp = strtotime($ym."-01");
if ($timestamp === false) {
    $ym = date("Y-m");
    $timestamp = strtotime($ym."-01");
}

// Getting current date
$today = date("Y-m-j", time());
$html_title = date("Y / m", $timestamp);

// Counting amount of days to generate
$day_count = date("t", $timestamp);
$str = date("w", mktime(0, 0, 0, date("m", $timestamp), 1, date("Y", $timestamp)));

$weeks = array();
$week = "";

$week .= str_repeat("<td></td>", $str);

// Adding numbers to calander days
for ( $day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym."-".$day;

    // Marks current day as today and makes the background-color lightblue
    if ($today == $date) {
        $week .= "<td class='today'>".$day;
    } else {
        $week .= "<td>".$day;
    }
    $week .= "<br/><br/><input type='submit' value='Selecteren'></td>";

    // End of calander page
    if ($str % 7 == 6 || $day == $day_count) {
        if($day == $day_count) {
            $week .= str_repeat("<td></td>", 6 - ($str % 7));
        }

        $weeks[] = "<tr>".$week."</tr>";
        $week = "";
    }
}