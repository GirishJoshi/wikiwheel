<?php

require_once 'sanitize.php';
require_once 'simplehtmldom/simple_html_dom.php';

function retriveHTML($query, $level){
  $query = sanitizeString($query);
  if($level <= 1){
    if(file_get_html('http://www.wikipedia.org/wiki/'.$query.'_(disambiguation)'))
      $html = file_get_html('http://www.wikipedia.org/wiki/'.$query.'_(disambiguation)');
    else {
      $html = file_get_html('http://www.wikipedia.org/wiki/'.$query);
    }
  }else{
    $html = file_get_html('http://www.wikipedia.org/wiki/'.$query);
  }
 return $html;
}

?>
