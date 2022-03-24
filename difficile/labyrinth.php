<?php
function isOnBoard($coor)
{
    global $R,$C;
   return !($coor[0] <0 || $coor[0] >=$R|| $coor[1] <0  || $coor[1] >=$C) ;
}
function getNeighbours($coor)
{
    $vc=$coor[0];$vr=$coor[1];
    $group=[[$vc-1,$vr],[$vc+1,$vr],[$vc,$vr-1],[$vc,$vr+1]];
    $groupNeighbours=[];
    foreach ($group as $coor ) {
        if ( isOnBoard($coor)) $groupNeighbours[]=$coor;
    }
    return $groupNeighbours;
}

function destinaton($board,$start)
{
    global $comeback,$Cfound;
    if(!$comeback){
        if ($Cfound) {
            $destination = BFS($board,$start,'C');
            if($destination==null) return BFS($board,$start,'?');
        }
        $destination=BFS($board,$start,'?');
        
        if($destination==null) return BFS($board,$start,'C');
        return $destination;
    }else {
        return BFS($board,$start,'T');
    }
}
function direction($destination,$KR,$KC){
    if($destination[0] >$KR) return "DOWN";
    if($destination[0] <$KR)return "UP";
    if($destination[1] >$KC) return "RIGHT";
    if($destination[1] <$KC) return"LEFT";
}

function BFS($board,$start,$goal)
{
    $queue=[];$colour=[];$distance=[];$parents=[];
  
    $forbidden_symbols=['#'];
    if ($goal=="?")$forbidden_symbols[]="C";
    for ($i=0; $i < count($board); $i++) { 
         for ($j=0; $j < strlen($board[0]); $j++) { 
             $colour[$i][$j]=0;
             $distance[$i][$j]=100000000;
             $parents[$i][$j]=null;
         }
    }
    $colour[$start[0]][$start[1]]=1;
    $distance[$start[0]][$start[1]]=0;
    $queue[]=$start;
    
    while (count($queue) >0) {
       
    
        $u = array_shift($queue) ;
      
        $neigbours=[];
        $group=getNeighbours($u); 
        
        foreach ($group as $n) {
            if (!in_array($board[$n[0]][$n[1]],$forbidden_symbols)) {
                $neigbours[] = $n;
            }
        }
        foreach($neigbours as $n){
            if ($colour[$n[0]] [$n[1]]==0) {
                $colour[$n[0]] [$n[1]]=1;
                $distance[$n[0]] [$n[1]]= $distance[$u[0]][$u[1]]+1;
                $parents[$n[0]] [$n[1]]=$u;
                $queue[]=$n;
                
                
                if ($board[$n[0]][$n[1]]==$goal) {
                    return next_move($parents,$start,$n);
                }   
            }
        }
        $colour[$u[0]][$u[1]]=2;


    }

return null;

}
 function next_move($parent,$start,$n)
 {  

     $v=$n;
     while ($parent[$v[0]][$v[1]] !=$start) {
         $v=$parent[$v[0]][$v[1]];
     }
     return $v;
 }

fscanf(STDIN, "%d %d %d", $R, $C, $A);
$comeback=false;
while (TRUE)
{
    fscanf(STDIN, "%d %d", $KR, $KC);
    $board=[];
    $Cfound=false;
    for ($i = 0; $i < $R; $i++)
    {
        fscanf(STDIN, "%s", $ROW);
        $board[]=$ROW;
        if(strpos($ROW,"C")){
            $Cfound=true;
        }
    }
    if($board[$KR][$KC]=='C'){ $comeback=true; }
    $destination = destinaton($board,[$KR,$KC]);
    $direction=direction($destination,$KR,$KC);
  

    echo($direction."\n");
}
?>