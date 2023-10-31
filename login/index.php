<?php
session_start(); //open up a session-this session allows a person not to go right to the admin page

if(isset($_POST["txtEmail"])) {
    if (isset($_POST["txtLoginPassword"])) {
        $email = $_POST["txtEmail"];
        $loginPassword = $_POST["txtLoginPassword"];
        $errmsg="";



        include '../Includes/dbConn.php';


        try{
            $db = new PDO($dsn, $username, $password, $options); // trying to connect using PDO

            $sql = $db->prepare("select memberID, memberPassword, memberKey,RoleID from memberLogin where memberEmail = :Email"); //asking for all of the fields in our database movielist
            $sql->bindValue(":Email",$email ); // we enforce unique email policy in our memberLogin table
            $sql->execute(); //database gets records and retrieve it into our sql
            $row = $sql->fetch(); // grabs the first row

            if($row != null)
            {
                $hashedPassword=md5($loginPassword . $row["memberKey"]);
                if($hashedPassword == $row["memberPassword"])
                {
                    $_SESSION{"UID"}=1;
                    $_SESSION{"Role"} = $row["RoleID"];
                    if($row["RoleID"]==1)
                    {
                        header("Location:admin.php");
                    }
                    else
                    {
                        header("Location:member.php");
                    }
                }
                else
                {
                    $errmsg = "Wrong Password";
                }
            }
            else
            {
                $errmsg = "Wrong Username";
            }



        }catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }
    }
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
    <form method="post" >
        <h3 id="error"><?=$errmsg?></h3> // this displays if our user types in the wrong user or password
        <table border="1" width="80%">
            <tr height="60">
                <th colspan="2"><h3>User Login</h3></th>
            </tr>
            <tr height="60">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="text" size="50"></td>  <!--inline php to insert our values from above into the rows when the user clicks to update-->
            </tr>
            <tr height="60">
                <th>Password</th>
                <td><input id="txtLoginPassword" name="txtLoginPassword" type="password" size="50"></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
