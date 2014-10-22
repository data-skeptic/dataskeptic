<? include("funcs.php"); ?>
<html>
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="/jplayer/jquery.jplayer.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/style.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="/skin/jplayer.css" media="screen" />
</head>
<body>
<?
  $title = $_GET['title'];
  $posts = processRss("feed.rss");
  $ii = count($posts);
  $playercontent = "";
  for ($x=0; $x < count($posts); $x++) {
    $p = $posts[$x];
    if (endswith($p['title'], $title)) {
      $post = $p;
      $i = $ii;
      $playercontent = makePlayer($post, $i); 
    }
    $ii--;
  }
  echo($playercontent);
  echo("<a href='" . $post['link'] . "'>Show notes</a>");
?>
</body>
</html>

