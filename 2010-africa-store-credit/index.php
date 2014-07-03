<?php

class FileHandler {
	var $data;
	var $index;
	var $output;
	var $outputfilename;

	function __construct($file) {

		$myfile = fopen($file, "r") or die("Unable to open file!");
		$this -> data = fread($myfile, filesize($file));
		fclose($myfile);

		$this -> outputfilename = array_shift(explode(".", $file)) . ".out";

		$this -> data = explode("\n", $this -> data);
		$this -> index = -1;
	}

	function getData() {
		$this -> index++;
		return($this -> data[$this -> index]);
	}

	function fileOutput() {
		file_put_contents($this -> outputfilename, $this -> output) or die("Unable to save file!");;
	}
}

$f = new FileHandler("A-small-practice.in");

$buy = $f -> getData();

for($b = 0; $b < $buy; $b++) {

	$c = intval($f -> getData());
	$i = intval($f -> getData());
	$p = explode(" ", $f -> getData());

	$cnt = 1;

	for($l1 = 0; $l1 < ($i - 1); $l1++) {
		for($l2 = $cnt; $l2 < $i; $l2++) {

			if(intval($p[$l1]) + intval($p[$l2]) === $c) {
				$f -> output .= ("Case #" . ($b + 1) . ": " . ($l1 + 1). " " . ($l2 + 1) . "\n");
			}
		}

		$cnt++;
	}
}

$f -> fileOutput();

print("Done");