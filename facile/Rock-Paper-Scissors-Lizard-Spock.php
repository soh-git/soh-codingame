<?php

$comp= array();
$beatenBy= array( "C"=>["P","L"],
    "P"=>["R","S"],
    "R"=>["L","C"],
    "L"=>["S","P"],
    "S"=>["C","R"]) ;
fscanf(STDIN, "%d", $N);
for ($i = 0; $i < $N; $i++)
{
    fscanf(STDIN, "%d %s", $NUMPLAYER, $SIGNPLAYER);
    $comp[]=array( 'id'=>$i,
    'numPlayer'=> $NUMPLAYER,
    'sign'=>$SIGNPLAYER,
   'beat'=>array(),
   'loser'=>false);
}
while (count($comp) >1) {
$loser=array();
for ($i=0; $i < count($comp); ) { 
    $leader=$comp[$i];
    $challenger=$comp[$i+1];
    $duellooser;
    if($leader["sign"]==$challenger["sign"]){
        $duellooser = (!in_array($challenger["sign"],$beatenBy[$leader["sign"]]))?$leader:$challenger;
    }
    ($duellooser===$leader)?$challenger['beat'][]=$leader['numPlayer']:$leader['beat'][]=$challenger['numPlayer'];
    array_unshift($loser,$duellooser['id']);
    error_log(var_export($duellooser['id'], true));
    $i+=2;
}

$comp2=array();

foreach ($comp as $player) {
    if($player["id"]!= $loser[$i]){
        $comp2[]=$player;
    }
}
$comp = $comp2;
};

echo($comp[0]["numPlayer"]+"\n");
echo(implode(" ",$comp[0]["beat"]));
?>