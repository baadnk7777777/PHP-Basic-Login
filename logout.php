<?php 
    session_start();
    session_destroy();
    header("location: empoyee.php");
    // location ตามติดด้วย : เสมอ
    exit(0);
?>