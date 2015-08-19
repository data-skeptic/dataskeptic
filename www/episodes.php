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
              if (strcmp($xml->name, "href") == 0) {
                $post['img'] = $xml->value;
                if (strpos($xml->name, $prefix) == 0) {
                  $aid = substr($xml->value, strlen($prefix), strlen($xml->value));
                  if (strpos($aid, ".") === false) {
                    $post['aid'] = $aid;
                  }
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

<script>
function OpenInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}
</script>


<div id="bbody">
<?
$showonce=0;
  $i = count($posts);
  $max = 99;
  foreach ($posts as $post) {
    if ($max <=0) {
      continue;
    }
    $max--;
    echo("<div class='ep'>");
    $link = $post['link'];
    if ($i==64) {
//      $link = 'http://dataskeptic.com/bf';
    }
    $img = $post['img'];
    if ($i <= 64) {
      if ($img == 'http://static.libsyn.com/p/assets/2/9/3/8/2938570bb173ccbc/DataSkeptic-Podcast-1A.jpg') {
        $img = "/dsold.jpg";
      }
    }
    echo("<table><tr><td valign=top><img src='" . $img . "' width=150 /></td><td valign=top>");
    if (strpos($link, '/epnotes/') !== FALSE || $i==64) {
      echo("<h2><a href='$link'>#" . $i . ": " . $post['title'] . "</a></h2>");
      $tfile = substr($link, strpos($link, '/epnotes/')+9, strlen($link));
    }
    else {
      echo("<h2>#" . $i . ": " . $post['title'] . "</h2>");
      $tfile = "";
    }
    $i -= 1;
    $posixTime = strtotime($post['pubDate']);
    $url = $post['a_url'];
    echo("<b>Posted:</b> " . date('Y-m-d', $posixTime) . "<br/>");
    echo("<b>Duration:</b> " . $post['itunes:duration'] . "<br/>");
    echo("<b>Direct Download:</b> <a href='" . $url . "'>" . str_replace("http://traffic.libsyn.com/dataskeptic/", "", $url) . "</a><br/>");
    echo("<b>Open in new window:</b> <a href='#' onclick=\"OpenInNewTab('listen.php?title=" . urlencode($post['title']) . "')\">Listen</a><br/>");
    if (strpos($link, '/epnotes/') !== FALSE) {
      $ii = strpos($link, '/epnotes/');
      $transurl = "trans/" . $tfile;
//echo($_SERVER["DOCUMENT_ROOT"]);
      if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/" . $transurl) && $tfile != "") {
        echo("<b>Transcript:</b> <a href='" . $transurl . "'>here</a><br/>");
      }
    }
    echo("</td></tr></table>");
    $aid = $post['aid'];
    $desc = $post['description'];
    $done = 0;
    if (strpos($link, '/epnotes/') !== FALSE) {
      $ii = strpos($desc, "<p");
      if ($ii !== false) {
        $jj = strpos($desc, "</p>", $ii);
        if ($jj !== false) {
          $kk = strpos($desc, "<p", $jj);
          if ($kk !== false) {
            $desc = substr($desc, 0, $jj + 4);
            $done = 1;
          }
        }
      }
      if ($done == 0) {
        $ii = strpos($desc, "<br>");
        if ($ii !== false) {
          $desc = substr($desc, 0, $ii);
        }
      }
	  
	  
      //echo preg_replace('/[[:^print:]]/', ' ', '%' + strip_tags($desc));
      echo(strip_tags(preg_replace('/[[:^print:]]/', ' ', $desc)));
      echo("<p><a href='$link'>read more...</a></p>");
    }
    else {
     echo preg_replace('/[[:^print:]]/', ' ', $desc);
    }
    echo("</div><br/>");
  }
?>
</div>

<? include("footer.php"); ?>

