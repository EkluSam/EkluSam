<?php

/// Function who's purpose is to store all data into a defined array
function getData($path)
{
    $lines = [];
    if ($file = fopen($path, "r")) {
        while (!feof($file)) {
            $textperline = fgets($file);
            $textperline = preg_replace('/[\r\n]+/', '', $textperline);
            $lines[] = $textperline;
        }
        fclose($file);
    }
    return $lines;
}


$lines = getData("Aoc.txt");


$horizontalValue = 0;
$depthValue = 0;
$aimValue = 0;
$forward = "forward";
$up = "up";
$down = "down";

for($x = 0;$x < count($lines); $x++)
{
    if(preg_match("/{$forward}/i", $lines[$x])) {
        $value = substr($lines[$x],-1); // Take last char (number);
        $horizontalValue += $value; // if forward we add
        $depthValue += ($aimValue * $horizontalValue);   
        continue;     
    }
    if(preg_match("/{$up}/i", $lines[$x])) {
        $value = substr($lines[$x],-1);
        $aimValue -= $value;
        continue;
    }
    if(preg_match("/{$down}/i", $lines[$x])) {
        $value = substr($lines[$x],-1);
        $aimValue += $value;
        continue;
    }
    
    
}
echo $horizontalValue * $depthValue;
?>