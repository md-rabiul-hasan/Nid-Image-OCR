<?php


$ocr_front_part_response  = OcrFrontPartResponse($response);


function OcrFrontPartResponse($response){
    $dataArray = explode("\n", $response);
        
    $stringArray = [];
    foreach($dataArray as $data){
        $string = str_replace(" ","",$data);
        if(strlen($string) > 6){
            array_push($stringArray, $data);
        }
    }

        
    $mother = 0;
    foreach($stringArray as $data){
        
        similar_text("মাতা", $data, $percentage);
        if($percentage > 70){
            array_splice($stringArray, $mother, 1); 
        }
        $mother++;
    }



    $father = 0;
    foreach($stringArray as $data){
        
        similar_text("পিতা ", $data, $percentage);
        if($percentage > 70){
            array_splice($stringArray, $father, 1); 
        }
        $mother++;
    }

    $gpbs = 0;
    foreach($stringArray as $data){
        
        similar_text("গণপ্রজাতন্ত্রী বাংলাদেশ সরকার", $data, $percentage);
        if($percentage > 70){
            array_splice($stringArray, $gpbs, 1); 
        }
        $gpbs++;
    }

    $rebublic = 0;
    foreach($stringArray as $data){
        
        similar_text("Government of the People's Republic of Bangladesh", $data, $percentage);
        if($percentage > 70){
            array_splice($stringArray, $rebublic, 1); 
        }
        $rebublic++;
    }

    $nationalidcard = 0;
    foreach($stringArray as $data){
        
        similar_text("National ID Card", $data, $percentage);
        if($percentage > 70){
            array_splice($stringArray, $nationalidcard, 1); 
        }
        $nationalidcard++;
    }

    $dob = 0;
    foreach($stringArray as $data){    
        similar_text("Date of Birth", $data, $percentage);
        if($percentage > 50){
            $stringArray[$dob] = str_replace("Date of Birth","",$data);
        }
        $dob++;
    }

    $nid = 0;
    foreach($stringArray as $data){    
        similar_text("NID No", $data, $percentage);
        if($percentage > 50){
            $stringArray[$nid] = str_replace("NID No","",$data);
        }
        $nid++;
    }


    if(is_english($stringArray[0]) === true){
        array_splice($stringArray, 0, 1); 
    }


    $data = [
        "bn_name"       => findBanglaName($stringArray),
        "en_name"       => findEnglishName($stringArray),
        "father_name"   => findFatherName($stringArray),
        "mother_name"   => findMotherName($stringArray),
        "date_of_birth" => findDateOfBirth($stringArray),
        "nid_number"    => findNidNumber($stringArray),
    ];
    return $data;
}

function is_english($str)
{
	if (strlen($str) != strlen(utf8_decode($str))) {
		return false;
	} else {
		return true;
	}
}



function findBanglaName($stringArray){
    $firstBanglaName = 0;
    foreach($stringArray as $data){
        if(is_english($data) == false){
        return $data;
        }
        $firstBanglaName++;
    }
}

function findEnglishName($stringArray){
    $firstBanglaName = 0;
    foreach($stringArray as $data){
        if(is_english($data) == false){
            return $stringArray[$firstBanglaName + 1];
        }
        $firstBanglaName++;
    }
}

function findFatherName($stringArray){
    $firstBanglaName = 0;
    foreach($stringArray as $data){
        if(is_english($data) == false){
            $firstBanglaName++;
        }
        if($firstBanglaName == 2){
            return $data;
        }
        
    }
}

function findMotherName($stringArray){
    $firstBanglaName = 0;
    foreach($stringArray as $data){
        if(is_english($data) == false){
            $firstBanglaName++;
        }
        if($firstBanglaName == 3){
            return $data;
        }
        
    }
}


function findNidNumber($stringArray){
    $firstBanglaName = 0;
    foreach($stringArray as $data){
        $str = preg_replace('/\D/', '', $data);
        if(strlen($str) > 7){
            return $stringArray[$firstBanglaName];
        }
        $firstBanglaName++;        
    }
}

function findDateOfBirth($stringArray){
    $firstBanglaName = 0;
    foreach($stringArray as $data){
        if(count(standard_date_format($data)) > 0 ){
            return $stringArray[$firstBanglaName];
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