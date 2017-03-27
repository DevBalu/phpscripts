<?php
/*get necessary data from html page and save it in array "$value"*/
	$href = file_get_contents("http://www.curs.md/ro");
	$dom = new DOMDocument();/*create dom document*/
	$dom->loadHTML($href);/*loadHTML*/

	$tables = $dom->getElementsByTagName('table'); /*get all table from site, this method retur data in array*/
	$rows = $tables->item(0)->getElementsByTagName('tr');/*from necessary table, in my case is value 0, take "tr" tag with all values  in this.*/ 

	$values = [];

	foreach ($rows as $row) {
		$cols = $row->getElementsByTagName('td');

		$values [$cols[0]->nodeValue] = 
			array(
				$cols[1]->nodeValue => $cols[2]->nodeValue,
			)
		;
	}
	// print_r($values);
/*END get necessary data from html page and save it in array "$values"*/

/*show result from array "$values"*/
	foreach ($values as $key => $value) {
		foreach ($value as $n => $r) {
			print $key . " = " . $n . " = " . $r . "\n";
		}
	}
/*END show result from array "$values"*/
?>