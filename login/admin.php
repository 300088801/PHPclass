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
    <form method="get" >
        <table border="1" width="80%">
            <tr height="60">
                <th colspan="2"><h3>Add New Member</h3></th>
            </tr>
            <tr height="60">
                <th>Full Name</th>
                <td><input id="txtFName" name="txtFName" type="text" size="50"></td>  <!--inline php to insert our values from above into the rows when the user clicks to update-->
            </tr>
            <tr height="60">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" type="text" size="50"></td>
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
                        <option value="Admin">Admin</option>
                        <option value="Operator">Operator</option>
                        <option value="Member">Members</option>
                    </select>
                </td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Add New Member">
                </td>
            </tr>
        </table>
    </form>
</main>
<footer><?php include '../Includes/footer.php'?></footer>
</body>
</html>

