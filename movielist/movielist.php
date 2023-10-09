
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

    <table border="1" width="80%" >
        <tr>
            <th>Key</th>
            <th>Movie Title</th>
            <th>Rating</th>
        </tr>
    <?php
    include '../Includes/dbConn.php';


    try{
        $db = new PDO($dsn, $username, $password, $options); // trying to connect using PDO

        $sql = $db->prepare("select * from movielist"); //asking for all of the fields in our database movielist
        $sql->execute(); //database gets records and retrieve it into our sql
        $row = $sql->fetch(); // grabs the first row


        while($row != null) //our loop to continue grabbing records as long as our row isnt null
        {
            echo"<tr>";
            echo"<td>" . $row["movieID"] . "</td>";   // we throw our table data into the table on our website
            echo"<td>" . $row["movieTitle"] . "</td>";
            echo"<td>" . $row["movieRating"] . "</td>";
            echo"</tr>";



            $row = $sql->fetch(); //after echoing our data from the row, we try to grab the next row to continue our loop
        }

    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }



    ?>
    </table>
    <br /><br /><br />
    <a href="movieadd.php">Add New Movie</a>

</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
