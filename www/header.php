
<?php
  include("funcs.php");
  $posts = processRss("feed.rss");
  $ii = count($posts);
  $playercontent = "";
  for ($x=0; $x < count($posts); $x++) {
    $p = $posts[$x];
    if (endswith($p['link'], $_SERVER['REQUEST_URI'])) {
      $post = $p;
      $i = $ii;
      $playercontent = makePlayer($post, $i); 
    }
    $ii--;
  }
?>
<HTML>
<head>
  <title>Data Skeptic | A podcast about data science and skepticism</title>
  <meta name="Keywords" content="data science, data skepticism, kyle polich, empirical evidence">
  <meta name="Description" content="The Data Skeptic Podcast features conversations on topics related to data science, statistics, machine learning, artificial intelligence and the like, all from the perspective of applying critical thinking and the scientific method to evaluate the veracity of claims and efficacy of approaches.">
<link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/icon/favicon-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/icon/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="/icon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/icon/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/icon/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/icon/mstile-144x144.png">

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="http://cdn.ucb.org.br/Scripts/tablesorter/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" type="text/css" href="/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/skin/jplayer.css" media="screen" />

<link href="http://cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
</head>
<BODY>

<div id="main">

<div id="topheader">
  <div id="logo"><img src="/ituneslogo.png" alt="Data Skeptic Podcast" text="Data Skeptic Podcast" /></div>
  <div id="top">
    <div id="headline">The Data Skeptic Podcast</div>
    <div id="desc">Conversations at the intersection of data science, skepticism, and empirical validation.</div>
    <div class="clear"></div>
    <div id="wheretoget">
      <br/>
      <a href="https://itunes.apple.com/us/podcast/the-data-skeptic-podcast/id890348705"><img src="/itunes.png" height=35 alt="Data Science itunes" /></a>
      &nbsp;
      <a href="http://www.stitcher.com/s?fid=50561&refid=stpr"><img src="/stitcher_234x60.jpg" alt="Data Science Stitcher" height=35></a>
    </div>
  </div>
  <div class="clear"></div>
</div>

<div id="cols">

<div id="lcol">
  <? include("mailinglist.php"); ?>
  <div class="clear"></div>
  <div id="xtrastuff">
    <a href="http://dataskeptic.libsyn.com/rss"><img src="/rss2.gif" border=0" /></a><br/>
    <a href="http://feedvalidator.org/check.cgi?url=http%3A//dataskeptic.libsyn.com/rss"> <img src="/valid-rss.png" /></a><br/><br/>
  </div>
  <div class="clear"></div>
  <div id="vm">If you have a comment or question for the show, you can leave us a voice message by calling <b>(310) 906-0752</b>.</div>
</div>

<div id="inner">
<div id="menu">
<a href="/">Home</a>
|
<a href="/episodes.php">Show Notes</a>
|
<a href="/blog.php">Blog</a>
|
<a href="/resources.php">Resources</a>
|
<a href="/contact.php">Contact</a>
</div>

<?
  if (strpos($_SERVER['REQUEST_URI'], "epnotes") !== FALSE) {
    echo($playercontent);
  }
?>
