<?php

$dice = array(1,2,3,4,5,6);
$getTotal =mt_rand(0,5);

$userDice1=$dice[$getTotal];
$userDice2=$dice[$getTotal];
$userTotal = $userDice1 + $userDice2;


$compDice1=$dice[$getTotal];
$compDice2=$dice[$getTotal];
$compDice3=$dice[$getTotal];
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

echo $userTotal;
echo $compTotal;


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
    <img src="i">
    <img src="">
    <h4>Computers score :<?=$compTotal?></h4>
    <img src="">
    <img src="">
    <img src="">
    <h3>Result: <?=$winner ?></h3>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
