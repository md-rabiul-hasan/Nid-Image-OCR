<?php
require "vendor/autoload.php";
include 'formating_back_part.php';

use Google\Cloud\Vision\VisionClient;

$filePath = getcwd().DIRECTORY_SEPARATOR."ekyc.json";
$vision = new VisionClient(["keyFile" => json_decode(file_get_contents($filePath) , true)]);

$photo = fopen("image/sbb.png", "r");
$image = $vision->image($photo, ['TEXT_DETECTION']);


$result = $vision->annotate($image);

$texts = $result->text();
foreach($texts as $key=>$text)
{
    $description[]=$text->description();
}

echo "<pre>";
print_r($description[0]);
echo "<hr>";


$back_part_result = BackPartResponse($description[0]);
echo "<pre>";
print_r($back_part_result);