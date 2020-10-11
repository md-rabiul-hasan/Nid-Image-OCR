<?php
$file_path  = getcwd().DIRECTORY_SEPARATOR."back.txt";
$response = file_get_contents($file_path);

$responseArray = explode("\n", $response);
$dataArray = [];
foreach($responseArray as $data){
    array_push($dataArray, $data);
}


$addressArray = [];
$addressNo = 0;
foreach($dataArray as $data){
    if(is_english($data) === false){
        array_push($addressArray, $data);
    }
    $addressNo++;
}


function is_english($str)
{
	if (strlen($str) != strlen(utf8_decode($str))) {
		return false;
	} else {
		return true;
	}
}


function findBloodGroup($dataArray){
    $firstBanglaName = 0;
    foreach($dataArray as $data){
        similar_text("blood group", strtolower($data), $percentage);
        if($percentage > 70){
            array_splice($dataArray, $firstBanglaName, 1); 
            return $data;
        }
        $firstBanglaName++;     
    }
    
}

function filePlaceOfBirth($dataArray){
    $firstBanglaName = 0;
    foreach($dataArray as $data){
        similar_text("Place of Birth", strtolower($data), $percentage);
        if($percentage > 50){
            return $data;
        }
        $firstBanglaName++;     
    }
}

function findIssueDate($dataArray){
    $firstBanglaName = 0;
    foreach($dataArray as $data){
        if(count(standard_date_format($data)) > 0 ){
            return standard_date_format($data)[0];
            array_splice($dataArray, $firstBanglaName, 1); 
        }  
        $firstBanglaName++;       
    }
}


function standard_date_format($str) {
    preg_match_all('/(\d{1,2}) (\w+) (\d{4})/', $str, $matches);
    $dates  = array_map("strtotime", $matches[0]);
    $result = array_map(function($v) {return date("Y-m-d", $v); }, $dates);
    return $result;
}

$data = [
    "address"        => join(" ", $addressArray),
    "blood_group"    => str_replace("Blood Group", "", findBloodGroup($dataArray)),
    "place_of_birth" => str_replace("Place of Birth", "", filePlaceOfBirth($dataArray)), 
    "issue_date"     => findIssueDate($dataArray),
];




echo "<pre>";
print_r($dataArray);

echo "<pre>";
print_r($addressArray);

echo "<pre>";
print_r($data);

