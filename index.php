<?php

use Services\String\Providers\MainString;
use Services\String\StringService;
use Auryn\Injector;

require_once 'vendor/autoload.php';

$injector = new Injector();
$myObj = $injector->make(StringService::class, [
    $injector->make(MainString::class),
]);

$text = 'Ukraine occupies the southwestern portion of the Russian Plain The country consists almost entirely of level plains at an average elevation of 574 feet above sea level Mountainous areas such as the Ukrainian Carpathians and Crimean Mountains occur only on the country’s borders and account for barely 5 percent of its area. The Ukrainian landscape nevertheless has some diversity its plains are broken by highlands—running in a continuous belt from northwest to southeast—as well as by lowlands';
$data = $myObj->parseString($text);
$top = $myObj->getTop($data);
$count = $myObj->getCount($data);
$count_symbols_without_space = $myObj->getCountSymbols($text);
$count_symbols = $myObj->getCountSymbols($text, true);

echo "<h4>Top populars words</h4>";
foreach ($top as $key => $value) {
    echo $key . ': ' . $value . '<br>';
}
echo "<h4>The total number of all words in the text</h4>";
echo $count . '<br>';
echo "<h4>The number of all characters with and without spaces in the text</h4>";
echo $count_symbols_without_space . ' - ' . $count_symbols;
