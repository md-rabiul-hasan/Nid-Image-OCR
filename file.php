<?php
$fileName = getcwd().DIRECTORY_SEPARATOR."file.php";
$fh       = fopen($fileName, 'r');
while($line = fgets($fh)){
    echo $line;
    echo "<hr>";
}
