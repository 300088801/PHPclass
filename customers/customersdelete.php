<?php
//Database stuff
include '../Includes/dbConn.php';

if(isset($_GET["id"])){
    $id=$_GET["id"];
    try{
        $db = new PDO($dsn, $username, $password, $options);

        $sql = $db->prepare("delete from customers where customerID = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

    }catch(PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }
}
header("Location:customers.php");
?>
