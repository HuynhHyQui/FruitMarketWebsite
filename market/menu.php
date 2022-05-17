<?php
session_start();
echo '
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Market Online</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./vegetable/index.php">Vegetable</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cart/index.php">Cart</a>
            </li>';
    if (isset($_SESSION["id"])) {
        echo '
            <li class="nav-item">
                <a class="nav-link" href="../cart/history.php">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../customer/logout.php">Logout</a>
            </li>
            <li class="nav-item bg-info">
                <a class="nav-link" href="#">'.$_SESSION['ten'].'</a>
            </li>';
    }
    else {
        echo '
            <li class="nav-item">
                <a class="nav-link" href="customer/login.php">Login</a>
            </li>';
    }
    echo '
        </ul>
    </nav> ';
?>