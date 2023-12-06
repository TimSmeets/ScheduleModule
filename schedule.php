<?php

$strJanuarie = "";
$strFebruari = "";
$strMaart = "";
$strApril = "";
$strMei = "";
$strJuni = "";
$strJuli = "";
$strZaterdag = "";
$strAugustus = "";
$strSeptember = "";
$strOktober = "";
$strNovember = "";
$strDecember = "";

$intDaynumber = date("N");

switch($intDaynumber){
    // Maandag
    case "1":
        $strZondag = "- 1 days";
        $strMaandag = "- 0 days";
        $strDinsdag = "+ 1 days";
        $strWoensdag = "+ 2 days";
        $strDonderdag = "+ 3 days";
        $strVrijdag = "+ 4 days";
        $strZaterdag = "+ 5 days";
        break;
    //dinsdag
    case "2":
        $strZondag = "- 2 days";
        $strMaandag = "- 1 days";
        $strDinsdag = "- 0 days";
        $strWoensdag = "+ 1 days";
        $strDonderdag = "+ 2 days";
        $strVrijdag = "+ 3 days";
        $strZaterdag = "+ 4 days";
        break;
    //woensdag
    case "3":
        $strZondag = "- 3 days";
        $strMaandag = "-2 days";
        $strDinsdag = "- 1 days";
        $strWoensdag = "- 0 days";
        $strDonderdag = "+ 1 days";
        $strVrijdag = "+ 2 days";
        $strZaterdag = "+ 3 days";
        break;

    //donderdag
    case "4":
        $strZondag = "- 4 days";
        $strMaandag = "- 3 days";
        $strDinsdag = "- 2 days";
        $strWoensdag = "- 1 days";
        $strDonderdag = "- 0 days";
        $strVrijdag = "+ 1 days";
        $strZaterdag = "+ 2 days";
        break;
    //vrijdag
    case "5":
        $strZondag = "- 5 days";
        $strMaandag = "- 4 days";
        $strDinsdag = "- 3 days";
        $strWoensdag = "- 2 days";
        $strDonderdag = "- 1 days";
        $strVrijdag = "- 0 days";
        $strZaterdag = "+ 1 days";
        break;
    //zaterdag
    case "6":
        $strZondag = "- 6 days";
        $strMaandag = "- 5 days";
        $strDinsdag = "- 4 days";
        $strWoensdag = "- 3 days";
        $strDonderdag = "-2 days";
        $strVrijdag = "- 1 days";
        $strZaterdag = "- 0 days";
        break;
    //zondag
    case "7":
        $strZondag = "- 7 days";
        $strMaandag = "- 6 days";
        $strDinsdag = "- 5 days";
        $strWoensdag = "- 4 days";
        $strDonderdag = "- 3 days";
        $strVrijdag = "- 2 days";
        $strZaterdag = "- 1 days";
        break;
    default :
        echo("Ongeldige dagwaarde"); exit;
}

    echo('
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
                <link rel="stylesheet" type="text/css" href="css/style.css"/>
                <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
                <style>table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    }
                table{
                    width:100%
                </style>
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

            <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="scheduleMenu">
                                <div class="headText">
                                    <p>THE CHALLANGE ZONE</p>
                                </div>  
                                <div class="buttons">
                                    <a href="#">Home</a>
                                    <a href="#">Over ons</a>
                                    <a href="#">Insturen</a>
                                    <a class="login" href="#">Login <img src="./images/profile%20icon.png" alt="Profile Icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        <table>  
                <h2>'.date("M").'</h2>
                <tr>
                <th>Zondag, '.date("d-m-Y", strtotime($strZondag)).'</th>
                <th>Maandag, '.date("d-m-Y", strtotime($strMaandag)).'</th>
                <th>Dinsdag, '.date("d-m-Y", strtotime($strDinsdag)).'</th>
                <th>Woensdag, '.date("d-m-Y", strtotime($strWoensdag)).'</th>
                <th>Donderdag, '.date("d-m-Y", strtotime($strDonderdag)).'</th>
                <th>Vrijdag, '.date("d-m-Y", strtotime($strVrijdag)).'</th>
                <th>Zaterdag, '.date("d-m-Y", strtotime($strZaterdag)).'</th>
                </tr>');

    echo("<tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>");

echo("</table>
    </body>
</html>
");
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>