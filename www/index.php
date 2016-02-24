<? include("header.php"); ?>

<div id="bbody">
<p>
Data Skeptic is a podcast that alternates between short mini episodes and longer interviews.
For the mini-episodes, Kyle and Linh Da explore basic data science concepts.
Longer interviews feature practitioners and experts on interesting topics related to data, all through the eye of scientific skepticism.
</p>

<? if (strtotime("now") < strtotime("3/10/2016")) { ?>
<div>
<h2>Live Event</h2>
<p>I'll be giving a talk in Berkeley, CA on March 3rd, details below.</p>
<table>
  <tr>
    <td><i>Title:</i></td>
    <td>A Skeptic's Perspective on Artificial Intelligence</td>
  </tr>
  <tr>
    <td><i>Address:</i></td>
    <td><a href="https://www.google.com/maps/place/La+Pe%C3%B1a+Cultural+Center/@37.852834,-122.2658731,15z/data=!4m2!3m1!1s0x0:0xad75f442460279f8">La Pe&ntilde;a, 3105 Shattuck Avenue, Berkeley</a></td>
  </tr>
  <tr>
    <td><i>Datetime:</i></td>
    <td>7:30pm Thursday <b>3/10/2016</b></td>
  </tr>
  <tr>
    <td></td>
    <td>The past few decades have shown incredible progress in technology. Advancements in computer speed and storage have enabled impressive advancements like Google Search, voice recognition, facial recognition, and competitive machine players for games like Chess and Go. Today we own electronics that have certain features we appropriately call "intelligent", yet we do not (or is it not yet?) have artificial intelligence. Discussion of A.I. includes both good science and a lot of woo. This talk will explore what's likely, unlikely, possible, and science fiction. Further, this talk will comment on how a non-technical person can be appropriately skeptical without an advanced degree.</td>
  </tr>
</table>
</div>
<? } ?>

<? include("mailinglist.php"); ?>

</div>

<? include("footer.php"); ?>
