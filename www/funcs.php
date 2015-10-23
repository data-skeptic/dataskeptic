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
    while ($xml->read()) {
      if($xml->nodeType==XMLReader::ELEMENT) {
        while($xml->read()) {
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
              if (strcmp($xml->name, "href") == 0 && strpos($xml->name, $prefix) == 0) {
                $aid = substr($xml->value, strlen($prefix), strlen($xml->value));
                if (strpos($aid, ".") === false) {
                  $post['aid'] = $aid;
                }
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
  $title = $post['title'];
  $str =  "<br/><div id=\"jquery_jplayer_" . $i . "\" class=\"jp-jplayer\"></div>";
  $str .= "<div id=\"jp_container_" . $i . "\" class=\"jp-audio\">";
  $str .= "    <div class=\"jp-type-single\">";
  $str .= "        <div class=\"jp-gui jp-interface\">";
  $str .= "            <ul class=\"jp-controls\">";
  $str .= "                <li><a href=\"javascript:;\" class=\"jp-play\" tabindex=\"1\">play</a></li>\";";
  $str .= "                <li><a href=\"javascript:;\" class=\"jp-pause\" tabindex=\"1\">pause</a></li>";
  $str .= "                <li><a href=\"javascript:;\" class=\"jp-volume-max\" tabindex=\"1\" title=\"max volume\">max volume</a></li>";
  $str .= "            </ul>";
  $str .= "            <div class=\"jp-progress\">";
  $str .= "                <div class=\"jp-seek-bar\">";
  $str .= "                    <div class=\"jp-play-bar\"></div>";
  $str .= "                </div>";
  $str .= "            </div>";
  $str .= "            <div class=\"jp-volume-bar\">";
  $str .= "                <div class=\"jp-volume-bar-value\"></div>";
  $str .= "            </div>";
  $str .= "            <div class=\"jp-current-time\"></div>";
  $str .= "            <div class=\"jp-duration\"></div>";
  $str .= "        </div>";
  $str .= "        <div class=\"jp-details\">";
  $str .= "            <ul>";
  $str .= "                <li><span class=\"jp-title\"></span></li>";
  $str .= "            </ul>";
  $str .= "        </div>";
  $str .= "        <div class=\"jp-no-solution\">";
  $str .= "            <span>Update Required</span>";
  $str .= "            To play the media you will need to either update your browser to a recent version to use our player";
  $str .= "        </div>";
  $str .= "    </div>";
  $str .= "</div>";
  $str .= "<script>";
  $str .= "$(document).ready(function() {";
  $str .= "    $(\"#jquery_jplayer_" . $i . "\").jPlayer({";
  $str .= "        ready: function(event) {";
  $str .= "            $(this).jPlayer(\"setMedia\", {";
  $str .= "                title: \"" . $title . "\",";
  $str .= "                mp3: \"" . $url . "\"";
  $str .= "            });";
  $str .= "        },";
  $str .= "        swfPath: \"http://jplayer.org/latest/js\",";
  $str .= "        cssSelectorAncestor: '#jp_container_" . $i . "',";
  $str .= "        supplied: \"mp3\"";
  $str .= "    });";
  $str .= "});";
  $str .= "</script>";
  return $str;
}
?>
