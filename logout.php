<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
unset($_SESSION["user"]);
echo "登出成功";
echo "<meta http-equiv=REFRESH CONTENT=1;url=login.html>";
?>;