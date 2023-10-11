<?php

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
        $id = $_POST["txtID"];

        try{
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("update customers set firstName = :firstName, lastName = :lastName ,Address = :address, city = :city, state = :state, zip = :zip, phone = :phone, email= :email,password = :password where customerID= :ID");
            $sql->bindValue(":firstName",$firstName);
            $sql->bindValue(":lastName",$lastName);
            $sql->bindValue(":address",$address);
            $sql->bindValue(":city",$city);
            $sql->bindValue(":state",$state);
            $sql->bindValue(":zip",$zip);
            $sql->bindValue(":phone",$phone);
            $sql->bindValue(":email",$email);
            $sql->bindValue(":password",$customerPassword);
            $sql->bindValue(":ID",$id);
            $sql->execute();

        }catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error 4: $error";
        }

        header("Location:customers.php");
    }

if(isset($_GET["id"])){
    $id=$_GET["id"];
    try{
        $db = new PDO($dsn, $username, $password, $options);

        $sql = $db->prepare("select * from customers where customerID = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $row = $sql->fetch();

        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $zip = $row["zip"];
        $phone = $row["phone"];
        $email = $row["email"];
        $customerPassword = $row["password"];

    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Error 3: $error";
    }
}
else {
    header("Location:customers.php"); //kicks the user back to the customers homepage if their id is not set
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
        function DeleteCustomer(first,last, id) {
            if(confirm("Do you want to delete " + first + " " + last)){

                document.location.href = "customersdelete.php?id=" + id;

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
                <th colspan="2"><h3>Customer Database: Update Customer Information</h3></th>
            </tr>
            <tr height="60">
                <th>First Name</th>
                <td><input id="txtFirstName" name="txtFirstName" type="text" size="50" value="<?= $firstName?>"> </td>
            </tr>
            <tr height="60">
                <th>Last Name</th>
                <td><input id="txtLastName" name="txtLastName" type="text" size="50" value="<?= $lastName?>"> </td>
            </tr>
            <tr height="60">
                <th>Address</th>
                <td><input id="txtAddress" name="txtAddress" type="text" size="50" value="<?= $address?>"> </td>
            </tr>
            <tr height="60">
                <th>City</th>
                <td><input id="txtCity" name="txtCity" type="text" size="50" value="<?= $city?>"> </td>
            </tr>
            <tr height="60">
                <th>State</th>
                <td><input id="txtState" name="txtState" type="text" size="50" value="<?= $state?>"> </td>
            </tr>
            <tr height="60">
                <th>Zip</th>
                <td><input id="txtZip" name="txtZip" type="text" size="50" value="<?= $zip?>"> </td>
            </tr>
            <tr height="60">
                <th>Phone</th>
                <td><input id="txtPhone" name="txtPhone" type="tel" size="50" value="<?= $phone?>"> </td>
            </tr>
            <tr height="60">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="email" size="50" value="<?= $email?>"> </td>
            </tr>
            <tr height="60">
                <th>Password</th>
                <td><input id="txtPassword" name="txtPassword" type="password" size="50" value="<?= $customerPassword?>"> </td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Update Customer" value="Update Customer"> | <input type="button" onclick="DeleteCustomer('<?= $firstName?>', '<?=$lastName ?>', '<?=$id?>')" value="Delete Customer">
                </td>
            </tr>
            <input type="hidden" id="txtID" name="txtID" value="<?= $id?>">
        </table>
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>
