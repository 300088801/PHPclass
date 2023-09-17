<?php
session_start(); // variable that will exist for the duration of the session


    /*$names = array(); // indexed array
    $names{0}= "Bob";
    $names{1}= "Steve";
    var_dump($names);
    echo $names{0};

    $name = array("Bob", "Steve","Jim"); //can do it either way


    $name = array("Bob"=>"Jones", "Steve"=> "
    Daily"); //Associative Array -- this will print out Jones
    echo $name{"Bob"};*/
    if(isset($_POST{"txtQuestion"})) //checks to see if they asked a question. If they did, question variable will hold the question
        {$question = $_POST{"txtQuestion"};}
    else
    {$question="";}

    if(isset($_SESSION{"PrevQuest"}))
    {
        $PrevQuest = $_SESSION{"PrevQuest"};
    }
    else{
        $PrevQuest = "";
    }

    //Fill a list of responses
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


    if($question =="")
    {
        $answer = "Ask me a question";
    }
    elseif (substr($question, -1)!= "?")
    {
        $answer = "Ask me a question and use proper punctuation!";
    }
    elseif ($PrevQuest==$question)
    {
        $answer = "Please ask a new question!!!!!!!";
    }
    else
    {
        $iResponse = mt_rand(0,14);
        $answer = $responses[$iResponse];
        $_SESSION{"PrevQuest"} = $question;
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
    <h2>Magic 8 Ball</h2>
    <hr>
    <br>
    <marquee><?=$answer?></marquee>
    <p>Please ask a question:<br>
    <form method="post" action="magic8.php">
        <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>"></p>
        <input type="submit" value="Ask the  magic 8 Ball">
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
