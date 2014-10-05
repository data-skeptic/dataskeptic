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
<h2>Recent Episodes</h2>
<?
$showonce=0;
  $i = count($posts);
  $max = 6;
  foreach ($posts as $post) {
    if ($max <=0) {
      continue;
    }
    $max--;
    echo("<div class='ep'>");
    $link = $post['link'];
    if (strpos($link, '/epnotes/') !== FALSE) {
      echo("<h2><a href='$link'>#" . $i . ": " . $post['title'] . "</a></h2>");
    }
    else {
      echo("<h2>#" . $i . ": " . $post['title'] . "</h2>");
    }
    $i -= 1;
    $posixTime = strtotime($post['pubDate']);
    echo("<b>Posted:</b> " . date('Y-m-d', $posixTime) . "<br/>");
    echo("<b>Duration:</b> " . $post['itunes:duration'] . "<br/>");
    $aid = $post['aid'];
if ($showonce==0) {
$showonce=0;
?>
<div id="jquery_jplayer_<? echo($i); ?>" class="jp-jplayer"></div>

<div id="jp_container_<? echo($i); ?>" class="jp-audio">
    <div class="jp-type-single">
        <div class="jp-gui jp-interface">
            <ul class="jp-controls">
                <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
            </ul>
            <div class="jp-progress">
                <div class="jp-seek-bar">
                    <div class="jp-play-bar"></div>
                </div>
            </div>
            <div class="jp-volume-bar">
                <div class="jp-volume-bar-value"></div>
            </div>
            <div class="jp-current-time"></div>
            <div class="jp-duration"></div>
        </div>
        <div class="jp-details">
            <ul>
                <li><span class="jp-title"></span></li>
            </ul>
        </div>
        <div class="jp-no-solution">
            <span>Update Required</span>
            To play the media you will need to either update your browser to a recent version to use our player
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $("#jquery_jplayer_<? echo($i); ?>").jPlayer({
        ready: function(event) {
            $(this).jPlayer("setMedia", {
                title: "<? echo($post['title']); ?>",
                mp3: "<? echo($post['a_url']); ?>"
            });
        },
        swfPath: "http://jplayer.org/latest/js",
        cssSelectorAncestor: '#jp_container_<? echo($i); ?>',
        supplied: "mp3"
    });
});
</script>

<?
}
    echo("" . $post['description'] . "");
    echo("</div><br/>");
  }
?>
For a complete list, please find the podcast on itunes, stitcher, or your podcasting place of choice.
</div>

<? include("footer.php"); ?>
