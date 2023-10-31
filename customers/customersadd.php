<?php
session_start();
$customerKey= sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
//Database stuff
//include '../Includes/dbConn.php';
require_once('../Includes/dbConn.php');

    if(isset($_POST["txtFirstName"], $_POST["txtLastName"], $_POST["txtAddress"], $_POST["txtCity"], $_POST["txtState"], $_POST["txtZip"], $_POST["txtPhone"], $_POST["txtEmail"], $_POST["txtPassword"]))
    {

        $firstName= $_POST["txtFirstName"];
        $lastName= $_POST["txtLastName"];
        $address= $_POST["txtAddress"];
        $city= $_POST["txtCity"];
        $state= $_POST["txtState"];
        $zip= $_POST["txtZip"];
        $phone= $_POST["txtPhone"];
        $email= $_POST["txtEmail"];
        $customerPassword= $_POST["txtPassword"];



        try{
            require_once('../Includes/dbConn.php');
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("insert into customers (firstName,lastName,address,city,state,zip,phone,email,password,memberKey) Value (:firstName,:lastName,:address,:city,:state,:zip,:phone,:email,:password,:Key)");
            $sql->bindValue(":firstName",$firstName);
            $sql->bindValue(":lastName",$lastName);
            $sql->bindValue(":address",$address);
            $sql->bindValue(":city",$city);
            $sql->bindValue(":state",$state);
            $sql->bindValue(":zip",$zip);
            $sql->bindValue(":phone",$phone);
            $sql->bindValue(":email",$email);
            $sql->bindValue(":password",md5($customerPassword . $customerKey));
            $sql->bindValue(":Key",$customerKey);
            $sql->execute();

        }catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error 1: $error";
        }
        echo $customerKey;
        echo $customerPassword;
        //header("Location:customers.php");
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
        <table border="1" width="80%">
            <tr height="60">
                <th colspan="2"><h3>Customer Database: Add a New Customer</h3></th>
            </tr>
            <tr height="60">
                <th>First Name</th>
                <td><input id="txtFirstName" name="txtFirstName" type="text" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Last Name</th>
                <td><input id="txtLastName" name="txtLastName" type="text" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Address</th>
                <td><input id="txtAddress" name="txtAddress" type="text" size="50"> </td>
            </tr>
            <tr height="60">
                <th>City</th>
                <td><input id="txtCity" name="txtCity" type="text" size="50"> </td>
            </tr>
            <tr height="60">
                <th>State</th>
                <td><input id="txtState" name="txtState" type="text" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Zip</th>
                <td><input id="txtZip" name="txtZip" type="text" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Phone</th>
                <td><input id="txtPhone" name="txtPhone" type="tel" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="email" size="50"> </td>
            </tr>
            <tr height="60">
                <th>Password</th>
                <td><input id="txtPassword" name="txtPassword" type="password" size="50"> </td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Add Customer">
                </td>
            </tr>
        </table>
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
