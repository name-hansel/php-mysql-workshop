<?php
session_start();
if (!$_SESSION['id'] == 'admin') {
    header('Location: admin-login.php');
}
// TODO admin logout, add, update and delete students and marks,mail marks