<?php
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
    <h3>My Movie List</h3>
    <?php
    include '../includes/dbConn.php';


    try{
        $db = new PDO($dsn, $username, $password, $options);

        $sql = $db->prepare("select * from movielist");
        $sql->execute();
        $row = $sql->fetch();

        echo $row["movieTitle"];
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }



    ?>

</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
