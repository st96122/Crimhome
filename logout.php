<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
unset($_SESSION["user"]);
echo "<meta http-equiv=REFRESH CONTENT=0;url=login.html>";
?>;