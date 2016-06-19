<?php
session_start();

if($_SESSION['level'] == 1){
  $_SESSION['level'] = -1;
  echo "";
}else{
  $_SESSION['level']-=2;
  echo $_SESSION['search'][$_SESSION['level']][0];
}
?>
