<?php
session_start();

require_once 'retrive.php';

if(isset($_GET['s'])){
  $search = $_GET['s'];
  $search = str_replace(',', '.2C', $search);
  $search = str_replace(' ', '_', $search);
  $_SESSION['search'][$_SESSION['level']] = array();
  $_SESSION['search'][$_SESSION['level']][0] = $search;
}


switch ($_SESSION['level']) {
  case -1:
      echo "";
      if($_SESSION['level'] == -1)
        $_SESSION['level']++;
    break;
  case 0:
      $index = 1;

      if(file_exists('sessions/session'.$search.'.html')){
        $html = file_get_html('sessions/session'.$search.'.html');
      }else{
        $html = retriveHTML($search, $_SESSION['level']);
        $html->save('sessions/session'.$search.'.html');
      }

      if($html->find('h2 span.mw-headline')){
        $temp = $html->find('h2 span.mw-headline');
        foreach ($temp as $item) {
          echo "<li id=node$index>".$item->plaintext."</li>";
          $_SESSION['search'][$_SESSION['level']][$index] = $item;
          $index++;
        }
      }
      if($_SESSION['level'] == 0)
        $_SESSION['level']++;
    break;

  case 1:
      $index = 1;

      $html = file_get_html('session'.$_SESSION['search'][0][0].'.html');

      $span = $html->find("span.mw-headline[id=$search]");
      $parent = $span[0]->parent();

      while($parent->next_sibling()->tag != 'h2'){
        if($parent->next_sibling()->tag == 'ul'){
          $sib = $parent->next_sibling();
          $lichild = $sib->children();
          for($v = 0; $v < count($lichild); $v++){
            $text = $lichild[$v]->find('a');
            echo "<li id=node$index>".$text[0]->plaintext."</li>";
            $_SESSION['search'][$_SESSION['level']][$index] = $text[0];
            $index++;
          }
          $parent = $parent->next_sibling();
        }else{
          $parent = $parent->next_sibling();
        }
      }

      if($_SESSION['level'] == 1)
        $_SESSION['level']++;
    break;
  case 2:
      echo "<li>That's It. Under Development !</li>";
      if($_SESSION['level'] == 2)
        $_SESSION['level']++;
    break;
  default:
    # code...
    break;
}

?>
