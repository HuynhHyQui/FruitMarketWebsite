<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<title>REGISTER</title>

<?php
echo '
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="fname">Your\'s Fullname:</label>
                <input type="text" class="form-control" name="fname" id="fname">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="pwd" id="pwd">
            </div>
            <div class="form-group">
                <label for="add">Address:</label>
                <input type="text" class="form-control" name="add" id="add">
            </div>
            <div class="form-group">
            <label for="city">City:</label>
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <button type="submit" class="btn btn-info bg-info">Register</button>
        </form>';
if (isset($_POST['fname'])) {
    require("saveRegister.php");
}
echo "</div>";
?>