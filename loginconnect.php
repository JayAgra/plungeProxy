<?php
$sname= "localhost";

$unmae= "loginphp";

$password = "phproxy-login";

$db_name = "phpplogins";
class logins extends SQLite3
{
    function __construct()
    {
        $this->open('logins.db');
    }
}

$db = new logins();
$sql =<<<EOF
        CREATE TABLE IF NOT EXISTS LOGINS
        (ID INTEGER PRIMARY KEY AUTOINCREMENT,
        USER_NAME           TEXT    NOT NULL,
        PASSWORD           TEXT    NOT NULL);
EOF;
?>