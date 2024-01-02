<?php

session_start();

unset($_SESSION['loggedin']);

header("Location: ../html/login.php");

exit;
