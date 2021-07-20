<?php
$width = 10;
$length = 10;
$randomCount = 50;
$count = 0;
$randoms = array();

//Zufällige Keys in ein Array, bis gewünschte Länge (randoms)
while(count($randoms) != $randomCount) {
    $rand = rand(0,($width * $length) - 1);
    $randoms[$rand] = "'";
}
//Reindex der Keys
ksort($randoms);

//Alle Keys die nicht Random sind füllen
for ($i=0; $i < ($width * $length) ; $i++) { 
    if(!(array_key_exists($i , $randoms))) {
        $randoms[$i] = "#";
    }
}
//Reindex der Keys
ksort($randoms);
//Ausgabe in die Konsole
foreach ($randoms as $key => $value) {
    $count++;
    print $value;
    if($count == $length && !($key == count($randoms) - 1)) {
        print "\n";
        $count = 0;
    }
}