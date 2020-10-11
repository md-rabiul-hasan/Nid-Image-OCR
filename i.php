<?php
$str = "here'ras-df|,asdfasd";
$new_str = preg_replace("~'|,|-~", ' ', $str);
echo $new_str;
