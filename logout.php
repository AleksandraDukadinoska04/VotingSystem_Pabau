<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    return;
}
session_destroy();
header('Location: login.php');
return;
