<?php
session_start();
session_destroy();
header("Location: loginscreen.php"); 
exit;