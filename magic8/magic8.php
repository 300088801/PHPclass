<?php

    /*$names = array(); // indexed array
    $names{0}= "Bob";
    $names{1}= "Steve";
    var_dump($names);
    echo $names{0};

    $name = array("Bob", "Steve","Jim"); //can do it either way


    $name = array("Bob"=>"Jones", "Steve"=> "
    Daily"); //Associative Array -- this will print out Jones
    echo $name{"Bob"};*/

    $responses = array();
    $responses{0}= "Ask again later";
    $responses{1}= "Yes";
    $responses{2}= "No";
    $responses{3}= "It appears to be so";
    $responses{4}= "Reply is hazy, please try again";
    $responses{5}= "Yes, definitely";
    $responses{6}= "What is you rewally want to know";
    $responses{7}= "Outlook is good";
    $responses{8}= "My sources say no";
    $responses{9}= "Signs point to yes";
    $responses{10}= "Don't count on it";
    $responses{11}= "Cannot predict now";
    $responses{12}= "As I see it, Yes";
    $responses{13}= "Better not tell you now";
    $responses{14}= "Concentrate and ask again";

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
    <h2>Magic 8 Ball</h2>
    <hr>
    <br>
    <marquee> Ask me a question</marquee>
    <br>
    <p>Please ask a question:<br>
    <input type="text"></p
    <input type="submit" value="Ask the 8 Ball">
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
