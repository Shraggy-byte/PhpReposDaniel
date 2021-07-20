<?php
function laden($progress){
    print "[";
    for ($i = 0; $i < $progress ; $i += 10) { 
        print "#";
    }
    for ($i = 0; $i < (100 - $progress) ; $i += 10) { 
        print " ";
    }
    print "] ";
    if ($progress == 100) {
        print "100 %";
    }else {
        print $progress. "  %";
    }
    print "\n";
}

$progress = readline("Ladebalken Progress: ");

for ($i = $progress; $i <= 100 ; $i += 10) {
    sleep(1); 
    laden($i);
}