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
    <?php
    $number1 = 100;
    $number2 = "500";
    $number = $number2 + $number1;
    echo "<h1>".$number."</h1>";
    echo '<h1>$number</h1>';



    $i = 1;

    while($i < 7)
    {
        echo "<h1>Hello World</h1>";
        $i++;
    }


    $j = 1;
    while($j < 7)
    {
        echo "<h$j>I'm Erich</h$j>";
        $j++;
    }

    $i = 6;

    do{
        echo "<h$i>PHP is great</h$i>";
        $i--;
    }
    while($i > 0);

    for($i=1; $i <7; $i++)
    {
        echo "<h$i>Welcome</h$i>";
    }


    echo "<br /><br /><hr /><br />";
    $Full_Name = "Erich Osterman";
    $position = strpos($Full_Name,' ');

    echo $position;
    echo "<br /><br /><hr /><br />";

    echo $Full_Name;
    echo "<br />";

    echo $Full_Name = strtoupper($Full_Name);
    echo "<br /><br /><hr /><br />";

    echo $Full_Name;
    echo "<br />";

    echo $Full_Name = strtolower($Full_Name);
    echo "<br /><br /><hr /><br />";

    $nameParts = explode(' ',$Full_Name);
    echo $nameParts[0];
    echo "<br />";
    echo $nameParts[1];




    ?>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>

