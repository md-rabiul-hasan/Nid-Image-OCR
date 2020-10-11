<?php
require "vendor/autoload.php";

use Google\Cloud\Vision\VisionClient;

$filePath = getcwd().DIRECTORY_SEPARATOR."ekyc.json";
$vision = new VisionClient(["keyFile" => json_decode(file_get_contents($filePath) , true)]);



$photo = fopen("image/sb.png", "r");

$image = $vision->image($photo, ['TEXT_DETECTION']);

$result = $vision->annotate($image);
echo "<pre>";
var_dump($result);
