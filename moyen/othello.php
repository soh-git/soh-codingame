<?php

$board =[];
for ($i = 0; $i < 8; $i++)
{
    $row = stream_get_line(STDIN, 8 + 1, "\n");
    error_log(var_export($row, true)); 
    $board[]= str_split($row);
}

fscanf(STDIN, "%s %s", $colour, $move);
error_log(var_export([$move,$colour], true)); 

$moveCoordonne = new stdClass();
$alpha=['a','b','c','d','e','f','g','h'];
$moveCoordonne->x =array_search(str_split($move)[0],$alpha);
$moveCoordonne->y =intVal(str_split($move)[1])-1;

error_log(var_export(numberWB($board), true));    
error_log(var_export($board[$moveCoordonne->y][$moveCoordonne->x ] , true));    
if($board[$moveCoordonne->y][$moveCoordonne->x ] !="-" ){

    
    echo("NOPE");
    return;
}else{
error_log(var_export($moveCoordonne->x, true)); 
error_log(var_export($moveCoordonne->y, true));
$game=game();
if($game==404){
    echo("NULL");
return;
}
}



function numberWB($arr)
{
    $w=0;
    $b=0;
    
  
    foreach ($arr  as $a  ) {
        for ($i=0; $i < count($a); $i++) { 
            if ($a[$i]=='W') $w++ ;
            if ($a[$i]=='B') $b++ ;
        }
    }
 return $w. " ". $b;
}
function game()
{
    global $moveCoordonne , $colour,$board;
    // horizontal
    $modif=false;
 
    if($moveCoordonne->x+1 <8 && !in_array($board[$moveCoordonne->y][$moveCoordonne->x+1],["-",$colour] )){
       
        for ($i=$moveCoordonne->x+1; $i <8 ; $i++) { 
            if($board[$moveCoordonne->y][$i]==$colour){
            for ($j=$moveCoordonne->x; $j < $i; $j++) { 
                $board[$moveCoordonne->y][$j]=$colour;

            }
            $modif=true;
           }
           if($board[$moveCoordonne->y][$i]=='-'){$i=7;}

        }
    }
    if($moveCoordonne->x-1 >0 && !in_array($board[$moveCoordonne->y][$moveCoordonne->x-1],["-",$colour] )){
        
        for ($i=$moveCoordonne->x-1; $i >=0 ; $i--) { 
            if($board[$moveCoordonne->y][$i]==$colour){
            for ($j=$moveCoordonne->x; $j > $i; $j--) { 
                $board[$moveCoordonne->y][$j]=$colour;

            }
            $modif=true;

           }
           if($board[$moveCoordonne->y][$i]=='-'){$i=0;}
        }
    }
    // VERtical
    if($moveCoordonne->y+1 <8 && !in_array($board[$moveCoordonne->y+1][$moveCoordonne->x],["-",$colour] )){
        for ($i=$moveCoordonne->y+1; $i <8 ; $i++) { 
            if($board[$moveCoordonne->y][$i]==$colour){
            for ($j=$moveCoordonne->y; $j < $i; $j++) { 
                $board[$j][$moveCoordonne->x]=$colour;
              

            }
            $modif=true;
            $i=7;
           }
           if($board[$i][$moveCoordonne->y]=='-'){$i=7;}
        }
    }
    if($moveCoordonne->y-1 >0 && !in_array($board[$moveCoordonne->y-1][$moveCoordonne->x],["-",$colour] )){
        for ($i=$moveCoordonne->y-1; $i >=0 ; $i--) { 
            if($board[$moveCoordonne->y][$i]==$colour){
            for ($j=$moveCoordonne->y; $j > $i; $j--) { 
                $board[$j][$moveCoordonne->x]=$colour;

            }
            $i=0;
            $modif=true;

           }
           if($board[$i][$moveCoordonne->y]=='-'){$i=0;}
        }
    }
    // diagonal
    if($moveCoordonne->x+1  <8 &&$moveCoordonne->y+1<8 && !in_array($board[$moveCoordonne->y+1][$moveCoordonne->x+1],["-",$colour] )){
        $k=$moveCoordonne->y;
        for ($i=$moveCoordonne->x+1; $i <8 ; $i++) { 
            $k++;
            if($k<8 && $board[$k][$i]==$colour){
                $l=$moveCoordonne->y;
            for ($j=$moveCoordonne->x; $j < $i; $j++) { 
                $board[$l][$j]=$colour;
                $l++;
            }
            $modif=true;
            $i=7;
           }if($board[$i][$j]=='-'){$i=7;}
        }
    }
    if($moveCoordonne->x-1  >0 &&$moveCoordonne->y-1>0 && !in_array($board[$moveCoordonne->y-1][$moveCoordonne->x-1],["-",$colour] )){
        $k=$moveCoordonne->y;
        for ($i=$moveCoordonne->x-1; $i >=0 ; $i--) { 
            $k--;
            if($k>0 &&$board[$k][$i]==$colour){
                $l=$moveCoordonne->y;
            for ($j=$moveCoordonne->x; $j >$i; $j--) { 
                $board[$l][$j]=$colour;
                $l--;error_log(var_export("z", true));
            }
            $modif=true;
            $i=0;
           }
           if($board[$i][$j]=='-'){$i=0;}
        }
    }
    if (!$modif)return 404;
}
 

echo(numberWB($board));
?>