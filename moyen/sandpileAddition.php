<?php

function sum_matrix($matrix1,$matrix2)
{
    $fmatrix=[];
    for ($i=0; $i <count($matrix1);  $i++ ){ 
        $fmatrix[]= sprintf("%03d", intval($matrix1[$i]) + intval($matrix2[$i]));
        
    }
    return $fmatrix;
}
function reduce_sandpile($fmatrix)
{


    $sandpile=true;
    while($sandpile){
        $sandpile = false;
        for ($i=0; $i <count($fmatrix); $i++) { 
            for ($j=0; $j < strlen($fmatrix[$i]); $j++) { 
                if (intval($fmatrix[$i][$j])>3){
    error_log(var_export($fmatrix, true)); 

                    $fmatrix=updateSand($fmatrix,$i,$j);
    error_log(var_export($fmatrix, true)); 

                    $sandpile=true;
                }
            }
        }
        
    }
    return $fmatrix;
}

function updateSand($matrix,$i,$j)
{
    
  if ($i+1 <strlen($matrix[0])){$matrix[$i+1][$j]= strval(intval($matrix[$i+1][$j])+1);}
  if ($j+1 <strlen($matrix[0])){$matrix[$i][$j+1]= strval(intval($matrix[$i][$j+1])+1);}
  if ($i-1 >=0){$matrix[$i-1][$j]=strval( intval($matrix[$i-1][$j])+1);}
  if ($j-1 >=0){$matrix[$i][$j-1]= strval(intval($matrix[$i][$j-1])+1);}
  $matrix[$i][$j] =strval(intval($matrix[$i][$j])-4);
  return $matrix;
}
fscanf(STDIN, "%d", $n);
$matrix1= [];
$matrix2= [];
for ($i = 0; $i < $n; $i++)
{
    $row = stream_get_line(STDIN, 12 + 1, "\n");
$matrix1[]= $row;

}
for ($i = 0; $i < $n; $i++)
{
    $row = stream_get_line(STDIN, 12 + 1, "\n");
$matrix2[]= $row;

}

$fmatrix = sum_matrix($matrix1,$matrix2 );
$fmatrix = reduce_sandpile($fmatrix );
for ($i=0; $i < count($fmatrix); $i++) { 
echo($fmatrix[$i]."\n");
}


?>