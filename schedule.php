<?php

include "./includes/calendar_generator.php";

// Controleren of er wat gepost is
if(!empty($_POST["sName"])) {
	// Waardes declareren
	$sEventName		= $_POST ['sName'];
    $tTime		    = $_POST ['tTime'];
    $sDescription	= $_POST ['sDesc'];
    $sPeople		= $_POST ['sPeop'];

}

// Tijdzone
date_default_timezone_set("Europe/Amsterdam");

// Maand switch button
$prev = date("Y-m", mktime(0, 0, 0, date("m", $timestamp)-1, 1, date("Y", $timestamp)));
$next = date("Y-m", mktime(0, 0, 0, date("m", $timestamp)+1, 1, date("Y", $timestamp)));
?>

<!DOCTYPE html>

<html>
	<head>
		<!-- Titel, Bootstrap, en Stylesheet -->
		<title>Agenda</title>
		<link rel="stylesheet" href="./css/bootstrap.css">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
		<link href="./css/styles.css" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="css/navbar.css"/>

	</head>
        <body>
            <header>
                <nav>
                    <div class="logo">
                        <a href="./index.php"><img src="./images/thechallengezone_cover.png" href="./index.php" alt="hero image" style="width: 200px;"></a>
                    </div>
                    <ul class="nav-links">
                        <li><a href="./insturen.php">Project insturen</a></li>
                        <li><a href="./planning.php">Planning</a></li>
                        <li><a href="./documentatie.php">Documentatie</a></li>
                        <li><a href="./login.php">Inloggen</a></li>
                    </ul>
                </nav>
            </header>
            <div class="container">

			<!-- Ik weet dat PHP altijd bovenaan moet maar ik wist niets beter dan het zo te doen -->

            <div class="row">
                <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
            </div>

            <div class="row">

                <table class="table table-bordered">

                    <tr>
                        <th width=200>Monday</th>
                        <th width=200>Tuesday</th>
                        <th width=200>Wednesday</th>
                        <th width=200>Thursday</th>
                        <th width=200>Friday</th>
                        <th width=200>Saturday</th>
                        <th width=200>Sunday</th>
                    </tr>

                    <?php
                        foreach($weeks as $week) {
                            echo $week;
                        }
                    ?>

                </table>

                <hr/>

            </div>

            <br/>

            <!-- Form invullen op iets in te plannen -->
            <h2>Geselecteerde datum:</h2>
            <h3>Woensdag, 20/12/2023</h3>
            <form>
                Naam event:<br/>
                <input type="text" id="name" name="sName" required/>
                <hr/>
                Tijd:<br/>
                <input type="time" id="time" name="tTime" min="09:00" max="18:00" required/>
                <hr/>
                Beschrijving:<br/>
                <input type="text" id="desc" name="sDesc" required/>
                <hr/>
                Personen:<br/>
                <input type="text" id="pers" name="sPeop" required/>
                
                <hr/>
                <input type="submit" value="Verwijderen" name="delete" id="delete"><input type="submit" value="Oplaan" name="save" id="save">

            </form>

		</div>
	</body>
</html>