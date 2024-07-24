<?php
session_start();
session_destroy();
header('Location: questions_page1.php');
exit;

