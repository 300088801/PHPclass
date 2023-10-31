<?php
session_start();

$role = $_SESSION["Role"];
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
    <h1>Member Page</h1>
    <?php
    if ($role == 2)
        {
            // Operator role
            echo '<h2>Operator Work Schedule</h2>';
            // Display the table for operators
                echo '<table>';
                echo '<table style="background-color: orange;">';
                    echo '<tr><th>Day</th><th>Hours</th></tr>';
                    echo '<tr><td>Monday</td><td>8:00-5:30</td></tr>';
                    echo '<tr><td>Tuesday</td><td>8:00-5:00</td></tr>';
                    echo '<tr><td>Wednesday</td><td>8:00-5:00</td></tr>';
                    echo '<tr><td>Thursday</td><td>8:00-5:30</td></tr>';
                    echo '<tr><td>Friday</td><td>7:30-3:00</td></tr>';
                echo '</table>';
        }
        elseif ($role == 3)
        {
            echo '<h2>Welcome Member!</h2>';
            echo '<p>Being a member is great, but being an operator is ever better! You get access to exclusive deals and races. Reach out to one of our employees to become an operator</p>';
        }
        else {
        // Handle other roles or unexpected cases
        echo '<p>Unknown Role</p>';
    }
    ?>


</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>

