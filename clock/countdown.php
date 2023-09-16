<?php
/* This is a countdown timer
 End of the school year (5/20/23)*/


$secPerMinute = 60;
$secPerHour = 60 * $secPerMinute;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;

//current time
$now = time();

//End of school time
$endOfSchool = mktime(12,0,0,5,24,24);

// Number of seconds between now and the end of the school year

$seconds = $endOfSchool - $now;
$years = floor($seconds/$secPerYear);
$seconds = $seconds - ($years * $seconds);

$days = floor($seconds / $secPerDay); //86400
$seconds = $seconds -($days * $secPerDay);

$hours = floor($seconds / $secPerHour); //3600 seconds in an hour
$seconds = $seconds -($hours * $secPerHour);

$minutes= floor($seconds / $secPerMinute);
$seconds = $seconds -($minutes * $secPerMinute);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erich's Homepage</title>
    <link type= "text/css" rel="stylesheet" href="../css/base.css">
</head>
<body>
<header><?php include '../Includes/Header.php'?></header>
<nav> <?php include '../Includes/nav.php'?></nav>
<main>
    <h3>End of the School Year Countdown!</h3>
    <p>Years: <?=$years ?> | Days: <?=$days ?> | Hours: <?=$hours ?> | Minutes: <?=$minutes ?> | Seconds: <?=$seconds ?></p>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>


