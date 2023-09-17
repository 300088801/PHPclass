<?php

$dice = array(1,2,3,4,5,6);

$userDice1=$dice[mt_rand(0, 5)];
$userDice2=$dice[mt_rand(0, 5)];
$userTotal = $userDice1 + $userDice2;


$compDice1=$dice[mt_rand(0, 5)];
$compDice2=$dice[mt_rand(0, 5)];
$compDice3=$dice[mt_rand(0, 5)];
$compTotal= $compDice1 + $compDice2 + $compDice3;

if ($userTotal > $compTotal)
{
    $winner="You Win";
}
elseif ($compTotal > $userTotal)
{
    $winner="Computer Wins";
}
else
{
    $winner="Tie";
}

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
    <h2>Dice Game</h2>
    <h4>Your Score:<?=$userTotal?></h4>
    <img src="../images/dice_<?=$userDice1 ?>.png" alt="User Dice 1">
    <img src="../images/dice_<?=$userDice2 ?>.png" alt="User Dice 2">
    <h4>Computers score :<?=$compTotal?></h4>
    <img src="../images/dice_<?=$compDice1 ?>.png" alt="Computer Dice 1">
    <img src="../images/dice_<?=$compDice2 ?>.png" alt="Computer Dice 2">
    <img src="../images/dice_<?=$compDice3 ?>.png" alt="Computer Dice 3">
    <h3>Result: <?=$winner ?></h3>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
