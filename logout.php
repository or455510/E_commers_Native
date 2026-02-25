<?php
require_once 'config/init.php';

session_unset();     // يمسح كل متغيرات السيشن
session_destroy();   // يقفل السيشن خالص

header("Location: index.php");
exit;