<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_type"]);
session_destroy();
header("Location:http://localhost/Farming-assistant/index.php");