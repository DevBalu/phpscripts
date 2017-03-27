<?php
	$site = file_get_contents("https://unsplash.com/search");
	$dom = new DOMDocument();
	@$dom->loadHTML($site);

	$arr = $dom->getElementsByTagName("a");/*get all elements with tag a*/
	$i = 0;

	$n_arr = [];/* array with all needed objects with tag = a & class="cV68d"*/
	foreach ($arr as $item) {
		$attrs_meta = $item->attributes; /*unfolding all objects from tag a*/
		foreach ($attrs_meta as $attr_meta) { /*unfolding all nodes from objects*/
			if ($attr_meta->name == "style") {
				$i++;
				$n_arr[$i] = $attr_meta->value;
			}
		}
	}

	foreach ($n_arr as $key => $value) {
		$file_name = $key . ".jpeg";
		$image_href = substr($value, 22, -19);
		$c = file_get_contents($image_href);
		file_put_contents($file_name, $c);
	}
?>