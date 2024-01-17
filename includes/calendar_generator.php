<?php
// Het jaar en de maand van nu ophalen
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

// Datum van vandaag ophalen
$today = date("Y-m-j", time());
$html_title = date("Y / m", $timestamp);

// Totale aantal dagen tellen voor een bepaalde maand
$day_count = date("t", $timestamp);
$str = date("w", mktime(0, 0, 0, date("m", $timestamp), 1, date("Y", $timestamp)));

$weeks = array();
$week = "";

$week .= str_repeat("<td></td>", $str);

// Nummers toevoegen aan de calendar dagen
for ( $day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym."-".$day;

    // Markeer de dag van vandaag in lichtblauw
    if ($today == $date) {
        $week .= "<td class='today'><input type='submit' value='".$day."'>";
    } else {
        $week .= "<td><input type='submit' value='".$day."'>";
    }
    $week .= "</td>";

    // Einde van de calendar
    if ($str % 7 == 6 || $day == $day_count) {
        if($day == $day_count) {
            $week .= str_repeat("<td></td>", 6 - ($str % 7));
        }

        $weeks[] = "<tr>".$week."</tr>";
        $week = "";
    }
}