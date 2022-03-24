<?php


$operation = stream_get_line(STDIN, 256 + 1, "\n");
fscanf(STDIN, "%d", $pseudoRandomNumber);
$alphabet='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$list_rotor=[];


for ($i = 0; $i < 3; $i++)
{
    $rotor = stream_get_line(STDIN, 27 + 1, "\n");
    $list_rotor[]=$rotor;
}

$message = stream_get_line(STDIN, 1024 + 1, "\n");

if($operation=="ENCODE"){
    $message = updateMsgPseudoRandom($message, $pseudoRandomNumber, $alphabet);
    $msg= encode($message, $list_rotor,$alphabet);
}else{
    $msg= decode($message, $list_rotor,$alphabet);
    $msg = updateMsgPseudoRandom($msg, $pseudoRandomNumber*(-1), $alphabet);

}
function updateMsgPseudoRandom($msg,$ranNb,$alphabet)
{
    $new_msg="";


    for ($i=0; $i < strlen($msg); $i++) { 
        $j=($ranNb>0)? $i : -$i;
        
        $index_letter=strpos($alphabet,$msg[$i])+$ranNb+$j;
        

        while (!(-26<$index_letter && $index_letter <26  )) {

            if($ranNb>0){
                $index_letter-=26;
                
                
            }else{
                $index_letter+=26;

            }
        }
        
        $new_msg.=$alphabet[$index_letter];

    }
    return $new_msg;
}

function encode($msg,$list,$alphabet)
{
    foreach ($list as $rotor) {
        $new_msg="";  
        for ($i=0; $i < strlen($msg); $i++) { 
            $new_msg.=$rotor[strpos($alphabet,$msg[$i])]; 
        }
        $msg=$new_msg; 
    }
    return $msg;
}
function decode($msg,$list,$alphabet)
{
    $list=array_reverse($list);
    foreach ($list as $rotor) {
        $new_msg="";  
        for ($i=0; $i < strlen($msg); $i++) { 
            $new_msg.=$alphabet[strpos($rotor,$msg[$i])]; 
        }
        $msg=$new_msg; 
    }

    return $msg;
}

echo($msg);
?>