<?php
	
	// Tijdzone
	date_default_timezone_set("Europe/Amsterdam");

	// Maand
	if (isset($_GET['ym'])) {
		$ym = $_GET['ym'];
	} else {
		$ym = date("Y-m");
	}

	// Format
	$timestamp = strtotime($ym."-01");

	if ($timestamp === false) {
		$ym = date("Y-m");
		$timestamp = strtotime($ym."-01");
	}
	
	// Datum van vandaag vinden
	$today = date("Y-m-j", time());
	$html_title = date("Y / m", $timestamp);

	// Door maanden kunnen klikken
	$prev = date("Y-m", mktime(0, 0, 0, date("m", $timestamp)-1, 1, date("Y", $timestamp)));
	$next = date("Y-m", mktime(0, 0, 0, date("m", $timestamp)+1, 1, date("Y", $timestamp)));

	$day_count = date("t", $timestamp);
	$str = date("w", mktime(0, 0, 0, date("m", $timestamp), 1, date("Y", $timestamp)));

	$weeks = array();
	$week = "";

	$week .= str_repeat("<td></td>", $str);

	for ( $day = 1; $day <= $day_count; $day++, $str++) {
		$date = $ym."-".$day;

		if ($today == $date) {
			$week .= "<td class='today'>".$day;
		} else {
			$week .= "<td>".$day;
		}
		$week .= "</td>";

		// Einde vd Week/Maand
		if ($str % 7 == 6 || $day == $day_count) {
			if($day == $day_count) {
				$week .= str_repeat("<td></td>", 6 - ($str % 7));
			}

			$weeks[] = "<tr>".$week."</tr>";
			$week = "";
		}
	}

?>

<!DOCTYPE html>

<html>

	<head>
		
		<!-- Titel, Bootstrap, en Stylesheet -->
		<title>Agenda</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
		<link href="./styling/styles.css" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="css/navbar.css"/>

	</head>

	<body>

		<header>
            <nav>
                <div class="logo">
                    <a href="./index.php"><img src="./images/thechallengezone_cover.png" href="./index.php" alt="hero image" style="width: 200px; height: auto;"></a>
                    </div>
                    <ul class="nav-links">
                        <li><a href="./insturen.php">Project insturen</a></li>
                        <li><a href="./planning.php">Planning</a></li>
                        <li><a href="./documentatie.php">Documentatie</a></li>
                    <li><a href="./login.php">Inloggen</a></li>
                </ul>
            </nav>
        </header>
		
			<br>
			<br>
			<br>
			<br>
			<br>

		<div class="container">

			<!-- Ik weet dat PHP altijd bovenaan moet maar ik wist niets beter dan het zo te doen -->

			<h3><a href="?ym=<?php echo $prev; ?>">&lt;</a><?php echo $html_title; ?><a href="?ym=<?php echo $next; ?>">&gt;</a></h3>

			<br>

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

		</div>

	</body>

</html>