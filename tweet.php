<?php
function fileToArray($file) {
    $combinedString = "";
    $strlen = 0;
    $arr = array();
    $arrTemp = array();

    //Parameter Array mit Dateien oder Datei?
    if(is_array($file)) {
        //bei einem Array von Dateien werden diese in einem Array zusammengefasst
        foreach ($file as $key => $value) {
            //Alle Strings nach einer Neuzeile in einen Stringarray
            $arr = array_merge($arr ,explode("\n", file_get_contents($file[$key])));
        }
    }else{
        //Aus der Datei lesen und jede Zeile in ein Array
        $arr = explode("\n", file_get_contents($file));
    }

    foreach ($arr as $key => $value) {
        //Stringarray wird nochmal nach allen Leerzeilen gesplittet in ein neues Array
        $arrTemp = array_merge($arrTemp, explode(" ", $arr[$key]));
    }

    //Alle Leerzeilen vor und hinter Array Values und Leere Values löschen
    $arrTemp = array_filter(array_map('trim', $arrTemp));

    return $arrTemp;
}

//Funktion zur Ausgabe der random Sätze
function randomArrayOutput($arr, $rands, $maxChars) {
    $output = "";
    shuffle($arr);
    for ($i=0; $i < $rands ; $i++) {
        if(strlen($output. $arr[$i]. " ") < $maxChars) { 
            $output = $output. $arr[$i]. " ";
        } else {
            continue;
        }
    }
    print $output;
}


//Alle Dateien aus dem Directory lesen
$directory = scandir(getcwd());
//Alle Dateien ohne .txt aus dem Array löschen
foreach ($directory as $key => $value) {
    if(!(strpos($directory[$key], '.txt'))){
        unset($directory[$key]);
    }
}
//Aufruf der Methoden
//randomArrayOutput(Array, MaxWörter, MaxZeichen);
randomArrayOutput(fileToArray("test.txt"), 5, 140);
print "\n\n\n";
randomArrayOutput(fileToArray($directory), 100, 140);
