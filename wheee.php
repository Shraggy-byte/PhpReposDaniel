<?php
$zahl = 5;
//Fortlaufende Schleife
for($i = 1; $i <= $zahl; $i++) {
    for($j = 0; $j < $i; $j++) {
        print "#";
    }
    print "\n";
}

//Rücklaufende Schleife
for($i = $zahl - 1; $i >= 1; $i--) { 
    for ($j = $i; $j > 0; $j--) { 
        print "#";
    }
    print "\n";
}