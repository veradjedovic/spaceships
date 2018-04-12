<?php

require __DIR__.'/vendor/autoload.php';

use App\models\Dreadnought;
use App\models\Leviathan;
use App\models\Interceptor;
use App\models\Recreation;
use App\models\Transport;
use App\controllers\Formation;


// Instances of Ships
$ship1 = new Leviathan(5, true);
$ship2 = new Leviathan(3, false);
$ship3 = new Transport(1, true);
$ship4 = new Transport(4, false);
$ship5 = new Transport(3, true);
$ship6 = new Transport(5, false);
$ship7 = new Dreadnought(1, false);
$ship8 = new Dreadnought(2, true);
$ship9 = new Dreadnought(4, false);
$ship10 = new Leviathan(1, false);
$ship11 = new Leviathan(2, true);
$ship12 = new Dreadnought(5, true);
$ship13 = new Dreadnought(11, false);
$ship14 = new Recreation(1, false);
$ship15 = new Recreation(2, true);
$ship16 = new Recreation(6, false);
$ship17 = new Interceptor(6, false);
$ship18 = new Interceptor(2, true);
$ship19 = new Interceptor(10, true);
$ship20 = new Interceptor(23, false);

// Attack Formation Array
$attack = [$ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7, $ship8, $ship9, $ship10, $ship11, $ship12, $ship13, $ship14, $ship15, $ship16, $ship17, $ship18, $ship19, $ship20];

// Escort Formation Array - here is the same, but can be diferent of attack formation array
$escort = [$ship1, $ship2, $ship3, $ship4, $ship5, $ship6, $ship7, $ship8, $ship9, $ship10, $ship11, $ship12, $ship13, $ship14, $ship15, $ship16, $ship17, $ship18, $ship19, $ship20];

// Instance of Formation
$formation = new Formation($attack, $escort);

// Output
echo '<h2>The Attack Formation:</h2>';
echo $formation->attack();
echo '<h2>The Escort Formation:</h2>';
echo $formation->escort();