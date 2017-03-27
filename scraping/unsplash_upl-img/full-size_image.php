<?php
	function upl_image($word){
		$site = file_get_contents("https://unsplash.com/search/" . $word);
		$dom = new DOMDocument();
		@$dom->loadHTML($site);

		$arr = $dom->getElementsByTagName("a");/*get all elements with tag a*/

		$n_arr = [];/* array with all needed objects with tag = a & class="cV68d"*/
		foreach ($arr as $item) {
			$attrs_meta = $item->attributes; /*unfolding all objects from tag a*/
			foreach ($attrs_meta as $attr_meta) { /*unfolding all nodes from objects*/
				if ($attr_meta->name == "class" && $attr_meta->value == "_23lr1") { /*if class of node is equal with cV68d, then i add in array object*/
					$n_arr[] = $item;
				}
			}
		}

		$href_objs = []; /*all href of image*/
		foreach ($n_arr as $n_objects) { /*need array unfolding at objects*/
			$n_nodes = $n_objects->attributes; /*get attributes from objects*/
			foreach ($n_nodes as $node_attr) { /*get attribute from object*/
				if ($node_attr->name == "href") { /*if name of object is equal with "href"*/
					$href_objs[] = $node_attr; /*add in array $href_objs value of value of object*/
				}
			}
		}

		$i = 0;
		foreach ($href_objs as $href_obj) {
			$i++;
			$file_name = $i . ".jpeg";
			$image_href = "https://unsplash.com" . $href_obj->value . "/download";
			$c = file_get_contents($image_href);
			file_put_contents($file_name, $c);
		}

	}/*END of function*/


	upl_image($argv[1]);
?>