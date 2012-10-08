<?php

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
	$params = explode(' ', $t);
	$N = intval($params[0]);
	$test['N'] = intval($params[0]);
	$test['S'] = intval($params[1]);
	$test['p'] = intval($params[2]);

	$tis = array_slice($params, 3);
	
	$test['ti'] = $tis;

	$tests[] = $test;
}


$triplet = array(8, 6, 7);

function totalPoints($array) {
	return array_sum($array);
}

function bestResult($array) {
	return max($array);
}

function isSurprisive($array) {
	if(
		abs($array[0] - $array[1]) == 2 ||
		abs($array[0] - $array[2]) == 2 ||
		abs($array[1] - $array[2]) == 2
	) {
		return TRUE;
	}

	return FALSE;
}