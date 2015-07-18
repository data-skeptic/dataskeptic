<? include("header.php"); ?>
<?
  $files = scandir("blog");
  $posts = Array();
  for ($i=0; $i < count($files); $i++) {
    $file = $files[$i];
    if (substr($file, strlen($file)-4, strlen($file))==".php") {
      $post = Array();
      $post['title'] = ucwords(str_replace("-", " ", substr(substr($file, 0, strlen($file)-4), strpos($file, "_")+1, strlen($file))));
      $post['link'] = "http://dataskeptic.com/blog/" . $file;
      $post['ts'] = 0;
      $desc = file_get_contents("blog/" . $file);
      $desc = substr($desc, strpos($desc, "</h1>")+5, strlen($desc));
      $post['description'] = $desc;
      array_push($posts, $post);
    }
  }
  function sortByTitle($a, $b) {
    $a = $a['link'];
    $b = $b['link'];
    if ($a == $b) {
      return 0;
    }
    return ($a > $b) ? -1 : 1;
  }
  usort($posts, 'sortByTitle');
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
  $max = 69;
  foreach ($posts as $post) {
    if ($max <=0) {
      continue;
    }
    $max--;
    echo("<div class='ep'>");
    $link = $post['link'];
    echo("<h2><a href='$link'>#" . $i . ": " . $post['title'] . "</a></h2>");
    $i -= 1;
    $posixTime = strtotime($post['ts']);
    //echo("<b>Posted:</b> " . date('Y-m-d', $posixTime) . "<br/>");
    $desc = $post['description'];
    $done = 0;
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
        $ii = strpos($desc, "<br");
        if ($ii !== false) {
          $desc = substr($desc, 0, $ii);
        }
      }
      echo($desc);
      echo("<p><a href='$link'>read more...</a></p>");

    echo("</div><br/>");
  }
?>
</div>

<? include("footer.php"); ?>
