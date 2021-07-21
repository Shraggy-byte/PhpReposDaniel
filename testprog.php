<?php
$benutzername = "Daniel";
$passwort = "123";
$outputFile = "output.txt";
$output = "";
$korrekt1 = false;
$korrekt2 = false;
//Alter abfragen
do {
    $alter = readline("Alter angeben: ");
    if($alter < 18){
        return 0;
    }
} while(!is_numeric($alter));

//Benutzername und Passwort abfragen
do {
    if($benutzername == readline("Benutzername eingeben: ")) {
        $korrekt1 = true;
    }
    if(($korrekt1) && ($passwort == readline("Passwort eingeben: "))) {
        $korrekt2 = true;
    } else {
        $korrekt1 = false;
    }
} while (!$korrekt2);


//Zahlen ausgeben
for ($i=0; $i < 100; $i++) { 
    if(($i % 5 ) == 0){
        $output = $output. $i. "\n";
    } else {
        print $i;
    }
}
file_put_contents($outputFile, $output);
print "\n";
file_put_contents(readline("Dateiname eingeben: "), readline("Text eingeben: "));