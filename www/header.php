<?
  include("funcs.php");
  date_default_timezone_set('America/Los_Angeles');
  $posts = processRss("http://dataskeptic.com/feed.rss");
  $ii = count($posts);
  $playercontent = "";
  for ($x=0; $x < count($posts); $x++) {
    $p = $posts[$x];
    if (endswith($p['link'], $_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != "/") {
      $post = $p;
      $i = $ii;
      $url = $post['a_url'];
    }
    $ii--;
  }
  if (isset($post)) {
    $title = $post['title'];
  }
  else {
    $title = "Data Skeptic";
  }
?>
<html lang="en">
<head>
	<title><? echo($title); ?></title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/icon/mstile-144x144.png">
	<script src="/audiojs/audio.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/skin/jplayer.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="/style.css" />
	<link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">

<link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="manifest" href="/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
</head>
<body>
<div id='all'>
<div id='left'>
<a href='http://dataskeptic.com/'><img src='/ds-logo.svg' alt='Data Skeptic logo' /></a>
<div id='left2'>
<div style="text-align: center; display: block; margin: auto auto;">
<a href="https://itunes.apple.com/us/podcast/the-data-skeptic-podcast/id890348705"><img src="http://dataskeptic.com/itunes.png" height=35 alt="Data Science itunes" /></a>
<br/><br/>
<a href="https://goo.gl/app/playmusic?ibi=com.google.PlayMusic&isi=691797987&ius=googleplaymusic&link=https://play.google.com/music/m/Ibr6e2jb7ot6m6gupwdjgsfmoqa?t%3DData_Skeptic"><img src="http://dataskeptic.com/google-play.png" height=35 alt="Data Science google play" /></a>
<br/><br/>
<a href="http://www.stitcher.com/s?fid=50561&refid=stpr"><img src="http://dataskeptic.com/stitcher_234x60.jpg" alt="Data Science Stitcher" height=35></a>
<br/><br/>
<a href="http://dataskeptic.com/feed.rss"><img src="http://dataskeptic.com/rss2.gif" alt="Data Skeptic podcast episode rss feed" /></a>
</div>
</div>
</div>
<div id='right'>
	<div id='header'>
	<h1>Data Skeptic</h1>
	<h2>Skeptical of and with data.</h2>
	<span class='menu'><a href="/">Home</a></span>
	|
	<span class='menu'><a href='/episodes.php'>Episodes</a></span>
	|
	<span class='menu'><a href='/blog.php'>Blog</a></span>
	|
        <span class='menu'><a href='/home-sales/'>Home Sales</a></span>
	|
	<span class='menu'><a href='/resources.php'>Resources</a></span>
	|
	<span class='menu'><a href='/store.php'>Store</a></span>
	|
	<span class='menu'><a href='/bios.php'>Bios</a></span>
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

