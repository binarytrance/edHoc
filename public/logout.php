<?php
    session_start();
    unset($_SESSION["student_id"]);
    session_destroy();
    header('Location: test-1.php');
    exit();
?>