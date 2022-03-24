<?php


fscanf(STDIN, "%d", $width);
fscanf(STDIN, "%d", $height);
$grille =[];
$msg="";
for ($i = 0; $i < $height; $i++)
{
    $line = stream_get_line(STDIN, 31 + 1, "\n");
    $grille[]= str_split($line);
  
}
error_log(var_export( $grille, true));
for ($i=0; $i <$height ; $i++) { 
 for ($j=0; $j < $width; $j++) { 
     if($grille[$i][$j] =="0"){
         $msg.= "$j"." ". "$i" ;
         $right=false;
         for ($k=$j+1; $k <$width ; $k++) { 
            if( $grille[$i][$k] =="0" && !$right){

               $right=true;
                $msg.= " "."$k"." ". "$i" ;
   
            }
         }
         if(!$right){
            $msg.= " -1 -1"; 

         }
         $left=false;
         for ($k=$i+1; $k <$height ; $k++) { 
            if( $grille[$k][$j] =="0" && !$left){
                $left=true;
        
                $msg.= " "."$j"." ". "$k" ;
   
            }
         }
         if(!$left){
            $msg.= " -1 -1"; 

         }
      
        $msg.= "\n";
     }
 }
}

error_log(var_export( $msg, true));


echo($msg);
?>