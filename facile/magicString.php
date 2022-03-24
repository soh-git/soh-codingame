<?php

fscanf(STDIN, "%d", $N);
$bibli;
for ($i = 0; $i < $N; $i++)
{
    $S = stream_get_line(STDIN, 40 + 1, "\n");
    $bibli[]=$S;
}
sort($bibli);
error_log(var_export($bibli, true));

$name1 = $bibli[($N/2)-1];
$name2 = $bibli[$N/2];
error_log(var_export([$name1,$name2], true));

$S="";

if($name1[0]!=$name2[0]){
    $S.=$name1[0];
    ++$S;
    if(strlen($name1)==1){
        $S=$name1;
    }
   
}else {
    $name=(strlen($name1)-strlen($name2)>0)?$name2:$name1;
    for ($i=0; $i <strlen($name) ; $i++) { 
        error_log(var_export($S, true));
        if ($name1[$i]!=$name2[$i]){
            if($name1[$i]<$name2[$i]&& $i+1==strlen($name) ){
                $S=$name1;
            }else {
                $S.=$name2[$i];
            }
            break;
        } 
        $S.=$name1[$i];
    }
 
}


echo($S);
