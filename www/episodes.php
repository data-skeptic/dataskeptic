<? include("header.php"); ?>
<?
  try {
    $xml = new XMLReader();
    $xml->open('feed.rss');
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
?>

<div id="bbody">
<?
  foreach ($posts as $post) {
    $link = $post['link'];
    if (strpos($link, '/epnotes/') !== FALSE) {
      echo("<h2><a href='$link'>" . $post['title'] . "</a></h2>");
    }
    else {
      echo("<h2>" . $post['title'] . "</h2>");
    }
    $posixTime = strtotime($post['pubDate']);
    echo("<b>Posted:</b> " . date('Y-m-d', $posixTime) . "<br/>");
    echo("<b>Duration:</b> " . $post['itunes:duration'] . "<br/>");
    echo("<p>" . $post['description'] . "</p>");
    $aid = $post['aid'];
    if ($aid != "") {
      echo("<iframe style=\"border: none\" src=\"//html5-player.libsyn.com/embed/episode/id/" . $aid . "/height/360/width/640/theme/standard/direction/no/autoplay/no/autonext/no/thumbnail/yes/preload/no/no_addthis/no/\" height=\"125\" width=\"500\" scrolling=\"no\"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>");
    }
    else {
      echo("<p><audio controls='controls' style='width: 300px'><source type='" . $post['a_type'] . "' src='" . $post['a_url'] . "' />Your browser does not support our audio player.</audio></p>");
    }
  }
?>
</div>

<? include("footer.php"); ?>
