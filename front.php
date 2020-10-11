<?php
require "vendor/autoload.php";
include 'formating_front_part.php';

use Google\Cloud\Vision\VisionClient;

$filePath = getcwd().DIRECTORY_SEPARATOR."ekyc.json";
$vision = new VisionClient(["keyFile" => json_decode(file_get_contents($filePath) , true)]);

$photo = fopen("image/of.png", "r");
$image = $vision->image($photo, ['TEXT_DETECTION']);


$result = $vision->annotate($image);

$texts = $result->text();
foreach($texts as $key=>$text)
{
    $description[]=$text->description();
}

$front_part_result = OcrFrontPartResponse($description[0]);
echo "<pre>";
print_r($front_part_result);