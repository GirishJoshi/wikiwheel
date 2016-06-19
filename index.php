<?php
require_once "header.php"
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="styles/index.css" type="text/css" rel="stylesheet">
  <script src="scripts/jquery-1.12.3.js"></script>
  <script src="scripts/script.js" type="text/javascript"></script>
</head>
<body>
  <div class="content">
    <div class="ww-search">
      <form onsubmit="return false;">
        <input id="searchbox" type="search" name="search" autocomplete="off" value="">
      </form>
    </div>
    <div class="ww-result">
      <ul id="ww-list">
      </ul>
      <form onsubmit="return false;">
        <input id="backbutton" type="button" name="Back" value="Back">
      </form>
    </div>
  </div>
</body>
</html>
