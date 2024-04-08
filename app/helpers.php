<?php



use App\Models\settings;

use App\Models\users;

use App\Models\trnx;

use App\Models\admin;

use App\Models\wallet_request;

use App\Models\emailtemplate;

use App\Models\user_notification;

use Illuminate\Support\Facades\DB;





function p($data)

{

    echo "<pre>";

    print_r($data);

    echo "</pre>";

    die;

}

function ltype($id){
    if($id == 1){
        return "Mudra";
    }
    if($id == 2){
        return "PMEGP";
    }
    if($id == 3){
        return  "Normal MSME loan";
    }
}

function getregtype($id){
    if($id == 1){
        return "Trading";
    }
    if($id == 2){
        return "Service";
    }
    if($id == 3){
        return  "Manufacturing";
    }
}

function fp_pro($gender){
    if($gender == "Male"){
        return "He";
    }
    if($gender == "Female"){
        return "She";
    }
    if(empty($gender)){
        return  "They";
    }
}
function sp_pro($gender){
    if($gender == "Male"){
        return "His";
    }
    if($gender == "Female"){
        return "Her";
    }
    if(empty($gender)){
        return  "Their";
    }
}
function tp_pro($gender){
    if($gender == "Male"){
        return "Him";
    }
    if($gender == "Female"){
        return "Her";
    }
    if(empty($gender)){
        return  "Them";
    }
}


function loan($id){
    if($id == 1){
        return "Term";
    }
    if($id == 2){
        return "Working Capital Loans";
    }
    if($id == 3){
        return  "Term + Working Capital Loans";
    }
}



function convertNumberToWordsForIndia($number){
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
    '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
    '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
    '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
    '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
    '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
    '80' => 'eighty','90' => 'ninty');
    
    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);        
    $received_number_array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
  		$received_number_array[$i] = substr($number,$i,1);    
  	}

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $number_array[$i] = $received_number_array[$j]; 
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$j]==0 || $number_array[$i] == "1"){
                $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                $number_array[$i] = 0;
            }
               
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $value = $number_array[$i]*10; 
        }
        else{ 
            $value = $number_array[$i];    
        }            
        if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }            

    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords(strtolower("Indian Rupees ".$number_to_words_string)." Only.");
}