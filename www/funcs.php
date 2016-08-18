<?php
function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}
function endswith($haystack,$needle) {
    $expectedPosition = strlen($haystack) - strlen($needle);
    return strripos($haystack, $needle, 0) === $expectedPosition;
}

function processRss($feed) {
  try {
    $xml = new XMLReader();
    $b = $xml->open($feed);
    $item = false;
    $posts = array();
    $maxElem = 99999999;
    while ($xml->read() && $maxElem > 0) {
      $maxElem -= 1;
      if($xml->nodeType==XMLReader::ELEMENT) {
        while($xml->read() && $maxElem > 0) {
          $maxElem -= 1;
          $name = $xml->name;
          if (strcmp($name, "enclosure") == 0) {
            $attributes = array();
            while ($xml->moveToNextAttribute()) {
              $attributes[$xml->name] = $xml->value;
            }
            $post['a_length'] = $attributes['length'];
            $post['a_type'] = $attributes['type'];
            $post['a_url'] = $attributes['url'];
          }
          else if ($name == "itunes:image") {
            while ($xml->moveToNextAttribute()) {
              $prefix = "http://assets.libsyn.com/item/";
              if (strcmp($xml->name, "href") == 0) {
                $post['img'] = $xml->value;
              }
            }
          }
          if($xml->nodeType==XMLReader::ELEMENT) {
            $xml->read();
            $value = $xml->value;
            if (strcmp($name, "item") == 0) {
              $item = true;
              $post = array();
            }
            else if ($item) {
              $post[$name] = $value;
            }
          }
          if($xml->nodeType==XMLReader::END_ELEMENT && strcmp($name, "item") == 0) {
            if ($item) {
              array_push($posts, $post);
               $item = false;
            }
          }
        }
      }
    }
  }
  catch (Exception $e) {
    echo($e);
  }
  return $posts;
}

function makePlayer($post, $i) {
  $url = $post['a_url'];
  include("/player.php");
}
?>
