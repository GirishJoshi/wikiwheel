function fetchPHP(){

  var search = document.getElementById('searchbox').value;

  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  } else {
    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
  }

  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      document.getElementById('ww-list').innerHTML = xmlhttp.responseText;
    }
  }

  xmlhttp.open('GET', 'getData.php?s='+search, true);
  xmlhttp.send();
}

window.onload = function(){
  document.getElementById('searchbox').onkeydown = function(event) {
      if (event.keyCode == 13) {
        fetchPHP();
      }
  }

  $('#ww-list').on('click', 'li', function(){
    $("#searchbox").val($(this).text());
        fetchPHP();
  });

  $('#backbutton').click(function(){
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    } else {
      xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        document.getElementById('searchbox').value = xmlhttp.responseText;
        fetchPHP();
      }
    }

    xmlhttp.open('GET', 'backbutton.php', true);
    xmlhttp.send(null);

  });
}
