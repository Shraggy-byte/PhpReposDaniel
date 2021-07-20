<?php

function math2($operation, $prevNumber) {
    $number = "";
    $numberArray = array();
    $isNumeric = false;
    $wasNumeric = false;
    //String in Array (splitten)
    $mathArray = str_split($operation);
    //print_r($mathArray);
    //Leerzeichen im Array finden und löschen, anschließend Keys neu zuordnen
    $mathArraySpaces = array_keys($mathArray, " ");
    foreach ($mathArraySpaces as $key => $value) {
        unset($mathArray[$value]);
    }
    $mathArray = array_values($mathArray);
    //Array durchgehen und Zahlen mit Vorzeichen in Array speichern
    foreach ($mathArray as $key => $value) {
        //Schauen ob Value auf dem Arrayindex eine Zahl ist
        if(is_numeric($mathArray[$key])) {
            $isNumeric = true;
            //Schauen ob ein Vorzeichen bei einer Zahl existiert (+ oder -)
            if(($key >= 1) && ($mathArray[$key - 1] == "-" || $mathArray[$key - 1] == "+")) {
                $number = $number. $mathArray[$key - 1];
            }
            $number = $number. $mathArray[$key];
            //Flag zum Speichern der Variable im Array (am Ende)
            if($key == count($mathArray) - 1) {
                $wasNumeric = true;
            }
        }else{
            //Flag zum Speichern der Variable im Array (mitten drinnen)
            if($isNumeric) {
                $wasNumeric = true;
                $isNumeric = false;
            }
        }
        //Speichern der Variable im Array
        if($wasNumeric) {
            $numberArray[] = $number;
            $wasNumeric = false;
            $number = ""; 
        }
    }
    //Funktionen nach Nummern aufrufen und das Ergebnis returnen
    if(count($numberArray) == 1) {
        return mathOneParameter($mathArray, $numberArray, $prevNumber);
    }
    if(count($numberArray) == 2) {
        return mathTwoParameter($mathArray, $numberArray);
    }
}

//Funktion für eine Zahl
function mathOneParameter($mathArr, $numbArr, $prevNumber) {
    //String in Int parsen
    $numberInt = (int) $numbArr[0];
    //Sollte der String die gleiche Länge haben wie das Array dann + (denn kein weiterer Operator)
    if(strlen($numbArr[0]) == count($mathArr)) {
        $operator = '+';
    //sonst Operator an erster Stelle nehmen
    } else {
        $operator = $mathArr[0];
    }
    return solve($operator, $prevNumber, $numberInt);
}
//Funktion für 2 Zahlen
function mathTwoParameter($mathArr, $numbArr) {
    //Strings in Ints parsen
    $numberInt1 = (int) $numbArr[0];
    $numberInt2 = (int) $numbArr[1];
    //Sollte die Summe aus beiden Strings dem Array entsprechen dann + (dann gibt es keinen weieren Operator)
    if((strlen($numbArr[0]) + strlen($numbArr[1])) == count($mathArr)) {
        $operator = '+';
    //sonst Operator zwischen den Ints nehmen
    }else{
        $operator = $mathArr[strlen($numbArr[0])];
    }
    return solve($operator, $numberInt1, $numberInt2);
}

function solve($operator, $number1, $number2){
    switch($operator) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        case '/':
            return $number1 / $number2;
    }   
}

$wert = 0;
$eingabe = "";
while($eingabe != "quit") {
    $eingabe = readline("Eingabe: ");
    $wert = math2($eingabe, $wert). "\n";
    if(is_numeric($wert)){
        print "Ausgabe: ". $wert;
    }
}