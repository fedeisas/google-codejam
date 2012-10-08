<?php

$abc = array(" " => " ") + array_combine(range('a', 'z'), range('a', 'z'));

$translateMap = array(
	'our language is impossible to understand' => 'ejp mysljylc kd kxveddknmc re jsicpdrysi',
	'there are twenty six factorial possibilities' => 'rbcpc ypc rtcsra dkh wyfrepkym veddknkmkrkcd',
	'so it is okay if you want to just give up' => 'de kr kd eoya kw aej tysr re ujdr lkgc jv'
);

$table = array();

foreach($translateMap as $input => $output) {
	$table += array_combine(str_split($input), str_split($output));
}

$diff = array_reverse(array_values(array_diff_key($abc, $table)));
$diff = array_combine(array_diff_key($abc, $table), $diff);
$table += $diff;

ksort($table);

$translateTable = array_flip($table);

// read input
$in = fopen('php://stdin', 'r');

// input to array
$lines = array();
while(!feof($in)){
    $lines[] = fgets($in, 4096);
}

// number of test cases. Useless.
$numberOfTests = $lines[0];

// loop through tests to build an expressive array
$tests = array();
$tmp = array_slice($lines, 1);
foreach($tmp as $t) {
	$tests[] = trim($t);
}

foreach($tests as $index => $test) {	

	$output = "";

	foreach(str_split($test) as $letter) {
		$output .= $translateTable[$letter];
	}

	echo "Case #" . ($index + 1) . ": " . trim($output) . PHP_EOL;
}
