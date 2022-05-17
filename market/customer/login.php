<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <title>LOGIN</title>
</head>
<body>
<?php
echo '
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="id">Your\'s ID:</label>
                <input type="text" class="form-control" name="id" id="id" placeholder="Enter your\' ID">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your\' password">
            </div>
            <input type="submit" class="btn btn-info bg-info" value="Login">
            <a href="register.php" class="btn btn-info bg-info">Register</a>
        </form>';
if (isset($_POST['id'])) {
    require("checkLogin.php");
}
echo "</div>";
?>
</body>
</html>