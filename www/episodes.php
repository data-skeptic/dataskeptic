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
    echo("<p><audio controls='controls' style='width: 300px'><source type='" . $post['a_type'] . "' src='" . $post['a_url'] . "' />Your browser does not support our audio player.</audio></p>");
  }
?>
</div>

<? include("footer.php"); ?>
