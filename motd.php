<?php
function printRandomMessages($count,$arr) {
    for ($i=0; $i < $count - 1 ; $i++) {
        //zufälligen Satz aus Array nehmen
        $rand = rand(0, count($arr) - 1);
        //ausgeben
        print $arr[$rand]. "\n";
        //löschen aus Array
        unset($arr[$rand]);
        //Array keys neu sortieren
        $arr = array_values($arr);
    }
    //solle das Array nur noch ein Eintrag haben, Ausgabe
    if (count($arr) == 1) {
        print $arr[0];
    }
}
$messages = array();
$messages = ["No one is perfect - that’s why pencils have erasers. - Wolfgang Riebe",
            "Have no fear of perfection - you'll never reach it. - Salvador Dali",
            "The tallest mountain started as a stone. - One Punch Man Intro",
            "Make it work. Make it nice. Make it fast. Always obey this order! - kiraa",
            "A good programmer is someone who always looks both ways before crossing a one-way street. – Doug Linder",
            "If debugging is the process of removing software bugs, then programming must be the process of putting them in. - Edsger W. Dijkstra"];

//Kopieren eines Arrays
$messagescopy = array();
$messagescopy = array_merge($messages);

//Aufruf der Funktion, weiters Kopieren und erneuter Aufruf
printRandomMessages(count($messagescopy), $messagescopy);
print "\n\n\n";
$messagescopy = array_merge($messages);
printRandomMessages(count($messagescopy), $messagescopy);