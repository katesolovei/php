<?php
  if (!isset($_POST['userURL'])){
    die();
  }
  $print = htmlspecialchars($_POST['userURL']);
  $data = file_get_contents("links.txt");
  if (!$data){ $links = array('http://google.com' => 'http://google/5555' );}
  else {
    $links = unserialize($data);
  }
  if (!isset($links[$print])){
    $tmp1 = substr($print, 7);
      $pos = strpos($tmp1,"/");
      if ($pos===0) {
        $tmp1=substr($print, 8);
      }
      $pos1 = strpos($tmp1,"/");
      if ($pos1){
        $pos2 = strpos($tmp1, "/");
      } else {
        $pos2 = strpos($tmp1, ".");
      }
      $tmp1 = substr($tmp1, 0, $pos2);
      $tmp2 = substr(md5(uniqid(rand(), true)), 0, 4);
      $shortURL = 'http://'.$tmp1.'/'.$tmp2;
     #echo $shortURL;
    $links[$print]=$shortURL;
  }
  $data = serialize($links);
  file_put_contents("links.txt", $data);

  $tmp = file_get_contents( 'index.php');
  $patterns = array( '/{print}/','/shortURL/');
  $printLink = $print." = <a href=".$print." target='_blanck'>".$links[$print]."</a>";
  $replace = array($print, $printLink);
  echo preg_replace( $patterns, $replace, $tmp );  