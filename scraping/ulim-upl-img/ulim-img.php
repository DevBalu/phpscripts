<?php

$html = file_get_contents('http://ulim.md/');

$dom = new DOMDocument;

@$dom->loadHTML($html);

$images = $dom->getElementsByTagName("img");
$i = 0;
foreach($images as $image) {
	$i++;
	$imgFile = fopen("./filedown/". $i .".jpg", "w");
	$fileContent = file_get_contents("http://ulim.md/" . $image->getAttribute('src'));
	fwrite($imgFile, $fileContent);
	fclose($imgFile);
}