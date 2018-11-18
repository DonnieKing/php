<?php

include 'function.php';
$fileInfo = $_FILES['MyFile'];
var_dump(upload_file($fileInfo));