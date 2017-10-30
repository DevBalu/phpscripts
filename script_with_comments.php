function aplthabet_position ($s){

  $alph = array(
  	    0 => 'a',
  	    1 => 'b',
  	    2 => 'c',
  	    3 => 'd',
  	    4 => 'e',
  	    5 => 'f',
  	    6 => 'g',
  	    7 => 'h',
  	    8 => 'i',
  	    9 => 'j',
  	    10 => 'k',
  	    11 => 'l',
  	    12 => 'm',
  	    13 => 'n',
  	    14 => 'o',
  	    15 => 'p',
  	    16 => 'q',
  	    17 => 'r',
  	    18 => 's',
  	    19 => 't',
  	    20 => 'u',
  	    21 => 'v',
  	    22 => 'w',
  	    23 => 'x',
  	    24 => 'y',
  	    25 => 'z'
  	);
  	
  $text = $s;
  
  // делаем все буквы маленькими
  $text_lower = strtolower($text);
  
  // заменяем все символы не относящиеся к алфавету
  $text_replace = preg_replace('/(\w+)  (\d+), (\d+)/i', ' ', $text_lower);
  
  // преврощаем string в array 
  $array_with_words = str_split($text_replace);
  
  
  // циклируем наш array с полученными буквами и сравниваем его с array - ем с алфавитом 
  $arr_keyAlth = []; // наш array c нужными ключами
  
  foreach($array_with_words as $key => $value){
    
    foreach($alph as $keyAlph => $valueAlph){
      if($value == $valueAlph){
        
        $arr_keyAlth[] = $keyAlph;    
      
      }
    }
  
    
  }
  
  // циклирем наш array с нужными ключами и конкатенируем в один string
  $result = '';
  
  foreach($arr_keyAlth as $key => $value){
    $result .= $value . ' ';
  }
  
  //функция возвращает string
  return $result;
}



$s = 'The sunset sets at twelve o\' clock.';

echo aplthabet_position($s);