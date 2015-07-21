<?
  include("funcs.php");
  $posts = processRss("feed.rss");
  $ii = count($posts);
  $playercontent = "";
  for ($x=0; $x < count($posts); $x++) {
    $p = $posts[$x];
    if (endswith($p['link'], $_SERVER['REQUEST_URI'])) {
      $post = $p;
      $i = $ii;
      $url = $post['a_url'];
    }
    $ii--;
  }
?>
<html>
<head>
	<title>Data Skeptic</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/icon/mstile-144x144.png">
	<script src="/audiojs/audio.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/skin/jplayer.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/style.css" />
	<link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id='left'>
<img src='/web2.jpg' />
<br/>
<div id='left2'>
<center>
<a href="https://itunes.apple.com/us/podcast/the-data-skeptic-podcast/id890348705"><img src="http://dataskeptic.com/itunes.png" height=35 alt="Data Science itunes" /></a>
<br/>
<a href="http://www.stitcher.com/s?fid=50561&refid=stpr"><img src="http://dataskeptic.com/stitcher_234x60.jpg" alt="Data Science Stitcher" height=35></a>
</center>
</div>
</div>
<div id='right'>
	<div id='header'>
	<h1>Data Skeptic</h1>
	<h2>The podcast that is skeptical of and with data.</h2>
	<span class='menu'><a href="/">Home</a></span>
	|
	<span class='menu'><a href='/episodes.php'>Show Notes</a></span>
	|
	<span class='menu'><a href='/blog.php'>Blog</a></span>
	|
	<span class='menu'><a href='/resources.php'>Resources</a></span>
	|
	<span class='menu'><a href='/contact.php'>Contact</a></span>
		<hr/>
	</div>
	<div id='main'>
<?
  if (strpos($_SERVER['REQUEST_URI'], "epnotes") !== FALSE) {
	?>
	<script>
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
	</script>
	<?
  }
?>

