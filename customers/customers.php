
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
    <h3>Customer Listing</h3>
    <table border="1" width="90%" >
        <tr>
            <th>CustomerID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php
        //include '../Includes/dbConn.php';
        require_once('../Includes/dbConn.php');

        try{
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("select * from customers");
            $sql->execute();
            $row = $sql->fetch();


            while($row != null)
            {
                echo"<tr>";
                echo"<td><a href=customersupdate.php?id=" . $row["customerID"] . ">" . $row["customerID"] . "</a></td>";
                echo"<td>" . $row["firstName"] . "</td>";
                echo"<td>" . $row["lastName"] . "</td>";
                echo"<td>" . $row["address"] . "</td>";
                echo"<td>" . $row["city"] . "</td>";
                echo"<td>" . $row["state"] . "</td>";
                echo"<td>" . $row["zip"] . "</td>";
                echo"<td>" . $row["phone"] . "</td>";
                echo"<td>" . $row["email"] . "</td>";
                echo"<td>" . $row["password"] . "</td>";
                echo"</tr>";



                $row = $sql->fetch();
            }

        }catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }



        ?>
    </table>
    <br /><br /><br />
    <a href="customersadd.php">Add a Customer Here</a>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>