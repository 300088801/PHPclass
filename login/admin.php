<?php
session_start();
$errmsg="";
if(!isset($_SESSION["UID"]))
{
    header("Location:index.php"); // if session isn't true, user is sent back to main page
}

if(isset($_POST["submit"]))
{
    if(empty($_POST["txtFName"]))
    {
        $errmsg = "Name is required";
    }
    else{
        $FName=$_POST["txtFName"];
    }

    if(empty($_POST["txtEmail"]))
    {
        $errmsg = "Email is required";
    }
    else{
        $Email=$_POST["txtEmail"];
    }

    if(empty($_POST["txtLoginPassword"]))
    {
        $errmsg = "Password is required";
    }
    else{
        $LoginPassword=$_POST["txtLoginPassword"];
    }

    if($LoginPassword != $_POST["txtPassword2"])
    {
        $errmsg = "Passwords do not match!";
    }

    if(empty($_POST["txtRole"]))
    {
        $errmsg = "Role is required";
    }
    else{
        $Role=$_POST["txtRole"];
    }

    if($errmsg=="") // if no error messages, we can do database work
    {
        //Database stuff
        include '../Includes/dbConn.php';
        try{
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("insert into memberLogin (memberName,memberEmail,memberPassword,RoleID,memberKey) Value (:Name,:Email,:Password,:RID,:Key)");

            $sql->bindValue(":Name", $FName);
            $sql->bindValue(":Email",$Email);
            $sql->bindValue(":Password",$LoginPassword);
            $sql->bindValue(":RID",$Role);
            $sql->bindValue(":Key","XXXXXXXXXXXX");
            $sql->execute();

        }catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }

        $FName="";
        $Email = "";
        $errmsg= "Member Added to Database";
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
    <h1>Admin Page</h1>
    <h3 id="error"><?=$errmsg?></h3>
    <form method="post" >
        <table border="1" width="80%">
            <tr height="60">
                <th colspan="2"><h3>Add New Member</h3></th>
            </tr>
            <tr height="60">
                <th>Full Name</th>
                <td><input id="txtFName" name="txtFName" value="<?=$FName?>" type="text" size="50" required</td>  <!--inline php to insert our values from above into the rows when the user clicks to update-->
            </tr>
            <tr height="60">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" value="<?=$Email?>" type="text" size="50" required></td>
            </tr>
            <tr height="60">
                <th>Password</th>
                <td><input id="txtLoginPassword" name="txtLoginPassword" type="password" size="50"></td>
            </tr>
            <tr height="60">
                <th>Retype Password</th>
                <td><input id="txtPassword2" name="txtPassword2" type="password" size="50"></td>
            </tr>
            <tr height="60">
                <th>Role</th>
                <td>
                    <select id="txtRole" name="txtRole">
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Members</option> // these are our values in the database
                    </select>
                </td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Add New Member" name="submit">
                </td>
            </tr>
        </table>
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>

