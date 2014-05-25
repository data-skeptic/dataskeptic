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
    echo("<h2>" . $post['title'] . "</h2>");
    $posixTime = strtotime($post['pubDate']);
    echo("<b>Posted:</b> " . date('Y-m-d', $posixTime) . "<br/>");
    echo("<b>Duration:</b> " . $post['itunes:duration'] . "<br/>");
    echo("<p>" . $post['description'] . "</p>");
  }
?>
</div>

<? include("footer.php"); ?>
