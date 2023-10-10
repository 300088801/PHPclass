<?php
//Database stuff
include '../Includes/dbConn.php';

if(isset($_POST["txtTitle"]))
    {if(isset($_POST["txtRating"]))
        {
        $title = $_POST["txtTitle"];
        $rating= $_POST["txtRating"];
        $id = $_POST["txtID"]; // after the user has updated

        //Database stuff
        include '../Includes/dbConn.php';
        try{
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("update movielist set movieTitle = :Title, movieRating = :Rating where movieID = :ID");
            $sql->bindValue(":Title", $title);
            $sql->bindValue(":Rating",$rating);
            $sql->bindValue(":ID",$id);
            $sql->execute();

        }catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }

        header("Location:movielist.php");
        }

}
if(isset($_GET["id"])){
    $id=$_GET["id"];
    try{
        $db = new PDO($dsn, $username, $password, $options);

        $sql = $db->prepare("select * from movielist where movieID = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $row = $sql->fetch();

        $title = $row["movieTitle"];
        $rating = $row["movieRating"];

    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }
}
else {
    header("Location:movielist.php"); //kicks the user back to the movielist homepage if there id is not set
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
    <script type="text/javascript">
        function DeleteMovie(title,id) {
            if(confirm("Do you want to delete " + title)){

                document.location.href = "moviedelete.php?id=" + id;

            }
        }
    </script>
</head>
<body>
<header><?php include '../Includes/Header.php'?></header>
<nav> <?php include '../Includes/nav.php'?></nav>
<main>
    <form method="post" >
        <table border="1" width="80%">
            <tr height="60">
                <th colspan="2"><h3>Update Movie</h3></th>
            </tr>
            <tr height="60">
                <th>Movie Name</th>
                <td><input id="txtTitle" name="txtTitle" type="text" size="50" value="<?= $title?>"></td>  <!--inline php to insert our values from above into the rows when the user clicks to update-->
            </tr>
            <tr height="60">
                <th>Movie Rating</th>
                <td><input id="txtRating" name="txtRating" type="text" size="50" value="<?= $rating?>" ></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Update Movie"> | <input type="button" onclick="DeleteMovie('<?= $title?>', <?=$id?>)" value="Delete Movie">
                </td>
            </tr>
        </table>
        <input type="hidden" id="txtID" name="txtID" value="<?= $id?>">
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>

