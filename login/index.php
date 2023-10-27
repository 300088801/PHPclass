<?php
session_start(); //open up a session-this session allows a person not to go right to the admin page

if(isset($_POST["txtUsername"])) {
    if (isset($_POST["txtLoginPassword"])) {
        $userName = $_POST["txtUsername"];
        $loginPassword = $_POST["txtLoginPassword"];
        $errmsg="";

        if (strtolower($userName)== "admin" && $loginPassword == "p@ss")
        {
            header("Location:admin.php"); //take them to the admin page if they have the right credentials
            $_SESSION{"UID"}=1;
        }
        else
        {
            if (strtolower($userName)== "user" && $loginPassword == "p@ss")
            {
                header("Location:member.php");
            }
            else
            {$errmsg="Wrong Username or Password";}
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
                <th>Username</th>
                <td><input id="txtUsername" name="txtUsername" type="text" size="50"></td>  <!--inline php to insert our values from above into the rows when the user clicks to update-->
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
