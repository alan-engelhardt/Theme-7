<?php
define("INFO", "mysql:host=localhost;dbname=test;charset=utf8");
define("USER", "root");
define("PW", "");
$db_connection = new PDO(INFO, USER, PW);
